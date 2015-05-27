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
            <h1><?= $user_name ?></h1>
            <hr>



    <div id="AccResultsBlock">
       <!-- <p> <?= $test_name ?></p> -->

            <table cellpadding="10" cellspacing="10">
                <tr>
                    <td>
                        Лучший результат:
                    </td>
                    <td>
                        <?= $best_result ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Последний результат:
                    </td>
                    <td>
                        <?= $last_result ?>
                    </td>
                </tr>
            </table>
        <br>

        <form action="<?= $test_path ?>" method="post">
            <input type="submit" name="launch_t1" value="Запустить тест"/>
        </form>
        <form action="<?= $quit_path ?>" method="post">
            <input type="submit" name="quit" value="Выйти"/>
        </form>

    </div>


        </div>


    </body>
</html>