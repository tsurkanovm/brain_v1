<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 13.05.2015
 * Time: 14:17
 */

class User {
    /*
     * Свойства: все протектные
     * 1. Имя
     * 2. ИД
     * 3. Роль

     * Методы:
     *  1. static поиск по имени + коннект (два праметра)
     * bool
     * 2. static поиск по имени и паролю + коннект (три параметра или в первом массив) - можно передать массив, тогда парм+коннект буду искаться из массива с предопределнными ключами
     * экземпляр класса или false
     * 3. конструктор по массиву
     * протект только через поиск
     * */

    protected $name;
    protected $id;
    protected $role;
    protected static $connection; // maybe do this property static? if its null - filled - else - used!!!

    public function __construct($params){
        try{
            $result = $this->removeUserFromBD($params);
            $result = $result[0];
            $this->id = $result['id'];
            $this->name = $result['title'];
            //$this->role = $result['role'];
        }catch (Exception $e){
            $this->name = $e->getMessage();
            $this->id = 'error';
        }
    }

    public function __get($name){
        return $this->$name;
    }

    private function removeUserFromBD($params){
        self::checkParamsArray($params);
        self::launchConnection();

        $name = $params['name'];
        $psw = sha1($params['psw']);

        if(isset($params['new'])){
            // инсерт в базу с именем и паролем (через трай)


            $sql = "insert into users values( NULL ,'$name', '$psw','' )"; // после нужен запрос к бд, иначе возвращает булево
            return self::$connection->query($sql);

        } elseif(isset($params['get'])){
            // селект по имени и паролю
            // если пусто то ошибка
            // возврат массива с результатами
            $sql = "select * from users where title = '$name' and psw = '$psw'"; //- добавить соединение для получения роли
            return self::$connection->query($sql);
        } else throw new Exception('Invalid params array (get, new)');
    }

    protected static function checkParamsArray($params){
        $name = '';
        $psw = '';
        if(isset($params['name']) ) {
            $name = $params['name'];
        }
        if(isset($params['psw']) ) {
            $psw = $params['psw'];
        }

        if(!$name || !$psw) {
            throw new Exception('Invalid params array (name, psw)');
        }
    }

    public function __toString(){
        return $this->name;
    }

    protected static function launchConnection(){
        require_once('ConnectDB.php');
        if(self::$connection instanceof ConnectDB){
            return;
        }

        self::$connection = new ConnectDB( HOST_CONNECTION,USER_CONNECTION,PSW_CONNECTION,BD_CONNECTION );
    }
}