<?php
require_once '../database/db.php';
$book_id = $_GET['id'];

$book = new Library();
$nameBook = $book->selectOne("books", $book_id);
$readers = new Library();
$humans = $readers->selectAll("readers");


echo "Книга: " . $nameBook['name'];
/*echo "Выберите читателя: " . $human['name'];
echo '<pre>';
print_r($human);
echo '</pre>';*/

?>
<form action="../crud/forBooks/gOut.php">
<select name="name">
    <?php
    foreach ($humans as $human){
    ?>
        <option value="<?= $human['name'] ?>"><?= $human['name'] ?></option>

    <?php
    }
    ?>
</select>
<button type="submit">Выдать</button>
</form>