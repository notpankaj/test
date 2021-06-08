<?php

use function PHPSTORM_META\type;

$url = 'https://jsonplaceholder.typicode.com/users';

// Sample example to get data.
// $resource = curl_init($url); //fetch
// curl_setopt($resource,CURLOPT_RETURNTRANSFER,true); //setting some property to true

// // //get info about req
// $info = curl_getinfo($resource);
// echo "<pre>".var_dump($info)."</pre>";

// //get req response code 
// $code = curl_getinfo($resource, CURLINFO_HTTP_CODE);
// echo $code;

// //actual data
// $result = curl_exec($resource);
// echo "<pre>$result</pre>";

// -------------
// //cancel req
// curl_close($resource); 

// Get response status code

// set_opt_array

// Post request
$randomData = [
    'name'=> "random",
    'surname' => "also randam",
    "age" => "Not Randam",
    "hobbies" => [ "Some","random", "thing" ],
];

$resource = curl_init();
curl_setopt_array($resource,[
    CURLOPT_URL => $url,               //endpoint
    CURLOPT_RETURNTRANSFER => true,    //we want resoure
    CURLOPT_POST => true,              //POST method
    CURLOPT_HTTPHEADER => ["content-type: application/json"],
    CURLOPT_POSTFIELDS => json_encode($randomData), //parsing data to string  to post 
]);

$result = curl_exec($resource);
curl_close($resource);

echo $result;