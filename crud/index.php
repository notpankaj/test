<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body style="padding: 5rem 2rem;">

   <a href="add_pizza.php" class="btn btn-secondary">Add Pizza</a>

   <?php

   $conn = mysqli_connect("localhost", "dog", '54321', "ninja");

   if (!$conn) echo " conncection error" . mysqli_connect_error() .  "";

   $sql = 'SELECT * FROM `pizza` ORDER BY `created_at`';

   $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
   $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
   mysqli_free_result($result);
   mysqli_close($conn);


   echo '<pre>';
   // var_dump($pizzas);
   echo '</pre>';
   ?>

   <?php foreach ($pizzas as $pizza) { ?>

      <div class="card" style="width: 18rem;">
         <div class="card-body">
            <h5 class="card-title" style="margin-bottom: 1rem;"><?php echo htmlspecialchars($pizza['title']);  ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Ingredients</h6>
            <?php foreach (explode(',', $pizza["items"]) as $item) {
               echo "<li>" .  htmlentities($item) . "</li>";
            }; ?>
            <a href="#" class="btn btn-primary">More Info</a>
         </div>
      </div>


   <?php }; ?>

</body>

</html>