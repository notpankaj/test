<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>

   <?php
   /*==============
   connecting to db
   ================*/
   // parameter : hostname, username, password, db_name
   $conn = mysqli_connect("localhost", "dog", '54321', "ninja");

   //check connection
   if (!$conn) echo " conncection error" . mysqli_connect_error() .  "";

   /*==============
   performing querie 
   ================*/
   // steps: 1.construct  2.make  3.fetch 4.free memory(good pratice)

   // ----------  1.write query -------------
   $sql = 'SELECT * FROM `pizza`';

   // ----------  2.makeing query -------------
   // parameter : db refernce, query
   $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


   // ----------  3.fetch -------------
   // parameter : query , return data format
   $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

   // ----------  4.clear memory -------------
   mysqli_free_result($result); //free result from memory (delete query)
   mysqli_close($conn);  //close connection

   echo '<pre>';
   var_dump($pizzas);
   echo '</pre>';


   ?>

</body>

</html>