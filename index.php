<?php

use Controller\MovieTheaterController;

spl_autoload_register(function($class_name){
    include $class_name . '.php';
});

$ctrlMovieTheater = new MovieTheaterController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET['action'])){
    switch($_GET['action']){

        case "listFilms": $ctrlMovieTheater->listFilms();break;
        case "listActors": $ctrlMovieTheater->listActors();break;
        case "listRoles": $ctrlMovieTheater->listRoles();break;
        case "listProducers": $ctrlMovieTheater->listProducers();break;
        case "listGenres": $ctrlMovieTheater->listGenres();break;
        case "movieDetail": $ctrlMovieTheater->movieDetail($id);break;
    }
}