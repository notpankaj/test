<?php
/*=================
1.  connection string
===================*/
$dsn = 'mysql:dbname=product_crud;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);   //  to establish connection with database
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
