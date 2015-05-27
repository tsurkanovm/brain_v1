<?php
/**
 * Created by PhpStorm.
 * User: MiSHa
 * Date: 11.05.2015
 * Time: 16:49
 */


class Router {
    static public function getPage(){
        $request_obj = new Request();
        $controller = $request_obj->controller . 'Controller';
        $file_controller = CONTROLLER_PATH . $controller . '.php';
        if (!is_readable($file_controller)){
            exit('Do not find file ' . $file_controller);
        }
        require_once($file_controller);

        $method = $request_obj-> method;
        $controller = new $controller();
        if(!is_callable(array($controller,$method))){

            $method = DEFINED_MODEL;
        }
        call_user_func(array($controller,$method),$request_obj->params);

    }
}