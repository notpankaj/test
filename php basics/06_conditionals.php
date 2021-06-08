<?php

$age = 20;
$salary = 300000;

// Sample if

// Without circle braces

// Sample if-else

// Difference between == and ===

// if AND

// if OR

// Ternary if 
// $test = $age === 20 ? 'young' : " old";
// echo $test;

// Short ternary
// $myAge = $age ?: "No"; //if exist return exist value ,otherwise "No"
// echo $myAge;

// Null coalescing operator
// echo $myname = isset($name) ? $name : 'Jhon'; //if true return orignal value ,otherwise "jhone";
// echo $myAge2 ?? "No"; //if exist return exist value ,otherwise "No"

// // switch
$userRole = 'sex';

switch ($userRole) {
    case 'admin':
        echo "ADMIN";
        break;
    case 'editor':
        echo "EDITOR";
        break;
    case 'user':
        echo "USER";
        break;
    default:
        echo "SHIT";
}
