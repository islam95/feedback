<?php

/**
 * Created by PhpStorm.
 * User: islam
 * Date: 19/11/2016
 * Time: 17:56
 */
class Application
{
    public $db;

    public function __construct() {
        $this->db = new DB(); // new instance of database class.
    }

}