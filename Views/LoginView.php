<?php
ob_start();
require('Templates/header.html');
$str_header = ob_get_clean();

?>

<!DOCTYPE html>
<html>
<?=$str_header?>    <body>

        <div id="LoginBlock">
            <form method="post">
                <label for="name"> Пользователь: </label>
                <input id = "name" type="text" name="name">
                <br>
                <label for="psw"> Пароль: </label>
                <input id = "psw" type="password" name="psw">
                <br>
                <input type="submit" name="get" value="Войти">
                <br>
                Запомнить меня на этом компьютере <input type="checkbox" name="remember_me">
                <br>
                <a href="<?= $registration_page ?>" target="_self"> Зарегистрироваться </a>
            </form>
        </div>

        <div id="Content">
            <h1><?= $content ?></h1>
            <p>
                This site for brain training. Test programs base on Ryuta Kawashima research and his book "Train Your Brain: 60 Days to a Better Brain".
            </p>
        </div>





    </body>
    </html>