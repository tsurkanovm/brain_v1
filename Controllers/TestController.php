<?php
/**
 * Created by PhpStorm.
 * User: MiSHa
 * Date: 20.05.2015
 * Time: 17:08
 */

class TestController extends baseController
{
    public function index($param)
    {

       // echo 'HELLO!!';

        $model_obj = $_SESSION['exercise_model_obj'];
        $content = $model_obj -> getContentHTML($param);
        $_SESSION['exercise_model_obj'] = $model_obj; // перезапишем последний вариант в сессию

        extract($content);
        ob_start();
        require_once('Templates/ExercisePattern.html');
        $html_for_ajax = ob_get_contents();

        echo $html_for_ajax;

    }
}