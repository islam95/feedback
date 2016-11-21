<?php
/**
 * Created by PhpStorm.
 * User: islam
 * Date: 21/11/2016
 * Time: 21:54
 */

require_once '../classes/DB.php';

$db = new DB();

if($_REQUEST['delete_id'] != '') {

    $sql = "DELETE FROM otziv WHERE id = '$_REQUEST[delete_id]'";
    $result = $db->query($sql);
}