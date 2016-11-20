<?php require_once('header.php'); ?>

    <table class="table table-striped table-hover">
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
            <tr>
                <td>1</td>
                <td><img src="#" /></td>
                <td>Ислам</td>
                <td>islam.uk@mail.ru</td>
                <td>Принят</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-default" data-toggle="dropdown">Действия <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Принять</a></li>
                            <li><a href="#">Отклонить</a></li>
                        </ul>
                    </div>
                </td>
                <td align="center">
                    <button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
                    <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                </td>
            </tr>
        </tbody>
    </table>

<?php require_once('footer.php'); ?>