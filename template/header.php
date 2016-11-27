
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Отзывы</title>
    <meta name="description" content="Отзывы ославленные пользователями">
    <meta name="author" content="Islam Dudaev">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">

    <!-- Ajax javascript for ajax request -->
    <script src="js/ajax.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body onload="ajax_onload('sort_date')">

<div class="container">
    <div class="row">

        <?php

        $image = 'images/no_image.png';
        list($width, $height) = getimagesize($image);

        echo "width: " . $width . "<br />";
        echo "height: " .  $height;

        if($width > 320 || $height > 240){

        }


        list($width, $height) = getimagesize($image);

        echo "width: " . $width . "<br />";
        echo "height: " .  $height;



        function scaleImage($file) {

            $source_pic = $file;
            $max_width = 250;
            $max_height = 250;

            list($width, $height, $image_type) = getimagesize($file);

            switch ($image_type)
            {
                case 1: $src = imagecreatefromgif($file); break;
                case 2: $src = imagecreatefromjpeg($file);  break;
                case 3: $src = imagecreatefrompng($file); break;
                default: return '';  break;
            }

            $x_ratio = $max_width / $width;
            $y_ratio = $max_height / $height;

            if( ($width <= $max_width) && ($height <= $max_height) ){
                $tn_width = $width;
                $tn_height = $height;
            }elseif (($x_ratio * $height) < $max_height){
                $tn_height = ceil($x_ratio * $height);
                $tn_width = $max_width;
            }else{
                $tn_width = ceil($y_ratio * $width);
                $tn_height = $max_height;
            }

            $tmp = imagecreatetruecolor($tn_width,$tn_height);

            /* Check if this image is PNG or GIF, then set if Transparent*/
            if(($image_type == 1) || ($image_type==3))
            {
                imagealphablending($tmp, false);
                imagesavealpha($tmp,true);
                $transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
                imagefilledrectangle($tmp, 0, 0, $tn_width, $tn_height, $transparent);
            }
            imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);

            /*
             * imageXXX() only has two options, save as a file, or send to the browser.
             * It does not provide you the oppurtunity to manipulate the final GIF/JPG/PNG file stream
             * So I start the output buffering, use imageXXX() to output the data stream to the browser,
             * get the contents of the stream, and use clean to silently discard the buffered contents.
             */
            ob_start();

            switch ($image_type)
            {
                case 1: imagegif($tmp); break;
                case 2: imagejpeg($tmp, NULL, 100);  break; // best quality
                case 3: imagepng($tmp, NULL, 0); break; // no compression
                default: echo ''; break;
            }

            $final_image = ob_get_contents();

            ob_end_clean();

            return $final_image;
        }


        $image1 = scaleImage($image);







        function compress($source, $destination, $quality) {

            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg')
                $image = imagecreatefromjpeg($source);

            elseif ($info['mime'] == 'image/gif')
                $image = imagecreatefromgif($source);

            elseif ($info['mime'] == 'image/png')
                $image = imagecreatefrompng($source);

            imagejpeg($image, $destination, $quality);

            return $destination;
        }

        $source_img = 'images/no_image.png';
        $destination_img = 'images/compressed_no_image.png';

        $d = compress($source_img, $destination_img, 90);

        ?>
