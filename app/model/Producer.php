<?php
include "Person.php";

class Producer extends Person{
    // attribute
    private array $movies;

    // construct
    public function __construct($familyName,$name,$gender,$birthday){
        parent::__construct($familyName,$name,$gender,$birthday);
        $this->movies= [];
    }




    // add $movies in an array
    public function addMovies(Movie $movie){
        $this-> movies[] = $movie;
    }
    // show the liste of movies with a forEach
    public function showMovies(){
        foreach($this->movies as $movie){
            echo $movie;
        }
    }

   
}
