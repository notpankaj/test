<?php

// What is a variable

// Variable types

// Declare variables
$name = "Zura";
$age = 28;
$vergin = true;
$height = 5.8;
$postion = null;


// Print the variables. Explain what is concatenation

// Print types of the variables
echo $name.gettype($name)."<br>";
echo $age.gettype($age)."<br>";
echo $vergin.gettype($vergin)."<br>";
echo $postion.gettype($postion)."<br>";
echo $height.gettype($height)."<br>";

echo "<br><br><br><br><br><br><br>";
// Print the whole variable
echo var_dump($name,$age,$height,$vergin,$postion);


echo "<br><br><br><br><br><br><br>";
// Change the value of the variable
// Print type of the variable

// Variable checking functions
echo is_string($name);
echo is_int($age);
echo is_double($height);
echo is_null($postion);
echo is_bool($vergin);

echo "<br><br><br><br><br><br><br>";

// Check if variable is defined
echo isset($name);
echo isset($dicksize);
// Constants
echo "<br><br><br><br><br><br><br>";
define("love",'pubg');
echo love;
// Using PHP built-in constants
echo "<br><br><br><br><br><br><br>";
