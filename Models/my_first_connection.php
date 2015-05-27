<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 10.04.2015
 * Time: 16:58
 */
$db = new mysqli('localhost','admin','111','test');
if(mysql_errno()){
    echo 'error fackin chit';
    exit;
}

echo "<pre>";

$user_input = '111';
$hash_psw = crypt($user_input,password_hash($user_input,1));
$user_name = "Pikle";
$city = "Kiev";
$role = "admin";
$query = "insert into users values( ?, ?, ?, ? )";
$stmt = $db->prepare($query);
$stmt->bind_param("ssss",$user_name,$hash_psw,$city,$role);
$stmt->execute();

//var_dump($stmt);
//var_dump($hash_psw);
var_dump($stmt->error);
//if (hash_equals($hash_psw, crypt($user_input,$hash_psw) )){
//    echo "its working!!";
//}
//else{
//    echo 'something wrong!';
//}

//$num = $result->num_rows;
//
//if($result) {
//    for( $i=0; $i<$num; $i++ ){
//        $row = $result->fetch_assoc();
//        echo "<pre>";
//        print_r($row);
//    }
//
//} else{
//    echo 'something wrong!';
//}

$stmt->close();