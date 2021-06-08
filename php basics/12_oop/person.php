<?php
class Person {
    public string $name ;
    public string $surname;
    protected ?int $age; //its an integer but also accept null values
    public static int $counter = 0;

    public function __construct($name, $surname){
        $this->name  = $name;
        $this->surname  = $surname; 
        self::$counter++;
        $this->age = null;
    }
    public function setAge($age){
        $this->age = $age; 
    }
    public function getAge(){
        return $this->age;
    }
    public function getCounter(){
        return $this::$counter;
    }
};

