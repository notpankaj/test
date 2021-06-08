<?php

// Function which prints "Hello I am Zura"
// function hello($name){
//     echo "hello, im $name";
// };
// hello('pankaj');

// Function with argument

// Create sum of two functions
function sum(...$num){
   return array_reduce($num,fn($carry,$n)=>$carry + $n);
};
echo sum(10,10,10,10,10,10,10,10,10,10,10,20);


// Create function to sum all numbers using ...$nums

// Arrow functions
