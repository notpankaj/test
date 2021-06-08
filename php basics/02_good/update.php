<?php

//db connection
/**@var $pdo \PDO*/
$pdo = require_once './database.php';


//checking id
$id = $_GET['id'] ?? null;
if(!$id){
    header("Location: index.php");
    exit;
};

//gettting// fetching single product
$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id'); //prepareing statement
$statement->bindValue(':id',$id); //providing id
$statement->execute();  //completing req
$product = $statement->fetch(PDO::FETCH_ASSOC); //fetching in AA format 
echo "<pre>".var_dump($product)."</pre>";


/*=================
3. saving data to db
===================*/
//only when mehod was Post
$error = []; //eror storage
$title = $product["title"];  //to prevent first loading error
$description = $product["description"];
$price = $product["price"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $image = $_FILES['image'] ?? null;
    $imagePath = '';

    if (!is_dir('images')) {
        mkdir('images');
    }

    if ($image) {
        if ($product['image']) {
            unlink($product['image']);
        }
        $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    }

    if (!$title) {
        $errors[] = 'Product title is required';
    }

    if (!$price) {
        $errors[] = 'Product price is required';
    }

    if (empty($errors)) {
        $statement = $pdo->prepare("UPDATE products SET title = :title, 
                                        image = :image, 
                                        description = :description, 
                                        price = :price WHERE id = :id");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);

        $statement->execute();
        header('Location: index.php');
    }

}

//random string generator
function randomString($n)
{
  $letters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str = '';

  for ($i = 0; $i < $n; $i++) {
    $index = rand(0, strlen($letters) - 1);
    $str .= $letters[$index];
  }
  return $str;
};

?>





<?php include_once './views/partials/header.php' ?>

  
    <a href="index.php" class="btn btn-secondary"> go back to products </a>
  <h1>Edit Product</h1>



<?php include_once './views/partials/products/form.php' ?>


