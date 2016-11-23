<?php

if ($_REQUEST['preview_feed'] != ''){

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];
    $image = $_REQUEST['image'];
    $date = date('Y/m/d H:i:s');

}

?>

<div class="well well-sm">
    <div class="media">

        <div class="media-left">
            <img class="media-object" src="images/<?php echo $image; ?>" width="80" height="60" alt="">
        </div>

        <div class="media-body">
            <h4 class="media-heading text-capitalize"><?php echo $name; ?>
                <small class="pull-right"><em><?php echo $date; ?></em></small></h4>
            <?php echo $message; ?>
        </div>

    </div>
</div>