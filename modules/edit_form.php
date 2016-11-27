<?php
require_once '../classes/DB.php';

$db = new DB();

if($_REQUEST['req_type'] == 'edit_request'){

    $sql = "SELECT * FROM otziv WHERE id = '$_REQUEST[edit_id]'";
    $result = $db->query($sql);

while ($rows = mysqli_fetch_assoc($result)) {

?>

<div class="col-md-8 col-md-offset-2">
    <div class="well well-sm">
        <form class="form-horizontal" action="" method="post" id="my_form" name="my_form">
            <fieldset>
                <!-- Form Name -->
                <legend class="text-center">Изменить отзыв</legend>

                <!-- Name input-->
                <div id="name-error" class="errorForm col-md-offset-1"></div>
                <div class="form-group">
                    <label class="control-label col-md-1"></label>
                    <div class="col-md-9">
                        <input id="name" name="name" value="<?php echo $rows['name']; ?>" type="text" placeholder="Имя" class="form-control" minlength="2" required>
                    </div>
                </div>

                <!-- Email input-->
                <div id="email-error" class="errorForm col-md-offset-1"></div>
                <div class="form-group">
                    <label class="control-label col-md-1"></label>
                    <div class="col-md-9">
                        <input id="email" name="email" value="<?php echo $rows['email']; ?>" type="text" placeholder="Email" class="form-control" required>
                    </div>
                </div>

                <!-- Message body -->
                <div id="message-error" class="errorForm col-md-offset-1"></div>
                <div class="form-group">
                    <label class="control-label col-md-1"></label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="message" name="message" placeholder="Ваш отзыв..." rows="5" required><?php echo $rows['description']; ?></textarea>
                    </div>
                </div>

                <!-- File Button -->
                <div class="form-group">
                    <label class="control-label col-md-1"></label>
                    <div class="input-group image-preview col-md-8">
                    <span class="input-group-btn">
                        <!-- image-preview-clear кнопка -->
                        <button type="button" class="btn btn-danger image-preview-clear" style="display:none;">
                            <span class="glyphicon glyphicon-remove"></span> Удалить
                        </button>
                        <!-- image-preview-input -->
                        <div class="btn btn-info image-preview-input">
                            <span class="glyphicon glyphicon-folder-open"></span>
                            <span class="image-preview-input-title"> Файл</span>
                            <input type="file" accept="image/png, image/jpeg, image/jpg, image/gif" name="input-file-preview"/>
                        </div>
                    </span>
                        <input type="text" value="<?php echo $rows['image']; ?>" id="file" class="form-control image-preview-filename" disabled="disabled">

                    </div>
                </div>

                <!-- Form actions -->
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" onclick="ajax_edit('edit_button', <?php echo $rows['id']; ?>);">Изменить</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>


<?php }

} elseif($_REQUEST['req_type'] == 'edit_button') {

    $sql = "UPDATE otziv SET name = '$_REQUEST[ed_name]', email = '$_REQUEST[ed_email]', description = '$_REQUEST[ed_message]', 
            image = '$_REQUEST[ed_image]', changed = 'Изменен Администратором' WHERE id = '$_REQUEST[edit_id]'";
    $result = $db->query($sql);

}

?>
