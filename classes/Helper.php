<?php

/**
 * Created by PhpStorm.
 * User: islam
 * Date: 18/11/2016
 * Time: 19:10
 */
class Helper
{
    // Redirecting the user to the specified page
    public static function redirect($url = null){
        if(!empty($url)){
            header("Location: {$url}");
            exit;
        }
    }
}