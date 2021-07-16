<?php
require_once '../../database/db.php';

$reader_id = $_POST['id'];
$name = $_POST['name'];

$post = [
    'id' => $reader_id,
    'name'=> $name
];

$newReader = new Library();
$newReader->update("readers", $reader_id, $post);


header('Location: ../../forReaders/readers.php');
