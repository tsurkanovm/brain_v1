<?php
/**
 * Created by PhpStorm.
 * User: MiSHa
 * Date: 12.05.2015
 * Time: 14:52
 */

class LoginModel extends baseModel
{
    public function getContent($param){




        if (!$param) {
        // нет параметров, первый вход на главную страницу сайта

            return array('title' => 'Login page', 'registration_page' => $_SERVER['PHP_SELF'] . '/registration/','content' => 'Train your brain');

        }
        else{
            /* вход с параметрами
             1. error_enter - гетом пренаправили с описанием ошибки
             2. постом получили страницу для регистрации
            */

            // 1.
            if (isset($param['error_enter'])){
                return $param['error_enter'];
            }

            /* 2.
             проверка пост параметров осуществляется на клиенте
             здесь сразу к проверке наличия в базе данных
            */


            // добавляем к параметрам экземпляр коннекта
            $result = $this->checkUser($param);
            /*
             * если вернулась строка - возвращаем её
             * иначе - екземпляр юзера записываем в переменную сеанса
             * и изменяем локейшн на страницу кабинета
             * */

            if($result instanceof User){
                //session_start();
                $_SESSION['current_user'] = $result;
                header('Location:'.$_SERVER['PHP_SELF'].'/account/index');
                exit;
            }
            return $result;
        }

    }

    private function checkUser($param){

        $us = new User($param);

        if($us->id == 'error'){
            return $us->name;
        }
        return $us;
    }
}