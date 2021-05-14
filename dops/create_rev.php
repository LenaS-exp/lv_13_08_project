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
    if($onpage == '0') continue;
    $name = $row['name'];
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


        <div class="col-lg-1"></div><?php include("book_icon.php") ?>
        <div class="col-lg-8">


            <div class="d-flex position-relative">


                <div class="card shadow-lg">


                    <div class="card-header bg-dark whit">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 style="color: antiquewhite;"><?php echo $name ?> </h4>
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


                </div>


            </div><br><br>


        </div>
        <div class="col-lg-3"></div>
    </div>
<?php endwhile ?>
<?php $mysqli -> close()?>


