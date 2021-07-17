<?php

require_once '../../database/db.php';
$author_id = $_POST['id_author'];
$book_id = $_POST['id'];
$author = $_POST['author'];
$name = $_POST['name'];
$count_page = $_POST['count_page'];
$year = $_POST['year'];

$post = [
        'id' => $book_id,
        'name' => $name,
        'count_page' => $count_page,
        'year' => $year
    ];

$newBook = new Library();
$newBook->update("books", $book_id, $post);

header('Location: ../../forBooks/books.php');
