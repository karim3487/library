<?php
require_once '../database/db.php';

$id = $_POST['id_author'];

$viewAuthor = new Library();

$sql = "SELECT * FROM `books` WHERE id_author = $id";

$books = $viewAuthor->query($sql);

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
</style>
<table>
    <tr>
        <th>Книга (-и)</th>
    </tr>
    <?php
    foreach ($books

    as $book) {
    ?>
    <td><?= $book['name'] ?></td>
    <tr>
        <?php
        }
        ?>
</table>
