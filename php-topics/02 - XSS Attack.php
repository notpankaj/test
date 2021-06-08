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
   // accessing POST OBJ
   if (isset($_POST)) var_dump($_POST);



   // ===== un secure =======


   // //with htmlspecialchar
   // echo $_POST["email"];
   // echo "<br>";
   // echo $_POST["title"];
   // echo "<br>";
   // echo $_POST["hobbies"];
   // echo "<br>";
   // echo '</pre>';



   // ===== secure =======

   // with htmlspecialchar
   echo htmlspecialchars($_POST["email"]);
   echo "<br>";
   echo htmlspecialchars($_POST["title"]);
   echo "<br>";
   echo htmlspecialchars($_POST["hobbies"]);
   echo "<br>";
   echo '</pre>';


   ?>


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

<!-- 

   ================
   XSS Atttack
   ================
   when some one submit 
         <script>
            window.location = "https://www.w3schools.com";
         </script>
   this kind of script in server ,this can cause server to download some kind of virus

   =============
   Prevention
   =============
   make this kind of script html entity's using 
   htmlspecialchars() function
   
 -->