<?php
include("bd_connection.php");
$mysqli = new mysqli($host, $user, $password, $name);
$mysqli->query("SET NAMES 'utf8'");
$authors = $mysqli->query("SELECT * FROM author");



?>





<div class="col-lg-5 shadow p-3 mb-5 bg-white rounded">
    <br><br>
    <div class="container" style= "padding: 100px;">
        <h5 class="sometxt ltxt">Оставить отзыв:</h5>
        <p>
        <ul class="list-unstyled ltxt">
            <li>Напишите отзыв:</li>
            <ul>
                <li>Выберите автора</li>
                <li>Выберите произведение</li>
                <li>Опишите свое впечатление</li>
                <li></li>
                <li></li>
                <li><mark>Нельзя отправить два отзыва на одну и ту же книгу!</mark></li>

            </ul>
        </ul>

        </p>
    </div>

    <div class="col-lg-1"></div>
</div>



<br><br><br><br>
<div class="col-lg-1"></div>
<div class="col-lg-5">
    <br><br>

    <h5 class="sometxt">Отзыв:</h5>
    <form method="post" action="checks/check_review.php">
        <div class="mb-3">
            <h5>Автор</h5>

            <input list="authorsel" name="authorsel">

            <datalist name="authorsel" id="authorsel" aria-label="Автор">


                <?php
                while (($roww = $authors -> fetch_assoc()) != false) :
                    $nameauth = $roww['name'];
                    $idshnik = $roww['id_author'];

                    ?>

                    <option value="<?php echo $nameauth ?>"></option>
                <?php endwhile;
                ?>




            </datalist>


        </div>

        <div class="mb-3">
            <h5>Произведение</h5>

            <input list="booksel" name="booksel">

            <datalist name="booksel" id="booksel" aria-label="Произведение">
                <?php

                $book= $mysqli->query("SELECT * FROM book");


                while (($roww = $book -> fetch_assoc()) != false) :
                    $bk = $roww['name'];
                    $idbk = $roww['id_book'];

                    ?>

                    <option value="<?php echo $bk ?>"></option>
                <?php endwhile?>
            </datalist>

        </div>


        <div class="mb-3">
            <h5>Текст отзыва</h5>
            <textarea class="form-control" rows="3" name="revtext" id="revtext"></textarea>
        </div>



        <?php
        if($_COOKIE['user'] != ''):?>
            <button type="submit" class="btn btn-outline-dark btn-lg">Отправить</button>
        <?php endif; ?>
        <?php
        if($_COOKIE['user'] == ''):?>
            <p class="text-danger">Для отправки необходимо Авторизироваться!</p>
            <button type="submit" class="btn btn-outline-dark btn-lg disabled" >Отправить</button>
        <?php endif; ?>
    </form>




</div>





<?php $mysqli->close()?>
