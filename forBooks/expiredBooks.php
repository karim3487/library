<?php
require_once '../database/db.php';
$books = new Library();
$sql = "SELECT b. * , b.name AS book_name , b.id AS book_id, bb. * ,
       r.name AS reader_name FROM books b 
    JOIN busybooks bb ON b.id = bb.id_book 
    JOIN readers r ON bb.id_reader = r.id";
$table = $books->query($sql);
?>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: white;
    }

    td {
        background: #9e9e9e;
    }

</style>
<table>
    <tr>
        <th>Автор</th>
        <th>Дата выдачи</th>
        <th>Дата сдачи</th>
        <th>Должник</th>
    </tr>

    <?php
    foreach ($table as $book) {
        if ($book['finish'] < date("Y-m-d")) {
            ?>
            <tr>
                <td><?= $book['book_name'] ?></td>
                <td><?= $book['start'] ?></td>
                <td><?= $book['finish'] ?></td>
                <td><?= $book['reader_name'] ?></td>
                <td><a href="../crud/forBooks/deleteBusy.php?id=<?= $book['id'] ?>&id_reader=<?= $book['id_reader'] ?>" style="color: #9c0101" ">Сдать
                    книгу</a></td>
            </tr>
            <?php
        }
    }
    ?>
</table>
