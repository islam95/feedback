/**
 * Created by islam on 19/11/2016.
 */

function ajax_onload() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var all_feed = document.getElementById("all_feed");
            all_feed.innerHTML = xmlhttp.responseText;
        }
    }
    // Creating the request
    xmlhttp.open('GET', 'modules/all_feedbacks.php', true);
    xmlhttp.send(); // Sending the data to the page
}

function ajax_send(send_feedback) {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;
    var image = document.getElementById('file').value;

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var feed_send = document.getElementById("feed_send");
            feed_send.innerHTML = xmlhttp.responseText;
        }
    }
    // Creating the request
    xmlhttp.open('GET', 'modules/feedback_send.php?send_feed='+send_feedback+'&name='+
        name+'&email='+email+'&message='+message+'&image='+image, true);
    xmlhttp.send(); // Sending the data to the page
}

function ajax_preview(preview_feedback) {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;
    var image = document.getElementById('file').value;

    if(preview_feedback == ''){
        preview_feedback = '';
    }
    if(name == ''){
        name = '';
    }
    if(email == ''){
        email = '';
    }
    if (message == ''){
        message = '';
    }
    if (image == ''){
        image = '';
    }

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var feed_preview = document.getElementById("feed_preview");
            feed_preview.innerHTML = xmlhttp.responseText;
        }
    }
    // Creating the request
    xmlhttp.open('GET', 'modules/feedback_preview.php?preview_feed='+preview_feedback+'&name='+
        name+'&email='+email+'&message='+message+'&image='+image, true);
    xmlhttp.send(); // Sending the data to the page
}

function ajax_edit(edit_id) {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var edit_form = document.getElementById("edit_form");
            edit_form.innerHTML = xmlhttp.responseText;
        }
    }
    // Creating the request
    xmlhttp.open('GET', 'modules/edit_form.php?edit_id='+edit_id, true);
    xmlhttp.send(); // Sending the data to the page
}

function ajax_delete(delete_id) {

    var xml = new XMLHttpRequest();

    xml.onreadystatechange = function () {
        if (xml.readyState == 4 && xml.status == 200){
            var remove = document.getElementById("remove");
            location.reload();
            remove.innerHTML = '<div style="padding: 20px;" class="bg-success">Отзыв успешно удалён!</div>';
        }
    }

    // Creating the request
    xml.open('GET', 'modules/delete.php?delete_id='+delete_id, true);
    xml.send(); // Sending the data to the page
}