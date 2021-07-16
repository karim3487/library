<?php
require_once '../../database/db.php';

$name = $_POST['name'];

$post = [
  'name' => $name
];

$newReader = new Library();
$newReader->insert("readers", $post);
header('Location: ../../forReaders/readers.php');
