<?php
/**
 * Created by PhpStorm.
 * User: islam
 * Date: 24/11/2016
 * Time: 14:25
 */
    require_once('header.php');

    $username = $password = $userError = $passError = '';

    if (isset($_POST['enter'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === 'admin' && $password === '123') {
            $_SESSION['login'] = true;
            header('LOCATION: ?page=admin_table');
            die();
        }

        /*
        if ($username !== 'admin') $userError = 'Неверный логин.';
        if ($password !== '123') $passError = 'Неверный пароль.';
        */
    }

    ?>

    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Админ Логин</strong>
            </div>
            <div class="panel-body">
                <form role="form" action="" method="POST">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span>
                                        <input class="form-control" placeholder="Логин" name="username" type="text"
                                               autofocus>
                                        <div class='errorForm'><?php //echo $userError; ?></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
                                        <input class="form-control" placeholder="******" name="password"
                                               type="password">
                                        <div class='errorForm'><?php //echo $userError; ?></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-offset-1">
                                    <input type="submit" name="enter" class="btn btn-lg btn-primary btn-block"
                                           value="Войти">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <?php require_once('footer.php'); ?>