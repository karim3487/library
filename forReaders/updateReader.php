<?php
require_once '../database/db.php';
$reader_id = $_GET['id'];

$upReader = new Library();
$reader = $upReader->selectOne("readers", $reader_id);
?>
<form action="../crud/forReaders/upReader.php" method="post">
    <h3>Изменение книги</h3>
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <p>Фамилия И. О.:</p>
    <input type="text" name="name" value="<?= $reader['name'] ?>">
    <button type="submit">Изменить</button>

</form>