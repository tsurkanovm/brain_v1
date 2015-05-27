<?php
/**
 * Created by PhpStorm.
 * User: MiSHa
 * Date: 12.05.2015
 * Time: 12:13
 */

/*
 * контроллер стартовой страницы
 * имеет пока два вида - вход в кабинет index
 * и неудачный вход failReg
 * */
class LoginController extends baseController {
    public function index($param){

        require_once('Models/LoginModel.php');
        $model_obj = new LoginModel();
        $content = $model_obj->getContent($param);
        extract($content);

        require_once('Views/LoginView.php');
    }
}