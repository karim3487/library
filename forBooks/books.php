<?php
require_once '../database/db.php';
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
        <th>Название</th>
        <th>Страниц</th>
        <th>Год</th>
        <th>Дата выдачи</th>
        <th>Дата получения</th>
        <th>Читатель</th>
    </tr>

    <?php
    $allBooks = new Library();
    $books = $allBooks->selectAll("books");
    foreach ($books as $book) {
        ?>
        <tr <!--style="color: #b40505 ; background: #b40505"-->>
            <td><?= $book['author'] ?></td>
            <td><?= $book['name'] ?></td>
            <td><?= $book['count_page'] ?></td>
            <td><?= $book['year'] ?></td>
            <td><?= $book['issue'] ?></td>
            <td><?= $book['refund'] ?></td>
            <td><?= $book['reader'] ?></td>
            <td><a href="updateBook.php?id=<?= $book['id'] ?>&issue=<?= $book['issue'] ?>&
            refund=<?= $book['refund'] ?>&reader=<?= $book['reader'] ?>">Изменить</a></td>
            <td><a href="giveOut.php?id=<?= $book['id'] ?>"">Выдать</a></td>
            <td><a href="../crud/forBooks/deleteBook.php?id=<?= $book['id'] ?>" style="color: #9c0101" ">Удалить</a></td>
        </tr>
        <?php
    }
    ?>
</table>

<form action="../crud/forBooks/addBook.php" method="post">
    <h3>Добавление книги</h3>
    <p>Автор:</p>
    <input type="text" name="author" placeholder="Введите имя автора">
    <p>Название книги:</p>
    <input type="text" name="name" placeholder="Введите название">
    <p>Количество страниц:</p>
    <input type="number" name="count_page" placeholder="Введите кол-во страниц">
    <p>Год издания:</p>
    <input type="number" name="year" placeholder="Введите год"> <br> <br>
    <button type="submit">Добавить</button>
</form>
<a href="../index.php"><strong>Вернуться на главную</strong></a>
