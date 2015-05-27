<?php
/**
 * Created by PhpStorm.
 * User: MiSHa
 * Date: 16.05.2015
 * Time: 12:36
 */

class AccountModel extends baseModel {
    public function getContent($params){
        $arr_vars = array();


        //session_start();
        $user = $_SESSION['current_user'];


        $arr_vars['user_name'] = $user->name;
        $arr_vars['test_path'] = 'http://localhost/brain_v1/Exercise/';
        $arr_vars['quit_path'] = 'http://localhost/brain_v1/Account/logOut';
        $arr_vars['title'] = $user->name . '\'s personal account page ';
        $arr_vars['best_result'] = 'Here will be the best result';
        $arr_vars['last_result'] = (isset($_GET['time'])) ? $_GET['time'] : 'Not found the last result';
//        $arr_vars['e1'] = '1 + 1';
//        $arr_vars['answer1'] = 2;


        return $arr_vars;
    }

}