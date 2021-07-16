<?php
require_once '../../database/db.php';
$tt = new Library();
$sql = "SELECT 
       b.name AS book_name , br. * , r.* FROM books b
LEFT JOIN  books_readers br ON b.id = br.id_book
LEFT JOIN readers r ON br.id_reader = r.id";
$table = $tt->query($sql);
echo '<pre>';
print_r($table);
echo '</pre>';
