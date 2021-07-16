<?php
require_once '../database/db.php';
$book_id = $_GET['id'];

$upBook = new Library();
$book = $upBook->selectOne("books", $book_id);
?>


    <form action="../crud/forBooks/upBook.php" method="post">
        <h3>Изменение книги</h3>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <p>Автор</p>
        <input type="text" name="author" value="<?= $book['author'] ?>">
        <p>Книга</p>
        <input type="text" name="name" value="<?= $book['name'] ?>">
        <p>страниц</p>
        <input type="number" name="count_page" value="<?= $book['count_page'] ?>">
        <p>Год</p>
        <input type="number" name="year" value="<?= $book['year'] ?>">
        <?php
        if ($book['reader'] != null) {
            ?>
            <p>Дата выдачи</p>
            <input type="date" name="issue" value="<?= $_GET['issue'] ?>">
            <p>Дата сдачи</p>
            <input type="date" name="refund" value="<?= $_GET['refund'] ?>">
            <p>Читатель</p>
            <input type="text" name="reader" value="<?= $_GET['reader'] ?>">
            <?php
        } else {
            ?>
            <input type="hidden" name="issue" value="<?= $_GET['issue'] ?>">
            <input type="hidden" name="refund" value="<?= $_GET['refund'] ?>">
            <input type="hidden" name="reader" value="<?= $_GET['reader'] ?>">
            <?php
        }

        ?>
        <br> <br>
        <button type="submit">Изменить</button>
    </form>
<?php
