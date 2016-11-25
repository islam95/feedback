<?php

/**
 * Created by PhpStorm.
 * User: islam
 * Date: 18/11/2016
 * Time: 19:44
 */
class DB
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_password = "";
    private $db_name = "feedback";
    private $connectToDB = false;

    public $last_query = null;
    public $affected_rows = 0;


    // Constructor of this class. Executed automatically when this class is instantiated
    public function __construct() {
        $this->connect(); // connecting to the database.
    }

    // Connecting to the database
    private function connect() {
        $this->connectToDB = mysqli_connect($this->db_host, $this->db_user, $this->db_password);
        if (!$this->connectToDB) {
            die("Ошибка соединения с базой данных!<br><br>" . mysqli_connect_error());
        } else {
            $select = mysqli_select_db($this->connectToDB, $this->db_name);
            if (!$select) {
                die("Ошибка выбора базы данных!<br><br>" . mysqli_connect_error());
            }
        }
        mysqli_set_charset($this->connectToDB, "utf8");
    }

    // closing the connection
    public function close() {
        if (!mysqli_close($this->connectToDB)) {
            die("Ошибка при закрытии соединения с базой данных.");
        }
    }

    public function query($sql) {
        $this->last_query = $sql;
        $result = mysqli_query($this->connectToDB, $sql);
        $this->displayQuery($result);
        return $result;
    }

    public function displayQuery($result) {
        if(!$result) {
            $print  = "Ошибка в функции query: ". mysqli_connect_error() . "<br>";
            $print .= "Последним sql query был: ".$this->last_query;
            die($print);
        } else {
            $this->affected_rows = mysqli_affected_rows($this->connectToDB);
        }
    }


}