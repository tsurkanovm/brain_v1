<?php
/**
 * Created by PhpStorm.
 * User: MiSHa
 * Date: 27.04.2015
 * Time: 17:19
 */


class ConnectDB {
    protected $connection;

    public function __construct($host, $user, $password, $db_name){
        $this->connection = new mysqli($host, $user, $password, $db_name);

        if( mysqli_connect_error() ){
            throw new Exception("Could not connect to DB {$db_name} on host {$host}");
        }
    }

    public function query($sql){
        if ( !$this->connection ){
            return false;
        }

        $result = $this->connection->query($sql);

        //var_dump($result);
        if ( mysqli_error($this->connection) ){
            throw new Exception(mysqli_error($this->connection));
        }

        if ( is_bool($result) ){
            return $result;
        }

        $data = array();
        while( $row = mysqli_fetch_assoc($result) ){
            $data[] = $row;
        }
        mysqli_free_result($result);// непонял зачем освобождать память от результата? можно просто убить переменную...
        return $data;
    }

    public function escape($str){
        return mysqli_escape_string($this->connection, $str); // типа экранирует спец символы, но тоже не очень пока понятно
    }
}