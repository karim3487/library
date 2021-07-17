<?php
require_once '../database/db.php';
$book_id = $_GET['id'];

$book = new Library();
$nameBook = $book->selectOne("books", $book_id);
$readers = new Library();
$humans = $readers->selectAll("readers");

$today = date("Y-m-d");

$finishDate = date("Y-m-d", strtotime($today. '+ 30 day'));


echo "Книга: " . $nameBook['name'];
?>
<form action="../crud/forBooks/gOut.php" method="post">
    <input type="hidden" name="id_book" value="<?= $book_id?>">
    <p>Читатель:</p>
    <select name="id_reader">
        <?php
        foreach ($humans as $human) {
            ?>
            <option value="<?= $human['id'] ?>"><?= $human['name'] ?></option>

            <?php
        }
        ?>
    </select>
    <p>Дата выдачи:</p>
    <input type="date" name="start" value="<?= $today?>">
    <p>Дата сдачи:</p>
    <input type="date" name="finish" value="<?= $finishDate?>">
    <br><br>
    <button type="submit">Выдать</button>
</form>