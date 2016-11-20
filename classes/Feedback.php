<?php

/**
 * Created by PhpStorm.
 * User: islam
 * Date: 19/11/2016
 * Time: 18:11
 */
class Feedback extends Application
{
    private $feedback = 'otziv';

    public function getFeedback() {
        $sql = "SELECT * FROM `{$this->feedback}`
				WHERE `id` = 1";
        return $this->db->getOneRecord($sql);
    }

    /*
    public function updateFeedback($fields = null){
        if(!empty($fields)){
            $this->db->update($fields);
            return $this->db->updateTable($this->feedback, 1);
        }
    }
    */



}