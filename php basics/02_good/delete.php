<?php

/*=================
connection to db string
===================*/
$pdo = require_once './database.php';




/*=================
getting id
===================*/
//super global -> url
$id = $_GET['id'] ?? null; //if id exist take that else set it null
echo $id;

if(!$id){
    header('Location: index.php');
    exit;
};

/*=================
delete form db
===================*/
$statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
$statement->bindValue(':id',$id);
$statement->execute();
header('Location: index.php');
