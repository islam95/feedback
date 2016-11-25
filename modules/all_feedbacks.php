<?php
/**
 * Created by PhpStorm.
 * User: islam
 * Date: 20/11/2016
 * Time: 21:19
 */
include '../classes/DB.php';
$db = new DB();
$sql = "SELECT * FROM otziv WHERE status_id = 1 ORDER BY date DESC";

$result = $db->query($sql);

while ($rows = mysqli_fetch_assoc($result)){
    ?>

    <div class="well well-sm">
        <div class="media">
            <div class="media-left">

                <img class="media-object" src="images/<?php

                    if ($rows['image'] != ''){
                        echo $rows['image'];
                    } else {
                        echo "no_image.png";
                    }

                ?>" width="80" height="60" alt="">
            </div>
            <div class="media-body">
                <h4 class="media-heading text-capitalize"><?php echo $rows['name']; ?>
                    <small><?php echo $rows['changed']; ?></small>
                    <small class="pull-right"><em><?php echo $rows['date']; ?></em></small></h4>
                <?php echo $rows['description']; ?>

            </div>
        </div>
    </div>

    <?php
}
?>