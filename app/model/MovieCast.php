<?php

class MovieCast{
    // Attribute
    private Movie $movie;
    private Actor $actor;
    private Role $role;

    
    // construct
    public function __construct(Movie $movie, Actor $actor, Role $role)
    {
        $this->movie = $movie;
        $movie->addMovieCast($this);
        $this->actor = $actor;
        $actor->addMovieCast($this);
        $this->role = $role;
        $role->addMovieCast($this);
    }


    // setter
    public function setMovie()
    {
        $this->movie;
    }
    public function setActor()
    {
        $this->actor;
    }
    public function setRole()
    {
        $this->role ;
    }


    // getter
    public function getMovie()
    {
        return $this->movie;
    }

    public function getActor()
    {
        return $this->actor;
    }

    public function getRole()
    {
        return $this->role;
    }


    // to string
    public function __toString()
    {
        return "{$this->getActor()}</br> {$this->getRole()}</br>";
        
    }
    
}