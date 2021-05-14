<?php


$host = 'localhost';
$user = 'root';
$password = 'root';
$name = 'testdb';




$mysqli = new mysqli($host, $user, $password, $name);
$mysqli->query("SET NAMES 'utf8'");
$authors = $mysqli->query("SELECT * FROM author");
$categories = $mysqli->query("SELECT * FROM category");
$res = $mysqli->query("SELECT * FROM users");
$addarr = array();
$delarr = array();

function del2($arr, $x) {
    array_push($arr, $x);
}


function addbookfunc($x) {
    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $name = 'testdb';

    $mysqli = new mysqli($host, $user, $password, $name);
    $mysqli->query("SET NAMES 'utf8'");
    $mysqli->query("UPDATE `book` SET `on_page` = '1' WHERE `book`.`name` = '$x';");



}

function deletebookfunc($x) {
    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $name = 'testdb';

    $mysqli = new mysqli($host, $user, $password, $name);
    $mysqli->query("SET NAMES 'utf8'");
    $mysqli->query("DELETE FROM book WHERE name = '$x';");



}

if($_COOKIE['user'] == 'lenashukova') :

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Love | Admin</title>


    <link rel="stylesheet" href="main2.css">
</head>
<body>
<?php include('dops/navbar.php') ?>

<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-offset-2">
                <h1>Admin page</h1>
                <h2>Добавление новых книг</h2>


            </div>
        </div>
    </div>
</div>



<br><hr><br><br>
<h5 class="sometxt ltxtt">Библиотека:</h5>


<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$name = 'testdb';


$mysqli = new mysqli($host, $user, $password, $name);
$mysqli->query("SET NAMES 'utf8'");
$books = $mysqli->query("SELECT * FROM book");




while (($row = $books -> fetch_assoc()) != false) :
$onpage = $row['on_page'];
if($onpage == '1') continue;
$name2 = $row['name'];
$id_auth = $row['id_author'];
$author = $mysqli->query("SELECT name FROM author WHERE id_author = '$id_auth'");
$author = $author -> fetch_assoc();
$author = $author['name'];


$id_cat = $row['id_category'];
$category = $mysqli->query("SELECT name FROM category WHERE id_categ = '$id_cat'");
$category = $category -> fetch_assoc();
$category = $category['name'];
$desc = $row['description'];




?>
<div class="row ltxt">
    <div class="col-lg-1"></div><div class="col-lg-1"><br><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689
                1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994
                1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0
                 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
        </svg></div><div class="col-lg-8">
        <div class="d-flex position-relative">
            <div class="card shadow-lg">
                <div class="card-header bg-dark whit">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 style="color: antiquewhite;"><?php echo $name2 ?> </h4>
                        </div>
                        <div class="col-lg-6 rtxt">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-heart" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                            </svg>
                            <?php echo "929"?>
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><mark><?php  echo $author ?></mark>


                            </li>
                            <li class="list-group-item"> <?php echo $category ?></li>
                            <li class="list-group-item">
                                <div class="container shadow" style="background-color: #f3ece4">
                                    <?php echo $desc ?>
                                </div>
                            </li>

                        </ul>
                    </blockquote>
                </div>

            </div></div>
        <form method="post">
            <?php

            $namebtnadd = "Добавить ";
            $namebtndel = "Удалить ";
            $all = $namebtnadd.$name2;
            echo '<input value="', $namebtnadd.$name2,'" name="btnadd" type="submit" class="btn btn-outline-success btn-lg">';
            echo '<input value="', $namebtndel.$name2,'" name="btndel" type="submit" class="btn btn-outline-danger btn-lg" >';



            ?>
        </form>


        <br><br>
    </div><div class="col-lg-2"></div>

    <?php

    if($_POST['btnadd'] == $namebtnadd.$name2) {
        addbookfunc($name2);
    }


    if($_POST['btndel'] == $namebtndel.$name2) {
        deletebookfunc($name2);
    }

    ?>
    <?php endwhile ?>


</div>













<?php
$mysqli -> close();
?>
<?php endif ?>




















<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
