<?php


$host = 'localhost';
$user = 'root';
$password = 'root';

$name = 'testdb';
$mysqli = new mysqli($host, $user, $password, $name);


$text = filter_var(trim($_POST['revtext']), FILTER_SANITIZE_STRING);
$bookname = filter_var(trim($_POST['booksel']), FILTER_SANITIZE_STRING);
$bookauhtor = $_POST['authorsel'];
$login = $_COOKIE['user'];

$id_user = $mysqli->query("SELECT * FROM users WHERE login = '$login'");
$id_user = $id_user->fetch_assoc();
$id_user = $id_user['id'];


$id_bk = $mysqli->query("SELECT * FROM book WHERE name = '$bookname'");
$id_bk = $id_bk->fetch_assoc();
$id_bk = $id_bk['id_book'];


$mysqli->query("INSERT INTO `review` (`id_review`, `id_user`, `id_book`, `text`) VALUES (NULL, '$id_user' , '$id_bk', '$text');");

header('Location: /lv_13_08_project/users_reviews.php');



$mysqli -> close();

?>
