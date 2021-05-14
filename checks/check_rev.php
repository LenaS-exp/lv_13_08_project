<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$name = 'testdb';

echo "1";

$mysqli = new mysqli($host, $user, $password, $name);
$text = filter_var(trim($_POST['descriptionbook']), FILTER_SANITIZE_STRING);
$bookname = filter_var(trim($_POST['bookname']), FILTER_SANITIZE_STRING);
$bookauhtor = $_POST['author'];
$cat = $_POST['category'];

echo "2";

$id_bk = $mysqli->query("SELECT * FROM author WHERE name = '$bookauthor'");
$id_bk = $id_bk->fetch_assoc();
$id_bk = $id_bk['id_author'];


if(isset($_POST['oleg'])) echo "DADADA";



$login = $_COOKIE['user'];



if($login == 'lenashukova') {

    $mysqli->query("INSERT INTO `book` (`id_book`, `name`, `id_author`,
                    `id_category`, `description`, `count_r`, `on_page`) 
                    VALUES (NULL, '$bookname', '$id_bk', '$cat', '$text', NULL, '1');");


}
else {
    $mysqli->query("INSERT INTO `book` (`id_book`, `name`,
                    `id_author`, `id_category`, `description`, `count_r`, `on_page`) 
                    VALUES (NULL, '$bookname', '$id_bk', '$cat', '$text', NULL, '0');");

}


header('Location: /lv_13_08_project/users_reviews.php');

echo $bookname, " ", $id_bk, "  ", $cat, "  ", $text;
$mysqli -> close();
?>
