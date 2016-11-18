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
        $this->connectToDB = mysql_connect($this->db_host, $this->db_user, $this->db_password);
        if (!$this->connectToDB) {
            die("Database connection error!<br><br>" . mysql_error());
        } else {
            $select = mysql_select_db($this->db_name, $this->connectToDB);
            if (!$select) {
                die("Database selection error!<br><br>" . mysql_error());
            }
        }
        mysql_set_charset("utf8", $this->connectToDB);
    }

    // closing the connection
    public function close() {
        if (!mysql_close($this->connectToDB)) {
            die("Closing connection failed.");
        }
    }

}