<?php
require_once '../../database/db.php';

$author = $_POST['author'];

$post = [
    'author' => $author,
];


$newAuthor = new Library();
$newAuthor->insert("authors", $post);
header('Location: ../../forBooks/books.php');
