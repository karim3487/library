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

    * {
        margin: 0;
        padding: 0;
    }

    p {
        padding: 10px;
    }

    #left {
        position: absolute;
        left: 20px;
        width: 33%;
    }

    #right {
        position: absolute;
        right: 0px;
        width: 33%;
    }

    #center {
        position: absolute;
        right: 33%;
        width: 33%;
    }

</style>
<div>
    <table>
        <tr>
            <th>Автор</th>
            <th>Название</th>
            <th>Страниц</th>
            <th>Год</th>
            <th>Дата выдачи</th>
            <th>Дата сдачи</th>
            <th>Читатель</th>
        </tr>

        <?php
        $books = new Library();
        $sql = "SELECT b. * , b.name AS book_name , b.id AS book_id, bb. * ,
       r.name AS reader_name, a.author FROM books b 
    LEFT JOIN authors a ON b.id_author = a.id
    LEFT JOIN busybooks bb ON b.id = bb.id_book 
    LEFT JOIN readers r ON bb.id_reader = r.id";
        $table = $books->query($sql);
        foreach ($table as $book) {
            ?>
            <tr>
                <td><?= $book['author'] ?></td>
                <td><?= $book['name'] ?></td>
                <td><?= $book['count_page'] ?></td>
                <td><?= $book['year'] ?></td>
                <td><?= $book['start'] ?></td>
                <td><?= $book['finish'] ?></td>
                <td><?= $book['reader_name'] ?></td>
                <td>
                    <a href="updateBook.php?id=<?= $book['book_id'] ?>&author=<?= $book['author'] ?>&id_author=<?= $book['id_author'] ?>">Изменить</a>
                </td>
                <?php
                if ($book['reader_name'] == '') {
                    ?>
                    <td><a href="giveOut.php?id=<?= $book['book_id'] ?>"">Выдать</a></td>
                    <td><a href="../crud/forBooks/deleteBook.php?id=<?= $book['book_id'] ?>" style="color: #9c0101"
                        ">Удалить</a>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>
                        <a href="../crud/forBooks/deleteBusy.php?id=<?= $book['id'] ?>&id_reader=<?= $book['id_reader'] ?>"
                           style="color: green" ">Сдать
                        книгу</a></td>
                    <?php

                }
                ?>

            </tr>
            <?php
        }
        ?>
    </table>
</div>
<div id="left">
    <a href="expiredBooks.php">Посмотреть просроченные книги</a>
    <form action="../crud/forBooks/addBook.php" method="post">
        <h3>Добавление книги</h3>
        <p>Автор:</p>
        <select name="author">
            <?php
            $authors = new Library();
            $listAuthors = $authors->selectAll("authors");
            foreach ($listAuthors as $author) {
                ?>
                <option value="<?= $author['id'] ?>"><?= $author['author'] ?></option>

                <?php
            }
            ?>
        </select>
        <p>Название книги:</p>
        <input type="text" name="name" placeholder="Введите название">
        <p>Количество страниц:</p>
        <input type="number" name="count_page" placeholder="Введите кол-во страниц">
        <p>Год издания:</p>
        <input type="number" name="year" placeholder="Введите год"> <br> <br>
        <button type="submit">Добавить</button>
    </form>
    <a href="../index.php"><strong>Вернуться на главную</strong></a>
</div>
<div id="center">
    <br>
    <h3>Добавить автора</h3>
    <form action="../crud/forAuthors/addAuthor.php" method="post">
        <p>Имя:</p>
        <input type="text" name="author" placeholder="Введите имя автора">
        <br><br>
        <button type="submit">Добавить</button>
    </form>
    <br><br>
    <h3>Удалить автора</h3>
    <br>
    <form action="../crud/forAuthors/delAuthor.php" method="post">
        <select name="id">
            <?php
            foreach ($listAuthors as $author) {
                ?>
                <option value="<?= $author['id'] ?>"><?= $author['author'] ?></option>
                <?php
            }
            ?>
        </select>
        <br><br>
        <button type="submit">Удалить</button>
    </form>
</div>
<div id="right">
    <form action="viewAuthor.php" method="post">
        <br>
        <h3>Просмотр книг по автору</h3>
        <p>Автор:</p>
        <select name="id_author">
            <?php
            foreach ($listAuthors as $author) {
                ?>
                <option value="<?= $author['id'] ?>"><?= $author['author'] ?></option>
                <?php
            }
            ?>
        </select>
        <br><br>
        <button type="submit">Посмотреть</button>
    </form>
</div>
