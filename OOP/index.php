<?php
   require('user_validator.php');

   //check if the form is submit via submit btn or not
   if(isset($_POST["submit"])){
      // var_dump($_POST);
      // echo "<hr>";
      $validation = new UserValidator($_POST);
      $errors = $validation->validateForm();
   }


?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Validation OOP</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="new-user">
      <h2>Create New User</h2>

      <!-- superglobal path to itself -->
      <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
         
         <label >Username:</label>
         <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username']) ?? '' ?>">
         <div class="error">
            <?php 
               echo $errors['username'] ?? ''; 
            ?>
         </div>

         <label >Email:</label>
         <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email']) ?? '' ?>">
         <div class="error">
            <?php 
               echo $errors['email'] ?? ''; 
            ?>
         </div>

         <input type="submit" value="submit" name="submit">      
      </form>

   </div>
</body>
</html>