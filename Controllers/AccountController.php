<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 13.05.2015
 * Time: 15:48
 */

class AccountController extends baseController
{
    public function index($param)
    {


        $model_obj = new AccountModel();
        $content = $model_obj->getContent($param);


        extract($content);
        require_once('Views/AccountView.php');

    }

    public function logOut($param)
    {
        session_destroy();
        header('Location:'. 'http://localhost/brain_v1/');
        exit();

    }

    public function writeResult($param){
        //пишем результат с массива $_GET в БД


        // очищаем переменную сенса с моделью теста
        unset( $_SESSION['exercise_model_obj'] );

        // и запускаем кабинет, он должен подтянуть последние результаты
        $this->index($param);
    }
}