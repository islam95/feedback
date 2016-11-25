<?php
/**
 * Created by PhpStorm.
 * User: islam
 * Date: 18/11/2016
 * Time: 02:51
 */

include '../classes/DB.php';

if ($_REQUEST['send_feed'] != ''){

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];
    $image = $_REQUEST['image'];
    $date = date('Y/m/d H:i:s');
    $db = new DB();

    if($name != '' && $email != '' && $message != '') {
        $insert = "INSERT INTO otziv (name, email, description, date, image) 
                VALUES ('$name', '$email', '$message', '$date', '$image')";
        $result = $db->query($insert);
    }
}

?>



