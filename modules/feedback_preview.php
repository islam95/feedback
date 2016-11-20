<?php
include '../classes/DB.php';

$db = new DB();
$sql = "SELECT * FROM otziv";
$result = $db->query($sql);

while ($rows = mysqli_fetch_assoc($result)){

    ?>

<div class="well well-sm">
    <div class="media">
        <div class="media-left">
            <img class="media-object" src="images/<?php echo $rows['image']; ?>" alt="">
        </div>
        <div class="media-body">
            <h4 class="media-heading text-capitalize"><?php echo $rows['name']; ?>
                <small class="pull-right"><em><?php echo $rows['date']; ?></em></small></h4>
            <?php echo $rows['description']; ?>
        </div>
    </div>
</div>

<?php
}
?>