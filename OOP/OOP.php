<?php 

class User {
   //properties
   // public $username = 'ryu';
   protected $username;
   private $email;
   public $role = "member";

   //constructor
   public function __construct($username,$email){
      $this->username = $username;
      $this->email = $email;
   }

   //method
   public function addFriend(){
      return  $this->username . " added new Friend";
   }

   //getter
   public function getEmail(){
      return $this->email;
   }

   //setter
   public function setEmail($email){
      if(strpos($email,'@') > -1){
         return $this->email = $email;
      }
   }

   //overriding eg
   public function message(){
      return $this->username . ' has '. $this->role . " role";
   }

   //destruct
   public function __destruct(){
      // echo "the user $this->username was removed " . "<br>";
   }

   //clone

   public function __clone(){
      $this->username = $this->username . " (cloned)" . "<br>";
   }

};

 $userOne =  new User('pankaj',"pankaj@nomao.com");
 $userTwo =  new User('ram',"ram@nomao.com");
 
//change prop value
//  $userOne->username = 'KAt'; 
 //add new prop
//  $userOne->age = 20; 


//--------- getter setter 

// echo $userOne->getEmail();
// echo $userOne->setEmail('io@');

//------------ in heritence

Class AdminUser extends User {

   public $level;
   public $role = "admin";

   public function __construct($username,$email,$level){
      $this->level = $level;
      parent::__construct($username,$email);
   }

   public function message(){
      return $this->username . ' has '. $this->role . " role, No Replay";
   }
}

$adminUser = new AdminUser("kid","koi@koi.co",8);


//--------------- overriding
// echo $userOne->message(); 
// echo "<br>";
// echo $adminUser->message(); 

//-------------- destruct
//removes all the instance of these
// usset($userOne);

//----------clone
//make a clone of given obj
$userClone = clone $userOne; 





 //==================================
 echo '<pre>';
//  var_dump($userOne);
 echo '</pre>';


 echo '<pre>';
//  var_dump($adminUser);
 echo '</pre>';
 


// //returns the obj's class
//echo "the class is " .get_class($userOne);
// //retun all the property 
// print_r(get_class_vars('User'));
// //retun all the method 
//print_r(get_class_methods('User'));


/*========= 
static method
===========*/
class Weather {
   public static $tempConditions = ['Cold' , 'mild', 'warm'];

   public static function celsiusToFarenheit($c){
      return $c * 9 / 5 + 32;
   }
   
   public static function tempCondition($f){
      if($f < 40){
         // return $this->tetempConditions[1]; 
         //not going to work with static property , because we dont have instance
         return self::$tempConditions[0];
      }else if($f < 70){
         return self::$tempConditions[1];
      }else{
         return self::$tempConditions[2];
      }
   }

} 


$obj =  new Weather();

// print_r($obj->tempConditions);

// can directly access property without creating instance
// print_r(Weather::$tempConditions);

// access static method
// echo Weather::celsiusToFarenheit(20);

// echo Weather::tempCondition(20);

echo '<pre>';
//  var_dump($obj);
echo '</pre>';

?>
