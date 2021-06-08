<?php

require_once 'person.php';
class Student extends Person {
    public $id;
    //gets constuctur from Person class 
    public function __construct($name,$surname,$id,$age){
        parent::__construct($name,$surname); 
        $this->id  = $id;
        $this->age = $age; //protected

    }
}