<?php
require_once '../../database/db.php';

$reader_id = $_GET['id'];
$del = new Library();

$del->delete("readers", $reader_id);

header('Location: ../../forReaders/readers.php');