<?php
ob_start();
require('Templates/header.html');
$str_header = ob_get_clean();

?>

<!DOCTYPE html>
<html>
<?=$str_header?>

    <body>

        <div id="Content">
        <p><?= $content ?></p>


        <div id="RegistrationBlock">
            <form action="<?= $action_path ?>" method="post">
                <label for="name"> Пользователь: </label>
                <input id = "name" type="text" name="name">
                <br>
                <label for="psw"> Пароль: </label>
                <input id = "psw" type="password" name="psw">
                <br>
                <input type="submit" name="new" value="Зарегистрироваться">
            </form>
        </div>
            
        </div>
    </body>
</html>