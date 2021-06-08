<!-- PHP CODE -->
<?php
/*=================
0.1. set-up database connection
===================*/
$dsn = 'mysql:dbname=product_crud;host=localhost';
$user = 'root';
$password = '';

//pdo: takes -> dsn-string,user,password 
$pdo = new PDO($dsn, $user, $password);   //  to establish connection with database

//ERROR HANDLING
//setAttribute method: -> first check for the error ,if there is an error throw exexption
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/*=================
2. getting form data
===================*/

//url when submit i get
//  image= &title=Goosebumps &description=some+sacrry+stuff..&price=1000 
//seperated by & 

//submited data stored in $_GET,$_POST super variables
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';


/*=================
3. bug fix
===================*/
//when this page runs it looks for $_GET that was empty at the page loading (NOT calling submit event);

//to check the what is the current mehod Post or get
// var_dump($_SERVER); //looking for ["REQUEST_METHOD"]

/*=================
3. saving data to db
===================*/
//only when mehod was Post

$error = []; //eror storage
$title = '';  //to prevent first loading error
$description = '';
$price = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $title = $_POST["title"];
  $description = $_POST["description"];
  $price = $_POST["price"];
  $date = date('Y-m-d H:i:s');


  /*=================
x. image upload
===================*/
  // echo '<pre>';
  // var_dump($_FILES);
  // echo '</pre>';
  // exit;

  /*=================
x. Form Handling
===================*/

  //if value are empty then push into $error
  if (!$title) {
    array_push($error, 'Product title is rquired');
  }
  if (!$price) {
    array_push($error, 'please enter price');
  }


  //if there are no error then only save to db
  if (empty($error)) {
    //if image is present set its value else set null
    $image = $_FILES['image'] ?? null;

    $ImgPath = '';
    //uploading img to random folder
    if ($image && $image['tmp_name']) {

      //making image dir if not present
      if(!is_dir('images')) mkdir('images');
    

      //moving file to random dir inside images folder
      $ImgPath = "./images/".randomString(8)."/".$image['name'];

      //creating only dir of that randompath
      mkdir(dirname($ImgPath));


      move_uploaded_file($image["tmp_name"],$ImgPath); //imagedata,path

    };

    $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                                VALUES (:title, :image, :description,:price,:date)");
    //making statement to bind data for update db
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':image', $ImgPath);
    $statement->bindValue(':date', $date);

    //completing update req;
    $statement->execute();

    //re- direct to the index php
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
}
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
  <h1>Create New Product</h1>
  <!-- Create Products -->

  <?php if (!empty($error)) { ?>
    <div class="alert alert-danger">
      <?php foreach ($error as $err) : ?>
        <div><?php echo $err ?></div>
      <?php endforeach; ?>
    </div>
  <?php } ?>

  <!-- FORM -->
  <form action="create.php" method="post" enctype="multipart/form-data">
    <!-- enctype for uploading files -->
    <div class="mb-3">
      <label class="form-label">Product Image</label>
      <br>
      <input type="file" name="image">
    </div>
    <div class="mb-3">
      <label class="form-label">Product Title</label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-3">
      <labelclass="form-label">Description</labelclass=>
        <textarea class="form-control" name="description" value="<?php echo $description ?>"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Product Price</label>
      <input type="number" step="0.1" class="form-control" name="price" value="<?php echo $price ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <!-- FORM END -->
</body>

</html>