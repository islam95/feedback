<?php
/**
 * Created by PhpStorm.
 * User: islam
 * Date: 25/11/2016
 * Time: 11:08
 */

require_once '../classes/DB.php';

$db = new DB();

if($_REQUEST['id'] != '') {

    if($_REQUEST['req_type'] == 'accept') {

        $sql = "UPDATE otziv SET status_id = 1 WHERE id = '$_REQUEST[id]'";
        $result = $db->query($sql);

    } else if($_REQUEST['req_type'] == 'reject') {

        $sql = "UPDATE otziv SET status_id = 2 WHERE id = '$_REQUEST[id]'";
        $result = $db->query($sql);
    }


}