<?php

class Movie{
    // Attribute
    private $title;
    private $releaseDate;
    private $runningTime;
    private $synopsis;
    private $poster;
    private Genre $genre;
    private Producer $producer;
    private array $movieCasts;


    // Construct function
    public function __construct($title,$releaseDate,$runningTime,$synopsis,$poster,Genre $genre,Producer $producer){
        $this->title = $title;
        $this->releaseDate = $releaseDate;
        $this->runningTime = $runningTime;
        $this->synopsis = $synopsis;
        $this->poster = $poster;
        $this->genre = $genre;
        $genre->addMovies($this);
        $this->producer = $producer;
        $producer->addMovies($this);
        $this-> movieCasts = [];
    }


    // setter
    public function setTitle(){
        $this->title;
    }

    public function setReleaseDate(){
        $this->releaseDate;
    }

    public function setRunningTime(){
        $this->runningTime;
    }

    public function setSynopsis(){
        $this->synopsis;
    }

    public function setPoster(){
        $this->poster;
    }

    public function setGenre(){
        $this->genre;
    }

    public function setProducer(){
        $this->producer;
    }


    // getter
    public function getTitle(){
        return $this->title;
    } 

    public function getReleaseDate(){
        return $this->releaseDate;
    }

    public function getRunningTime(){
        return $this->runningTime;
    }

    public function getSynopsis(){
        return $this->synopsis;
    }

    public function getPoster(){
        return $this->poster;
    }

    public function getGenre(){
        return $this->genre;
    }

    public function getProducer(){
        return $this->producer;
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
        return "<h3 class='uk-text-bold uk-heading-bullet'>{$this->title}</h3>
        release date : {$this->releaseDate}</br>
        Time : {$this->runningTime}</br>
        synopsis : {$this->synopsis}</br>
        Poster : {$this->poster}</br>
        {$this->genre}</br>";
    }
}

