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
   $endpoint = "https://reqres.in/api/users?page=2";

   // curl initialization
   $fetch = curl_init();

   //pasing endipoint

   curl_setopt($fetch, CURLOPT_URL, $endpoint);

   //return req true
   curl_setopt($fetch, CURLOPT_RETURNTRANSFER, true);

   //sending req
   $response = curl_exec($fetch);

   //checking error
   if ($e = curl_error($fetch)) {
      echo $e;
   } else {
      //converting json into AAArray
      $decoded = json_decode($response);
      var_dump($decoded);
   }

   echo '<pre>';
   var_dump(curl_close($fetch));
   echo '</pre>';







   ?>
</body>

</html>