<?php

define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'localhost');
define('DB_NAME', 'people');
define('DB_USER', 'root');
define('DB_PASS', 'root');

try {
    $connect = DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_NAME;
    $query = new PDO($connect, DB_USER, DB_PASS);
} catch (PDOException $PDOException) {
    die('Error: ' . $PDOException->getMessage());
}