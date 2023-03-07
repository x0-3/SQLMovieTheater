<?php

namespace Controller;
use Model\Connect;

class MovieTheaterController{

    // list of movies

    public function listFilms(){
        $pdo = connect::Connection();
        $stmt = $pdo->query("
            SELECT title, DATE_FORMAT(releaseDateFrance,'%d/%m/%Y') AS releaseDay, poster
            FROM movie
        ");

        require "view/listFilms.php";
    }

    public function movieDetail($id){
        $pdo = Connect::Connection();
        $stmt = $pdo->prepare("SELECT * FROM movie WHERE idMovie = :id");
        $stmt->execute([
            "id"=>$id
        ]);

        require "view\movieDetail.php";
    }
}






