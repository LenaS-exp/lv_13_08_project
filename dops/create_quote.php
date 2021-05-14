<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$name = 'testdb';

$mysqli = new mysqli($host, $user, $password, $name);
$mysqli->query("SET NAMES 'utf8'");
$quo = $mysqli->query("SELECT * FROM quote");
$mysqli -> close();
while (($row = $quo -> fetch_assoc()) != false) :
    $txt = $row['text'];
    $au = $row['author'];

    ?>

    <div class="shadow tilttt bg-light rounded">
        <figure>
            <blockquote class="blockquote">
                <div class="centered fs-1">. . .</div><br>
                <p> <?php echo $txt?></p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <?php echo $au?>
            </figcaption>
        </figure>
    </div>

<?php endwhile ?>
