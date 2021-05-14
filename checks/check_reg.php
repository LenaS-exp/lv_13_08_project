<?php
$host = 'localhost';
$user = 'root';
$password = 'root';

$name = 'testdb';

$login = filter_var(trim($_POST['logreg']), FILTER_SANITIZE_STRING);
$nameuser = filter_var(trim($_POST['namereg']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['passreg']), FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 1 || mb_strlen($login) > 90) {
    echo "Uncorrect login length";
    exit();
}
if(mb_strlen($nameuser) < 1 || mb_strlen($nameuser) > 40) {
    echo "Uncorrect name length";
    exit();
}
if(mb_strlen($pass) < 1 || mb_strlen($pass) > 40) {
    echo "Uncorrect password length";
    exit();
}



$mysqli = new mysqli($host, $user, $password, $name);


$mysqli->query("INSERT INTO `users` (`id`, `name`, `login`, `password`) VALUES (NULL, '$nameuser', '$login', '$pass');");
header('Location: /lv_13_08_project/');

$mysqli -> close();
?>