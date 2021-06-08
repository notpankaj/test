<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>



<body>

   <?php echo '<pre>';
   // accessing GET OBJ 
   if (isset($_GET)) var_dump($_GET);
   echo '</pre>'; ?>
   <?php echo '<pre>';
   // accessing POST OBJ
   if (isset($_POST)) var_dump($_POST);

   // accessing value with key
   echo $_POST["email"];
   echo "<br>";
   echo $_POST["title"];
   echo "<br>";
   echo $_POST["hobbies"];
   echo "<br>";
   echo '</pre>'; ?>


   <form action="" method="POST">
      <label for="">Email:</label>
      <input type="text" name="email">
      <br>
      <label for="">Title:</label>
      <input type="text" name="title">
      <br>
      <label for="">Hobbies (comma seperated) :</label>
      <input type="text" name="hobbies">

      <button type="submit" name="submit" value="submit">Submit</button>

   </form>

</body>

</html>