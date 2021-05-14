<?php


$host = 'localhost';
$user = 'root';
$password = 'root';

$name = 'testdb';
$mysqli = new mysqli($host, $user, $password, $name);
$quot = filter_var(trim($_POST['quot']), FILTER_SANITIZE_STRING);
$au = filter_var(trim($_POST['authorq']), FILTER_SANITIZE_STRING);

$res = $mysqli->query("INSERT INTO `quote` (`id`, `qtext`, `author`) VALUES (NULL, '$quot', '$au') ");

header('Location: /lv_13_08_project/quotes.php');
$mysqli -> close();
?>
