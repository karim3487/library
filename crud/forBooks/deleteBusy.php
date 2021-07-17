<?php
require_once '../../database/db.php';

$id_book = $_GET['id'];
$id_reader = $_GET['id_reader'];
$del = new Library();
echo '<pre>';
print_r($_GET);
echo '</pre>';

$del->delete("busybooks", $id_book);

$count_books = [
    'count_books' => -1
];
$count = $del->selectOne("readers", $id_reader);
$current_count = $count['count_books'] - 1;
$count_books = [
    'count_books' => $current_count
];
$del->update("readers", $id_reader, $count_books);

header('Location: ../../forBooks/books.php');
