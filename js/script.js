$(document).ready(function () {
    $('#feed_preview').hide();
});

$(document).on('click', '#preview-btn', function () {

    $('#feed_preview').slideDown('slow');
    var name = $("#name").val();
    var email = $("#email").val();
    var message = $("#message").val();
    var image = $("#file").val();

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();

    if(dd < 10){
        dd = '0' + dd;
    }
    if(mm < 10){
        mm = '0' + mm;
    }
    if(h < 10){
        h = '0' + h;
    }
    if(m < 10){
        m = '0' + m;
    }
    if(s < 10){
        s = '0' + s;
    }

    var today = yyyy + '-' + dd + '-' + mm + " " + h + ":" + m + ":" + s;

    $('#pre_image').html('<img src="images/'+image+'" width="80" height="60" alt=""/>');
    $('#pre_name').html(name);
    $('#pre_message').html(message);
    $('#pre_date').html(today);

    $('#feed_preview').show();
}); // preview

document.my_form.name.onblur = function () {
    if(document.my_form.name.value === ""){
        document.getElementById("name-error").innerHTML = "Пожалуйста, введите своё имя";
    } else {
        document.getElementById("name-error").innerHTML = "";
    }
} //name

document.my_form.email.onblur = function () {

    var email = document.my_form.email.value;
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (email === ""){
        document.getElementById('email-error').innerHTML = "Пожалуйста, введите свой email";
    } else if (!(re.test(email))) {
        document.getElementById('email-error').innerHTML = "Пожайлуйста, введите правильный email";
    } else {
        document.getElementById("email-error").innerHTML = "";
    }

} //email

document.my_form.message.onblur = function () {
    if(document.my_form.message.value === ""){
        document.getElementById("message-error").innerHTML = "Пожалуйста, введите ваш отзыв";
    } else {
        document.getElementById("message-error").innerHTML = "";
    }
} //message

