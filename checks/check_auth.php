<?php

$host = 'localhost';
$user = 'root';
$password = 'root';

$name = 'testdb';
$login = filter_var(trim($_POST['logauth']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['passauth']), FILTER_SANITIZE_STRING);

include('bd_connection.php');


$mysqli = new mysqli($host, $user, $password, $name);

$res = $mysqli->query("SELECT * FROM users WHERE login='$login' AND password='$pass'");

$user = $res -> fetch_assoc();



if(count($user) == 0) {
    echo "User not founded";
    exit();
}



setcookie('user', $user['login'], time() + 3600*24*7, '/');



header('Location: /lv_13_08_project/');
$mysqli -> close();
?>