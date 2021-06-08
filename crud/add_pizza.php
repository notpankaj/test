<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<?php

$title = $items = $email = '';
/* ==========
    showing validation
   ===========*/
$error = array(
   'email' => '',
   'title' => '',
   'items' => '',
);
echo '<pre>';


/* ==========
    form submit handling
   ===========*/
// $_SERVER('METHOD) == 'POST //better than isset
if (isset($_POST["submit"]) == "submit") {

   var_dump($_POST);




   /* ==========
    email validation
   ===========*/
   if (empty($_POST["email"])) {
      $error['email'] = "please enter Email";
   } else {
      $email = $_POST["email"];
      // built-in email filter
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         // if the email is invaild  add in $error
         $error['email'] = "enter vaild email address";
      }
   };
   echo "<br>";

   /* ==========
    title validation
   ===========*/
   if (empty($_POST["title"])) {
      $error['title'] = "please enter title";
   } else {
      $title = $_POST["title"];
      // using REGX - from start to end only accept lower/Uppercase letter and space
      if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
         $error['title'] = "title must be letter's and space's only";
      }
   };
   echo "<br>";


   /* ==========
    items validation
   ===========*/
   if (empty($_POST["items"])) {
      $error['items'] = "please enter a hobby";
   } else {
      $items = htmlspecialchars($_POST["items"]);
      // using REGX - look for comma seperated list
      if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $items)) {
         $error['items'] = "items must be a comma seperated list";
      }
   };
   echo "<br>";

   var_dump($error);

   //loops thru off $error items 
   //if there no false items it becomes false (means all true) 
   //if there are false items it become true  (means there are false value)
   if (array_filter($error)) {
      echo "Errors in FORM ";
   } else {
      echo "FORM is okay";



      /*==============
      insert data in db
      ================*/
      //conncting to db
      $conn = mysqli_connect("localhost", "dog", '54321', "ninja");
      if (!$conn) echo " conncection error" . mysqli_connect_error() .  "";

      /*==============
      sql injection prevention
      ================*/
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $name = mysqli_real_escape_string($conn, $_POST['title']);
      $items = mysqli_real_escape_string($conn, $_POST['items']);

      //createing query
      $data = "INSERT INTO pizza(title,email,items) VALUES('$title','$email','$items')";

      //saving to db
      if (mysqli_query($conn, $data)) {
         echo "<h1>DATA ADDED Succsess.</h1>";
         header("Location: index.php");
      } else {
         echo "<h1>DATA NOT ADDED.</h1>";
      }

      // header("Location: rendering.php");
   }
};


echo '</pre>';

?>

<body>




   <form action="add_pizza.php" method="POST">
      <label for="">Email:</label>
      <input type="text" value="<?php echo htmlspecialchars($email); ?>" placeholder="xyz@email.com" name="email">
      <?php if ($error['email']) echo "<span style='color: red;'>" . $error["email"] . "</span>" ?>
      <br>
      <label for="">name:</label>
      <input type="text" value="<?php echo htmlspecialchars($title); ?>" placeholder="xyz" name="title">
      <?php if ($error['title']) echo "<span style='color: red;'>" . $error["title"] . "</span>" ?>
      <br>
      <label for="">Hobbies (comma seperated) :</label>
      <input type="text" <?php echo htmlspecialchars($items); ?> placeholder="codeing, singing, running" name="items">
      <?php if ($error['items']) echo "<span style='color: red;'>" . $error["items"] . "</span>" ?>

      <button type="submit" name="submit" value="submit">Submit</button>

   </form>

</body>
</body>

</html>