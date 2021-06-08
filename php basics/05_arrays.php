<?php

// // Create array
// $fruits = ['orange','mango','banana'];
// // Print the whole array
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// // Get element by index
// // echo $fruits[1];
// // // Set element by index
// // $fruits[1] = 'peach';
// // echo '<pre>';
// // var_dump($fruits);
// // echo '</pre>';

// // // Check if array has element at index 2
// // echo isset($fruits[2]);
// // // Append element
// // $fruits[] = 'grapes';
// // echo '<pre>';
// // var_dump($fruits);
// // echo '</pre>';
// // // Print the length of the array
// // echo count($fruits);

// // // Add element at the end of the array
// // array_push($fruits,"push-foo");
// // echo '<pre>';
// // var_dump($fruits);
// // echo '</pre>';

// // // Remove element from the end of the array
// // array_pop($fruits);
// // echo '<pre>';
// // var_dump($fruits);
// // echo '</pre>';

// // // Add element at the beginning of the array
// // array_unshift($fruits,'un-shift-foo');
// // echo '<pre>';
// // var_dump($fruits);
// // echo '</pre>';

// // // Remove element from the beginning of the array
// // array_shift($fruits);
// // echo '<pre>';
// // var_dump($fruits);
// // echo '</pre>';


// // Split the string into an array
// $str = 'dragonf,pomigri,opume';
// echo '<pre>';
// var_dump(explode(",",$str));
// echo '</pre>';

// // Combine array elements into string
// echo implode("&",$fruits);

// // Check if element exist in the array
// echo in_array('orange',$fruits);

// // Search element index in the array
// echo array_search('opume',$fruits);

// // Merge two arrays

// $veg = ['tomato','potato'];
// echo '<hr>';
// var_dump(array_merge($fruits,$veg));
// var_dump([...$veg,...$fruits]);
// echo '<hr>';
// var_dump([...$veg,...$fruits]);


// // Sorting of array (Reverse order also)
// rsort($fruits);
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// https://www.php.net/manual/en/ref.array.php

// ============================================
// Associative arrays
// ============================================

// Create an associative array
$arr = [
    'name'=> 'brad',
    "surname"=>"terversey",
    "hobbi"=>['suck',"fuck"],
];
// echo "<pre>";
// var_dump($arr);
// echo '</pre>';

// // Get element by key
// echo $arr['name'];
// print_r($arr['address']) ;

// Set element by key
// $arr['channel'] = "sex media";

// echo "<pre>";
// var_dump($arr);
// echo '</pre>';


// Null coalescing assignment operator. Since PHP 7.4
// if(!isset($arr['address'])){
//     $arr['address'] = "unknown";
// };

// using Null coalescing (ternery in JS)
// $arr['address'] = $arr['address'] ?? 'uknown'; 
// $arr['address'] ? $arr['address'] : 'unkown';  //(in js)

// $arr['address'] ??= 'unknown';

echo "<pre>";
var_dump($arr);
echo '</pre>';

// Check if array has specific key

// Print the keys of the array
// echo "<pre>";
// var_dump(array_keys($arr));
// echo '</pre>';


// // Print the values of the array
// echo "<pre>";
// var_dump(array_values($arr));
// echo '</pre>';

// Sorting associative arrays by values, by keys
// asort($arr);
// echo "<pre>";
// var_dump($arr);
// echo '</pre>';


// Two dimensional arrays
$todos = [
    ['id' => "1" , "completed" => "true"],
    ['id' => "2" , "completed" => "false"],
];

echo "<pre>";
var_dump($todos);
echo '</pre>';