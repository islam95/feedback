/**
 * Created by islam on 19/11/2016.
 */

function ajax_onload(sort) {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var all_feed = document.getElementById("all_feed");
            all_feed.innerHTML = xmlhttp.responseText;
        }
    }
    // Creating the request
    xmlhttp.open('GET', 'modules/all_feedbacks.php?sort='+sort, true);
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
            window.location.reload();
        }
    }
    // Creating the request
    xmlhttp.open('GET', 'modules/feedback_send.php?send_feed='+send_feedback+'&name='+
        name+'&email='+email+'&message='+message+'&image='+image, true);
    xmlhttp.send(); // Sending the data to the page
}

function ajax_edit(req_type, edit_id) {

    if(req_type == 'edit_request'){
        ed_name = '';
        ed_email = '';
        ed_message = '';
        ed_image = '';
    } else {
        var ed_name = document.getElementById('name').value;
        var ed_email = document.getElementById('email').value;
        var ed_message = document.getElementById('message').value;
        var ed_image = document.getElementById('file').value;
    }

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var edit_form = document.getElementById("edit_form");
            edit_form.innerHTML = xmlhttp.responseText;

            if(req_type == 'edit_button'){
                /*
                var edit_message = document.getElementById("edit_message");
                edit_message.innerHTML = '<div style="padding: 20px;" class="bg-success">Отзыв успешно изменён!</div>';
                */
               // window.location.reload();
            }

        }
    }
    // Creating the request
    xmlhttp.open('GET', 'modules/edit_form.php?req_type='+req_type+'&edit_id='+edit_id+
        '&ed_name='+ed_name+'&ed_email='+ed_email+'&ed_message='+ed_message+'&ed_image='+ed_image, true);
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

function ajax_update(req_type, id) {

    var xml = new XMLHttpRequest();

    xml.onreadystatechange = function () {
        if (xml.readyState == 4 && xml.status == 200){
            var update = document.getElementById("update");
            location.reload();
            update.innerHTML = '<p style="padding: 20px;" class="bg-success">Отзыв успешно обнавлён!</p>';
        }
    }

    // Creating the request
    xml.open('GET', 'modules/update.php?req_type='+req_type+'&id='+id, true);
    xml.send(); // Sending the data to the page
}