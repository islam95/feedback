<?php

if($_SESSION['login'] === true) {

    require_once('template/header.php');
    include 'DB.php';

    $db = new DB();
    $sql = "SELECT * FROM otziv";
    $result = $db->query($sql);

    ?>
	<table class="table table-striped table-hover" onload="ajax_request();">
		<thead>
			<tr class="info">
				<th>#</th>
				<th>Картинка</th>
				<th>Имя</th>
				<th>Email</th>
				<th>Статус</th>
				<th style="text-align: center;">Действия</th>
			</tr>
		</thead>
		<tbody>
			<?php

        while ($rows = mysqli_fetch_assoc($result)) {

            ?>
				<tr>
					<td>
						<?php echo $rows['id']; ?>
					</td>
					<td><img src="images/<?php
                    if ($rows['image'] != ''){
                        echo $rows['image'];
                    } else {
                        echo " no_image.png ";
                    }
                    ?>" width="30" height="30"></td>
					<td>
						<?php echo $rows['name']; ?>
					</td>
					<td>
						<?php echo $rows['email']; ?>
					</td>
					<?php
                if ($rows['status_id'] == 1) {
                    echo "<td>Принят</td>";
                } else {
                    echo "<td>Отклонен</td>";
                }
                ?>
						<td align="center">
							<button class="btn btn-success" onclick="ajax_update('accept', <?php echo $rows['id']; ?>);">Принять</button>
							<button class="btn btn-info" onclick="ajax_update('reject', <?php echo $rows['id']; ?>);">Отклонить</button>
							<button class="btn btn-warning" onclick="ajax_edit('edit_request', <?php echo $rows['id']; ?>);">
								<span class="glyphicon glyphicon-pencil"></span></button>
							<button class="btn btn-danger" onclick="ajax_delete(<?php echo $rows['id']; ?>);">
								<span class="glyphicon glyphicon-trash"></span></button>
						</td>
				</tr>

				<?php
        }
        ?>
		</tbody>

	</table>

	<div id="edit_message"></div>
	<div id="edit_form"></div>
	<div id="remove"></div>
	<div id="update"></div>

	<?php
    require_once('template/footer.php');

} else {
    header('LOCATION: ?page=login');
}

?>