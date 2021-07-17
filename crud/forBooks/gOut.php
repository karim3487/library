<?php
require_once '../../database/db.php';


$id_book = $_POST['id_book'];
$start = $_POST['start'];
$finish = $_POST['finish'];
$id_reader = $_POST['id_reader'];

$post = [
    'id_book' => $id_book,
    'start' => $start,
    'finish' => $finish,
    'id_reader' => $id_reader
];
$newBook = new Library();
$newBook->insert("busybooks", $post);

$count_books = [
    'count_books' => +1
];
$count = $newBook->selectOne("readers", $id_reader);
$current_count = $count['count_books'] + 1;
$count_books = [
    'count_books' => $current_count
];
$newBook->update("readers", $id_reader, $count_books);
header('Location: ../../forBooks/books.php');
