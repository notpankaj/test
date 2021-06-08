<?php

use Kreait\Firebase\Request\CreateUser;

session_start();
  include("./dbconfig.php");

//inset
if(isset($_POST['save-data'])){
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];


   $postData = [
      'firstname'=>$firstname,
      'lastname'=>$lastname,
      'phone'=>$phone,
      'email'=>$email,
   ];



   $postRef = $database->getReference('contacts')->push($postData);

   if($postRef){
      $_SESSION['status'] = "data inserted successfully";
      header('Location: index.php');
   }else {
      $_SESSION['status'] = "data not inserted";
      header('Location: add-contact.php');
   }
};


//handle update

if(isset($_POST['update-data'])){
   $id= $_POST['id'];
   $updatedData = [
      "firstname" => $_POST['firstname'],
      "lastname" => $_POST['lastname'],
      "phone" => $_POST['phone'],
      "email" => $_POST['email'],
   ];
   //update to db
   $database->getReference("contacts/".$id."")->update($updatedData);

   header('Location: index.php');

}

//handle update
if(isset($_POST['delete-data'])){
   
   $id = $_POST['id'];

   $database->getReference("contacts/".$id."")->remove();

   header('Location: index.php');
}

//handle register
if(isset($_POST['register-user'])){

      $userProperties = [
          'email' => $_POST['email'],
          'emailVerified' => false,
          'phoneNumber' => "+91".$_POST['phone'],
          'password' => $_POST['password'],
          'displayName' => $_POST['fullname'],
      ];
     
      $createdUser = $auth->createUser($userProperties); //return true if all requirements are meet eg:email /pw
      // if($createUser){

      // };
};


//handle login
if(isset($_POST['register-user'])){
   var_dump($_POST);
}