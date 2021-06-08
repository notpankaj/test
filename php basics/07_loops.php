<?php

$n = 1;
// while
// while(true){}
  

// Loop with $counter

// do - while
// do {
//     echo "$n <br>";
//     $n++;
// } while ($n < 50);

// for
// for ($i = 0; $i < 15; $i++){
//     echo $i;
// };
// foreach
// $f = ['banana','mango',"peach",'orange'];
// foreach( $f as $eat){
//     echo $eat."<br>";
// };

// Iterate Over associative array.
$person = [
    'name' => "pankaj",
    "age" => 21,
    "hobbies" => ['gaming', "gym",'idk'],
];

foreach($person as $key => $value){
    if(is_array($value)){
        echo implode(' ',$value); 
    }else{

        echo $value.'<br>';
    };
    
     
}
