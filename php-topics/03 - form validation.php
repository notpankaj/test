<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<?php


/* ==========
    form submit handling
   ===========*/
// $_SERVER('METHOD) == 'POST //better than isset
if (isset($_POST["submit"]) == "submit") {

   var_dump($_POST);


   /* ==========
    showing validation
   ===========*/
   $error = array(
      'email' => '',
      'name' => '',
      'hobbies' => '',
   );
   echo '<pre>';


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
    name validation
   ===========*/
   if (empty($_POST["name"])) {
      $error['name'] = "please enter name";
   } else {
      $name = $_POST["name"];
      // using REGX - from start to end only accept lower/Uppercase letter and space
      if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
         $error['name'] = "name must be letter's and space's only";
      }
   };
   echo "<br>";


   /* ==========
    hobby validation
   ===========*/
   if (empty($_POST["hobbies"])) {
      $error['hobbies'] = "please enter a hobby";
   } else {
      $hobbies = htmlspecialchars($_POST["hobbies"]);
      // using REGX - look for comma seperated list
      if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $hobbies)) {
         $error['hobbies'] = "hobbies must be a comma seperated list";
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
      // after submit
      header("Location: index.php");
      exit;
   }
};


echo '</pre>';

?>

<body>


   <form action="" method="POST">
      <label for="">Email:</label>
      <input type="text" value="<?php echo htmlspecialchars($email); ?>" placeholder="xyz@email.com" name="email">
      <?php if ($error['email']) echo "<span style='color: red;'>" . $error["email"] . "</span>" ?>
      <br>
      <label for="">name:</label>
      <input type="text" value="<?php echo htmlspecialchars($name); ?>" placeholder="xyz" name="name">
      <?php if ($error['name']) echo "<span style='color: red;'>" . $error["name"] . "</span>" ?>
      <br>
      <label for="">Hobbies (comma seperated) :</label>
      <input type="text" <?php echo htmlspecialchars($hobbies); ?> placeholder="codeing, singing, running" name="hobbies">
      <?php if ($error['hobbies']) echo "<span style='color: red;'>" . $error["hobbies"] . "</span>" ?>

      <button type="submit" name="submit" value="submit">Submit</button>

   </form>

</body>
</body>

</html>