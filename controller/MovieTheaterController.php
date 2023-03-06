<?php

namespace Controller;
use Model\Connect;

class MovieTheaterController{

    // list of movies

    public function listFilms(){
        $pdo = connect:: Connection();
        $stmt = $pdo->query("
            SELECT title, DATE_FORMAT(releaseDateFrance,'%d/%m/%Y') AS releaseDay, familyName, name
            FROM movie m
            INNER JOIN producer pr
            ON m.idProducer = pr.idProducer
            INNER JOIN person p
            ON p.idPerson = pr.idPerson
        ");

        require "view/listFilms.php";
    }

}






