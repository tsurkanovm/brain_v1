<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 13.05.2015
 * Time: 15:48
 */

class ExerciseController extends baseController{
    public function index($param){
        if( !isset( $_SESSION['exercise_model_obj'] ) ){
           // значит первый вход в тест из кабинета по кнопке
           // стандартно подключаем модель и вью:


            $model_obj = new ExerciseModel();
            $content = $model_obj->getContent($param);

            $_SESSION['exercise_model_obj'] = $model_obj; // перезапишем последний вариант в сессию

            extract($content);
            require_once('Views/ExerciseView.php');
        } else{
           // обращение по AJAX
           // модель теста уже создавалась и она заполнена
           //  восстановим и запустим выдачу ответа:
            $model_obj = $_SESSION['exercise_model_obj'];
            $content = $model_obj -> getContentHTML($param);
            $_SESSION['exercise_model_obj'] = $model_obj; // перезапишем последний вариант в сессию

            extract($content);
            ob_start();
            include('Templates/ExercisePattern.html');
            $html_for_ajax = ob_get_clean();

            echo $html_for_ajax;
        }


    }


}