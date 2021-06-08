<?php

/*=================
1.  connection db string
===================*/
$dsn = 'mysql:dbname=product_crud;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);   //  to establish connection with database
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;