<!-- PHP CODE -->
<?php

/*=================
connection to db string
===================*/
$pdo = require_once './database.php';



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



<?php include_once './views/partials/header.php' ?>

  <h1>Create New Product</h1>
  <!-- Create Products -->
  <?php include_once './views/partials/products/form.php' ?>
  <!-- FORM END -->
</body>

</html>