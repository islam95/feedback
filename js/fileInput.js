/**
 * Created by islam on 17/11/2016.
 */
$(document).on('click', '#close-preview', function(){
    $('.image-preview').popover('hide');
    // Хувер перед закрытием предосмотра картинки
    $('.image-preview').hover(
        function () {
            $('.image-preview').popover('show');
        },
        function () {
            $('.image-preview').popover('hide');
        }
    );
});

$(function() {
    // Создать кнопку закрытия предосмотра картинки
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    //  Контент по умолчанию когда нет картинки
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Просмотр</strong>"+$(closebtn)[0].outerHTML,
        content: "Нет картинки",
        placement:'bottom'
    });
    // Удалить событие
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Файл");
    });
    // Создать картинку для предосмотра
    $(".image-preview-input input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Установка картинки внуть контента
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Изменить");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
});