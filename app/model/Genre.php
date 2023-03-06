<?php

class Genre{
    // Attribute
    private $genreName;
    private array $movies;


    // construct
    public function __construct($genreName){
        $this->genreName = $genreName;
        $this->movies= [];
    }


    // setter
    public function setGenreName()
    {
        $this->genreName;
    } 

    
    // getter
    public function getGenreName()
    {
        return $this->genreName;
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

    // get the number of movies for a genre
    public function numberMovies(){
        $nbMovies= count($this->movies);
        return $nbMovies;
    }


    // to string
    public function __toString()
    {
        return "Genre : ". $this->genreName;
    }
}