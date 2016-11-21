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

function ajax_preview() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;
    var image = document.getElementById('file').value;

    if (name == ''){
        name = '';
    }
    if (email == ''){
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
            var feed_overview = document.getElementById("feed_oreview");
            feed_overview.innerHTML = xmlhttp.responseText;
        }
    }
    // Creating the request
    xmlhttp.open('GET', 'modules/feedback_preview.php?name='+name+'&email='+email+'&message='+message+'&image='+image, true);
    xmlhttp.send(); // Sending the data to the page
}