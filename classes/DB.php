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

    public $id;
    // for inserting records to the database.
    public $insert_keys = array();
    public $insert_values = array();
    // for updating records.
    public $update_records = array();

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

    // To escape all illegal characters for interacting with the database.
    public function escape($value) {
        // For the PHP higher versions
        if(function_exists("mysqli_real_escape_string")) {
            if (get_magic_quotes_gpc()) {
                $value = stripslashes($value);
            }
            $value = mysqli_real_escape_string($this->connectToDB, $value);
        } else { // For the PHP lower versions
            if(!get_magic_quotes_gpc()) {
                $value = addcslashes($value);
            }
        }
        return $value;
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

    // To get all records from the table in db
    public function getAllRecords($sql) {
        $result = $this->query($sql);
        $output = array();
        while($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }
        mysqli_free_result($result);
        return $output;
    }

    // To get just one specific record from the table in db
    public function getOneRecord($sql) {
        $output = $this->getAllRecords($sql);
        return array_shift($output);
    }

    // the id of the lastly inserted record to the database
    public function lastID() {
        return mysqli_insert_id($this->connectToDB);
    }



}