<?php
require_once '../../database/db.php';

$author_id = $_POST['id'];
$del = new Library();

$del->delete("authors", $author_id);

header('Location: ../../forBooks/books.php');