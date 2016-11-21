<?php require_once('template/header.php');
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
                <th>Действия</th>
                <th style="text-align: center;"><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php

            while ($rows = mysqli_fetch_assoc($result)) {

                ?>
                <tr>
                    <td><?php echo $rows['id']; ?></td>
                    <td><img src="images/<?php echo $rows['image']; ?>" width="30" height="30"></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['email']; ?></td>
                    <?php
                    if ($rows['status_id'] == 1){
                        echo "<td>Принят</td>";
                    } else {
                        echo "<td>Отклонен</td>";
                    }
                    ?>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default" data-toggle="dropdown">Действия <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Принять</a></li>
                                <li><a href="#">Отклонить</a></li>
                            </ul>
                        </div>
                    </td>
                    <td align="center">
                        <button class="btn btn-default" onclick="ajax_edit(<?php echo $rows['id']; ?>);"><span class="glyphicon glyphicon-pencil"></span></button>
                        <button class="btn btn-danger" onclick="ajax_delete(<?php echo $rows['id']; ?>);"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>

                <?php
            }
            ?>
            </tbody>

        </table>

        <div id="edit_form"></div>
        <div id="remove"></div>

        <?php require_once('template/footer.php'); ?>