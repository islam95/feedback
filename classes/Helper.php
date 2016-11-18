<?php

/**
 * Created by PhpStorm.
 * User: islam
 * Date: 18/11/2016
 * Time: 19:10
 */
class Helper
{
    // Проверка ввода html, js тагов.
    public static function encodeHTML($str, $case = 2) {
        switch($case) {

            case 1:
                return htmlentities($str, ENT_NOQUOTES, 'UTF-8', false);
                break;

            case 2:
                $chars = '<([a-zA-Z0-9\.\, "\'_\/\-\+~=;:\(\)?&#%![\]@]+)>';
                // Put text only, divided with html tags into array.
                $text = preg_split('/' . $chars . '/', $str);
                // Array for cleaned output.
                $textCleaned = array();

                foreach($text as $key => $value) {
                    $textCleaned[$key] = htmlentities(html_entity_decode($value, ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');
                }
                foreach($text as $key => $value) {
                    $str = str_replace($value, $textCleaned[$key], $str);
                }
                return $str;
                break;
        }
    }

    // Redirecting the user to the specified page
    public static function redirect($url = null){
        if(!empty($url)){
            header("Location: {$url}");
            exit;
        }
    }

    // Sets the date in different formats
    public static function setDate($case = null, $date = null){
        $date = empty($date) ? time() : strtotime($date);
        switch($case){

            case 1:
                return date('d/m/Y', $date); // day/month/year
                break;

            case 2:
                // Full day and time representation:
                // Sunday, 1st May 2015, 14:37:52
                return date('l, jS F Y, H:i:s', $date);
                break;

            default:
                return date('Y-m-d H:i:s', $date);
        }
    }

    // Cleaning the string from illegal characters in any fields.
    public static function cleanString($name = null) {
        if(!empty($name)) {
            return strtolower(preg_replace('/[^a-zA-Z0-9.]/', '-', $name));
        }
    }



}