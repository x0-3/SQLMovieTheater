<?php

namespace Controller;
use Model\Connect;

class MovieTheaterController{

    // list of movies

    public function listFilms(){
        $pdo = connect::Connection();
        $stmt = $pdo->query("
            SELECT idMovie,title, DATE_FORMAT(releaseDateFrance,'%d/%m/%Y') AS releaseDay, poster
            FROM movie
        ");

        require "view/listFilms.php";
    }

    public function listActors(){
        $pdo = Connect::Connection();
        $stmt = $pdo->query("
        SELECT idActor, familyName, NAME, gender, DATE_FORMAT(birthday, '%d/%m/%Y') AS birthday, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),birthday)),'%Y')+0 AS age
        FROM actor a
        INNER JOIN person p
        ON a.idPerson=p.idPerson
        ");
        require "view/listActors.php";
    }

    public function movieDetail($id){
        $pdo = Connect::Connection();
        $stmt = $pdo->prepare("SELECT poster,title, DATE_FORMAT(releaseDateFrance,'%d/%m/%Y') AS releaseDate, TIME_FORMAT(SEC_TO_TIME(runningTime),'%H:%i') AS RunningTime, familyName,NAME, genreName FROM movie m INNER JOIN producer pr ON m.idProducer = pr.idProducer INNER JOIN person p ON pr.idPerson=p.idPerson INNER JOIN moviegenre mg ON mg.idMovie = m.idMovie INNER JOIN genre g ON g.idGenre = mg.idGenre WHERE m.idMovie = :id");
        $stmt->execute(["id"=>$id]);
        require "view/movieDetail.php";
    }
}






