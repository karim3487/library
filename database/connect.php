<?php

$driver = 'mysql';
$host = 'localhost';
$dbname = 'library';
$dbuser = 'root';
$dbpass = '';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try {
    $pdo = new PDO("$driver:host=$host;dbname=$dbname;charset=$charset", $dbuser, $dbpass, $options);
} catch (PDOException $e) {
    die("Ошибка подключения к БД");
}