<?php
require_once '../database/db.php';
$book_id = $_GET['id'];

$upBook = new Library();
$sql = "SELECT b. * , b.name AS book_name , b.id AS book_id, bb. * ,
       r.name AS reader_name, a.author FROM books b 
    LEFT JOIN authors a ON b.id_author = a.id
    LEFT JOIN busybooks bb ON b.id = bb.id_book 
    LEFT JOIN readers r ON bb.id_reader = r.id";
$book = $upBook->selectOne("books", $book_id);

//echo '<pre>';
//print_r();
//echo '</pre>';

?>


    <form action="../crud/forBooks/upBook.php" method="post">
        <h3>Изменение книги</h3>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="hidden" name="id_author" value="<?= $_GET['id_author'] ?>">
        <p>Автор</p>
        <input type="text" name="author" value="<?= $_GET['author'] ?>">
        <p>Книга</p>
        <input type="text" name="name" value="<?= $book['name'] ?>">
        <p>страниц</p>
        <input type="number" name="count_page" value="<?= $book['count_page'] ?>">
        <p>Год</p>
        <input type="number" name="year" value="<?= $book['year'] ?>">
        <br> <br>
        <button type="submit">Изменить</button>
    </form>
<?php
