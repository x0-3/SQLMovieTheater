<?php
include "Person.php";

class Actor extends Person{
    // attribute
    private array $movieCasts;

    // construct
    public function __construct($familyName,$name,$gender,$birthday){
        parent::__construct($familyName,$name,$gender,$birthday);
        $this->movieCasts= [];
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

}
