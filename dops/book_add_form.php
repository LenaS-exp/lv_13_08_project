<?php
include("bd_connection.php");

$mysqli = new mysqli($host, $user, $password, $name);
$mysqli->query("SET NAMES 'utf8'");
$authors = $mysqli->query("SELECT * FROM author");
$categories = $mysqli->query("SELECT * FROM category");



?>

    <div class="col-lg-5 shadow p-3 mb-5 bg-white rounded">
        <br><br>
        <div class="container" style= "padding: 100px;">
            <h5 class="sometxt ltxt">Обновление библиотеки:</h5>
            <p>
            <ul class="list-unstyled ltxt">
                <li>Вы можете оставить заявку на добавление произведения в библиотеку:</li>
                <ul>

                    <li>Укажите название произведения</li>
                    <li>Автора</li>
                    <li>Категорию</li>
                    <li>Небольшое описание</li>
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

        <h5 class="sometxt">Заявление:</h5>
        <form method="post" action="checks/check_rev.php">

            <div class="mb-3">
                <h5>Название</h5>
                <input type="text" class="form-control" name="bookname" id="bookname" placeholder="Война и мир">
                <input type="text" class="form-control" name="oleg" id="oleg" placeholder="oleg">
            </div>
            <div class="mb-3">
                <h5>Автор</h5>

                <input list="author" name="author">

                <datalist name="author" id="author" aria-label="Автор">
                    <?php
                    while (($roww = $authors -> fetch_assoc()) != false) :
                        $nameauth = $roww['name'];
                        $idshnik = $roww['id_author'];

                        ?>

                        <option value="<?php echo $nameauth ?>"></option>
                    <?php endwhile?>
                </datalist>

            </div>

            <div class="mb-3">
                <h5>Категория</h5>

                <select name="categ" id="categ" class="form-select" aria-label="Книга">
                    <?php
                    while (($roww = $categories -> fetch_assoc()) != false) :
                        $categ = $roww['name'];
                        $id = $roww['id_categ'];

                        ?>

                        <option value="<?php echo $id ?>"><?php echo $categ?></option>
                    <?php endwhile?>
                </select>

            </div>


            <div class="mb-3">
                <h5>Описание</h5>
                <textarea class="form-control" id="descriptionbook" name="descriptionbook" rows="3"></textarea>
            </div>

            <?php
            if($_COOKIE['user'] != ''):?>
                <button type="submit" class="btn btn-outline-info btn-lg">Отправить</button>
            <?php endif; ?>


            <?php
            if($_COOKIE['user'] == ''):?>
                <p class="text-danger">Для отправки необходимо Авторизироваться!</p>
                <button type="submit" class="btn btn-outline-info btn-lg disabled" >Отправить</button>
            <?php endif; ?>
        </form>
    </div>

<?php $mysqli -> close();?>