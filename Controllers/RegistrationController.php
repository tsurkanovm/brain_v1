<?php
/**
 * Created by PhpStorm.
 * User: MiSHa
 * Date: 18.05.2015
 * Time: 12:15
 */

class RegistrationController extends baseController {
    public function index($param){

        require_once('Models/RegistrationModel.php');
        $model_obj = new RegistrationModel();
        $content = $model_obj->getContent($param);

        extract($content);

        require_once('Views/RegistrationView.php');

    }
}