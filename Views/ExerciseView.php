
<?php
    ob_start();
    require('Templates/header.html');
    $str_header = ob_get_clean();

    ob_start();
    require('Templates/ExercisePattern.html');
    $str_first_sample = ob_get_clean();
?>

<!DOCTYPE html>
<html>
<?=$str_header?>
    <body>
    <div id ="Content">
        <h1><?= $user_name ?></h1>
        <p> <?= $test_name ?></p>
        <br/>
        <br/>
        <br/>
        <br/>
        <form name=clockform>
            <!-- <input name=clearer type=button value=" Обнулить " onclick="clearALL()" style="font-size:15px; color: #000000; width: 85px"> -->
            <input name=clock size=10 value="00:00:00.00" onclick="findTIME()" style="font-size:13px; color:#000000; width: 80px; height: 24px; border:1px solid #000000">
<!--            <input name=starter type=button value="Старт таймера (секундомер) / Пауза / Продолжить" onclick="findTIME()" style="font-size:13px; color: #000000; width: 360px">-->
        </form>
        <br/>
        <br/>
        <br/>
        <br/>
    </div>



        <div id ="ExerciseBlocks">

            <?=$str_first_sample?>


        </div>

    </body>
</html>