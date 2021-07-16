<?php
require_once '../../database/db.php';

$book_id = $_GET['id'];
$del = new Library();

$del->delete("books", $book_id);

header('Location: ../../forBooks/books.php');
