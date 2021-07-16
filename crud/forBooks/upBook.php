<?php

require_once '../../database/db.php';

$book_id = $_POST['id'];
$author = $_POST['author'];
$name = $_POST['name'];
$count_page = $_POST['count_page'];
$year = $_POST['year'];
$issue = $_POST['issue'];
$refund = $_POST['refund'];
$reader = $_POST['reader'];

$post = [
        'id' => $book_id,
        'author' => $author,
        'name' => $name,
        'count_page' => $count_page,
        'year' => $year,
        'issue' => $issue,
        'refund' => $refund,
        'reader' => $reader,
    ];

$newBook = new Library();
$newBook->update("books", $book_id, $post);

header('Location: ../../forBooks/books.php');
