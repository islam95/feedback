/**
 * Created by islam on 19/11/2016.
 */

function ajax_request() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var test_div = document.getElementById("test");
            test_div.innerHTML = xmlhttp.responseText;
        }
    }
    // Creating the request
    xmlhttp.open('GET', 'modules/feedback_preview.php', true);
    xmlhttp.send(); // Sending the data to the page
}