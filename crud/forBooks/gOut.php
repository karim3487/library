<?php
require_once '../../database/db.php';
$tt = new Library();
$sql = "SELECT b. * , br. * , r.* FROM books b
LEFT JOIN  book_reader br ON b.id = br.book_id
LEFT JOIN reader r ON br.reader_id = r.id";
$tt->query($sql);
