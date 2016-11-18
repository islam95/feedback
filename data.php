<?php
/**
 * Created by PhpStorm.
 * User: islam
 * Date: 18/11/2016
 * Time: 02:51
 */

    $names[] = 'Islam';
    $names[] = 'John';
    $names[] = 'Somename';
    $names[] = 'Same';
    $names[] = 'Plus';
    $names[] = 'Createsdfj';

$count = 1;

foreach ($names as $name) {

    if ($_REQUEST['var1'] == $name){
        echo "<div style='color: greenyellow;'>$_REQUEST[var1] is available</div>";
    }
}



?>