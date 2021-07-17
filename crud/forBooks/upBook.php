<?php

require_once '../../database/db.php';
$author_id = $_POST['id_author'];
$book_id = $_POST['id'];
$author = $_POST['author'];
$name = $_POST['name'];
$count_page = $_POST['count_page'];
$year = $_POST['year'];
echo '<pre>';
print_r($_POST);
echo '</pre>';

$post = [
        'id' => $book_id,
        'name' => $name,
        'count_page' => $count_page,
        'year' => $year
    ];
$changeAuthor = [
    'author' => $author,
];

$newBook = new Library();
$newBook->update("books", $book_id, $post);
$newBook->update("authors", $author_id, $changeAuthor);

header('Location: ../../forBooks/books.php');
