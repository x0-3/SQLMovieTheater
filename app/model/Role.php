<?php

class Role{
    // Attribute
    private $roleName;
    private array $movieCasts;


    // construct
    public function __construct($roleName)
    {
        $this->roleName=$roleName;
        $this-> movieCasts = [];
    }


    // getter
    public function getRoleName()
    {
        return $this->roleName;
    }


    // setter
    public function setRoleName()
    {
        $this->roleName;
    }


    // add $movieCasts in an array
    public function addMovieCast(MovieCast $movieCast){
        $this-> movieCasts[] = $movieCast;
    }
    // show the liste of the movie cast with a forEach
    public function showMovieCast(){
        foreach($this->movieCasts as $movieCast){
            echo $movieCast;
        }
    }


    // to string
    public function __toString()
    {
        return "Role : {$this-> roleName}</br>";
    }


}


