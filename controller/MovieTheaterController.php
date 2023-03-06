<?php

namespace Controller;
use Model\Connect;

class MovieTheaterController{

    // list of movies

    public function listFilms(){
        $pdo = connect::Connection();
        $stmt = $pdo->query("
            SELECT title, DATE_FORMAT(releaseDateFrance,'%d/%m/%Y') AS releaseDay
            FROM movie
        ");

        require "view/listFilms.php";
    }

}






