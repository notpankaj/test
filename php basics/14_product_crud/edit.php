<?php
/*=================
1.  connection string
===================*/
$dsn = 'mysql:dbname=product_crud;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);   //  to establish connection with database
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


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





<!-- HTML -->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="app.css">
  <title>Product CRUD</title>
</head>

<body>
    <a href="index.php" class="btn btn-secondary"> go back to products </a>
  <h1>Edit Product</h1>
  <!-- Create Products -->

  <?php if (!empty($error)) { ?>
    <div class="alert alert-danger">
      <?php foreach ($error as $err) : ?>
        <div><?php echo $err ?></div>
      <?php endforeach; ?>
    </div>
  <?php } ?>

<!-- FORM -->
<form  method="post" enctype="multipart/form-data">
  <!-- enctype for uploading files -->

<?php if($product['image']): ?>
    <img src="<?php echo $product['image'] ?>" style="width:50px;height:50px;">
<?php endif ?>
<hr>
  <div class="mb-3">
    <label class="" >Product Image</label>
    <br>
    <input type="file" name="image">
  </div>
  <div class="mb-3">
    <label class="form-label">Product Title</label>
    <input type="text" value="<?php echo $product['title']  ?>" class="form-control" name="title">
  </div>
  <div class="mb-3">
    <labelclass="form-label">Description</labelclass=>
      <textarea class="form-control" name="description" value="<?php echo $product['description'] ?>"></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Product Price</label>
    <input type="number" step="0.1" class="form-control" name="price" value="<?php echo $product['price'] ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- FORM END -->


