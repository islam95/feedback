<?php

/**
 * Created by PhpStorm.
 * User: islam
 * Date: 24/11/2016
 * Time: 11:59
 */
class Otziv extends Application
{
    private $otziv = 'otziv';
    private $status = 'status';

    private $id = null;

    public function getAllFeed($feed_id = null){
        $feed_id = !empty($feed_id) ? $feed_id : $this->id;
        $sql = "SELECT * FROM {$this->otziv} ORDER BY date DESC";
        return $this->db->getAllRecords($sql);
    }





}