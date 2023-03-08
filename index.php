<?php
// use the controller in order to get the data from the db
use Controller\MovieTheaterController;

// autoloader 
spl_autoload_register(function($class_name){
    include $class_name . '.php';
});

$ctrlMovieTheater = new MovieTheaterController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET['action'])){
    switch($_GET['action']){

        case "listFilms": $ctrlMovieTheater->listFilms();break; // page of all movies
        case "listActors": $ctrlMovieTheater->listActors();break; // page of all Actors
        case "listRoles": $ctrlMovieTheater->listRoles();break; // page of all roles
        case "listProducers": $ctrlMovieTheater->listProducers();break; // page of all producers
        case "listGenres": $ctrlMovieTheater->listGenres();break; // page of all genres
        case "movieDetail": $ctrlMovieTheater->movieDetail($id);break; // page for one movie
        case "producerDetail": $ctrlMovieTheater->producerDetail($id);break; // page for one producer
        case "genreDetail": $ctrlMovieTheater->genreDetail($id);break; // page for one genre
        case "actorDetail": $ctrlMovieTheater->actorDetail($id);break; // page for one actor
    }
} else{
    $ctrlMovieTheater->listFilms();
}