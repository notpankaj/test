<?php

print_r($_POST);

if($_FILES['image']['name']){

    print_r($_FILES['image']);   

$filename = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$dir = 'uploads/';

$moving = move_uploaded_file($tmp_name, $dir . $filename);
if($moving){
    echo "moved success";
}

}