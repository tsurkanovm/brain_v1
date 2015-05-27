<?php
/**
 * Created by PhpStorm.
 * User: MiSHa
 * Date: 16.05.2015
 * Time: 12:36
 */

class ExerciseModel extends baseModel {
    private $container;
    private $current_exercise = 0;

    public function __construct(){
        $this->fillContainer();
    }

    public function getContent($params){
        $arr_vars = array();

        //session_start();
        $user = $_SESSION['current_user'];


        $arr_vars['test_name'] = 'Exercise';
        $arr_vars['user_name'] = $user->name;
        $arr_vars['title'] = 'Exercise for ' . $user->name;

        $this->getNext($arr_vars);
        //exit(implode(" / ",$arr_vars));

        return $arr_vars;
    }


    private function getNext(&$arr_vars){
        $current_arr =  $this->container[$this->current_exercise];
        $arr_vars[ key($current_arr)] = current($current_arr); // пример
        next($current_arr);
        $arr_vars[ key($current_arr)] = current($current_arr); // ответ

        $this->current_exercise++;
    }

    public function getContentHTML($params){
        if($this->current_exercise > 5){ // переделать 5 брать из настроек

        }
        $arr_vars = array();
        $this->getNext($arr_vars);
        return $arr_vars;
    }
    private function fillContainer(){
        // здесь будет заполенение контейнера с БД
        // сейчас пока вручную:
        $this->container = array(array('expression' => '1 + 1', 'answer' => '2'), array('expression' => '2 + 2', 'answer' => '4'),array('expression' => '3 + 3', 'answer' => '6'),array('expression' => '4 + 4', 'answer' => '8'),array('expression' => '5 + 5', 'answer' => '10'),);
    }
}