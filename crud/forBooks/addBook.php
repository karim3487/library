<?php
require_once '../../database/db.php';

    $author = $_POST['author'];
    $name = $_POST['name'];
    $count_page = $_POST['count_page'];
    $year = $_POST['year'];


    $post = [
      'author' => $author,
      'name' => $name,
      'count_page' => $count_page,
      'year' => $year
    ];

    $newBook = new Library();
    $newBook->insert("books", $post);


header('Location: ../../forBooks/books.php');
