<?php

class Person {
    // Attribute 
    private $familyName;
    private $name;
    private $gender;
    private $birthday;

    
    // construct
    public function __construct($familyName,$name,$gender,$birthday){
        $this-> familyName =$familyName;
        $this-> name =$name;
        $this-> gender =$gender;
        $this-> birthday =$birthday;
    }


    // setter
    public function setFamilyName(){
        $this->familyName;
    }
    public function setName(){
        $this->name;
    }
    public function setGender(){
        $this->gender ;
    }
    public function setBirthday(){
        $this->birthday;
    }


    // getter
    public function getFamilyName(){
        return $this->familyName;
    }

    public function getName(){
        return $this->name;
    }

    public function getGender(){
        return $this->gender;
    }

    public function getBirthday(){
        return $this->birthday;
    }

    // calculate the age of a person with the current date 
    public function age(){
        $date= new DateTime();
        $birthday = new DateTime($this->getBirthday());
        $diff= $birthday->diff($date)->format("%Y years old");
        return $diff;
    }

    // to string
    public function __toString()
    {
        return "name : {$this-> familyName} {$this-> name}</br> gender : {$this-> gender}</br> birthday: {$this-> birthday}</br>{$this-> age()} ";
    }
}