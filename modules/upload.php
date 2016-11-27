<?php
/**
 * Created by PhpStorm.
 * User: islam
 * Date: 28/11/2016
 * Time: 00:21
 */

if(isset($_FILES["input-file-preview"]["name"])){

    // Image resizing

    $name = $_FILES["input-file-preview"]["name"];

    $ext = end(explode(".", $name));
    $allowed_ext = array("png", "gif", "jpg", "jpeg");

    if(in_array($ext, $allowed_ext)){

        $new_image = '';
        $new_name = $name;
        $path = '../images/'.$new_name;

        list($width, $height) = getimagesize($_FILES["input-file-preview"]["tmp_name"]);

        if($ext == 'png'){
            $new_image = imagecreatefrompng($_FILES["input-file-preview"]["tmp_name"]);
        }
        if($ext == 'gif'){
            $new_image = imagecreatefromgif($_FILES["input-file-preview"]["tmp_name"]);
        }
        if($ext == 'jpg' || $ext == 'jpeg'){
            $new_image = imagecreatefromjpeg($_FILES["input-file-preview"]["tmp_name"]);
        }

        $new_width = 320;
        $new_height = 240;

        $tmp_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($tmp_image, $new_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        imagejpeg($tmp_image, $path, 100);
        imagedestroy($new_image);
        imagedestroy($tmp_image);

    } else {
        echo 'Только файл картинки можно загрузить на сервер!';
    }
}

?>