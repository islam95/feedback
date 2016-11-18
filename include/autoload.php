<?php
/**
 * Created by PhpStorm.
 * User: islam
 * Date: 18/11/2016
 * Time: 18:04
 */

require_once('config.php');

function __autoload($class_name) {
    $class = explode("_", $class_name); // devides any class names by "_" and puts into array
    $path = implode("/", $class).".php"; // concatenates an array using "/". E.g. folder/file.php
    require_once($path);
}