<?php
/**
 * Created by PhpStorm.
 * User: MiSHa
 * Date: 11.05.2015
 * Time: 15:51
 */


class Request {
    private $controller;
    private $method;
    private $params;

    public function __construct(){
        session_start();

            $uri = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : '';
            //var_dump($uri);
            $uri_array = array_filter(explode('/',$uri));
            //var_dump($uri_array);
            $this->controller = isset($uri_array[1])? $uri_array[1] : DEFINED_CONTROLLER;
            $this->method = isset($uri_array[2])? $uri_array[2] : DEFINED_MODEL;
            $this->params = isset($_REQUEST)? $_REQUEST : array();

//        if( !isset( $_SESSION['current_user'] ) ) {
//            // если пользователь не вошел ещё в систему, то ему разрешено регистрироваться и первый раз зайти в кабинет, в остальных запросах заворачивать на стартовую страницу
//            $this->controller = DEFINED_CONTROLLER;
//            $this->method = DEFINED_MODEL;
//            $this->params = array();
//        }
    }

    public function __get($name){
        return $this->$name;
    }

}