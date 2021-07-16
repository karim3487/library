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
        <th>Фамилия И. О.</th>
        <th>Невозвращенных книг</th>
    </tr>

    <?php
    $allReaders = new Library();
    $readers = $allReaders->selectAll("readers");
    foreach ($readers as $reader) {
        ?>
        <tr>
            <td><?= $reader['name'] ?></td>
            <td><?= $reader['count_books'] ?></td>
            <td><a href="updateReader.php?id=<?= $reader['id'] ?>">Изменить</a></td>
            <td><a href="../crud/forReaders/deleteReader.php?id=<?= $reader['id'] ?>" style="color: #9c0101" ">Удалить</a></td>
        </tr>
        <?php
    }
    ?>
</table>

<form action="../crud/forReaders/addReader.php" method="post">
    <h3>Добавление читателя</h3>
    <p>Фамилия И. О.:</p>
    <input type="text" name="name" placeholder="Фамилия И. О.">
    <br><br><button type="submit">Добавить</button>

</form>
<a href="../index.php"><strong>Вернуться на главную</strong></a>
