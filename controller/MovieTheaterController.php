<?php

//instance the file folder
namespace Controller;
use Model\Connect; // direct a directory that is going to be used 

// class with all the query used this class is connected to the database
class MovieTheaterController{

    // list of all the movies in db
    public function listFilms(){
        $pdo = connect::Connection();
        $stmt = $pdo->query("SELECT idMovie,title, DATE_FORMAT(releaseDateFrance,'%d/%m/%Y') AS releaseDay, poster
            FROM movie
        ");

        require "view/listFilms.php";
    }

    // list of all the actors in db
    public function listActors(){
        $pdo = Connect::Connection();
        $stmt = $pdo->query("SELECT idActor, familyName, NAME, gender, DATE_FORMAT(birthday, '%d/%m/%Y') AS birthday, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),birthday)),'%Y')+0 AS age
        FROM actor a
        INNER JOIN person p
        ON a.idPerson=p.idPerson
        ");
        require "view/listActors.php";
    }

    // list of all the roles in db
    public function listRoles(){
        $pdo = Connect::Connection();
        $stmt = $pdo->query("SELECT a.idActor,familyName, NAME,roleName,title, DATE_FORMAT(releaseDateFrance,'%d/%m/%Y') AS releaseDate
        FROM moviecast mc
        INNER JOIN actor a
        ON mc.idActor= a.idActor
        INNER JOIN person p
        ON a.idPerson=p.idPerson
        INNER JOIN ROLE r
        ON mc.idRole=r.idRole
        INNER JOIN movie m
        ON mc.idMovie=m.idMovie
        ");
        require "view/listRoles.php";
    }

    // list of all the producers in db
    public function listProducers(){
        $pdo = Connect ::Connection();
        $stmt = $pdo->query("SELECT m.idProducer,familyName,name,title, DATE_FORMAT(releaseDateFrance,'%d/%m/%Y') AS releaseDate
        FROM movie m
        INNER JOIN producer pr 
        ON m.idProducer=pr.idProducer
        INNER JOIN person p
        ON p.idPerson=pr.idPerson
        ");
        require "view\listProducers.php";
    }

    // list of all the genres in db
    public function listGenres(){
        $pdo = Connect::Connection();
        $stmt=$pdo->query("
        SELECT *
        FROM genre
        ");
        require "view\listGenres.php";
    }

    // detail of one movie by it's ID
    public function movieDetail($id){
        $pdo = Connect::Connection();
        $stmt = $pdo->prepare("SELECT mg.idGenre,m.idProducer,poster,title, DATE_FORMAT(releaseDateFrance,'%d/%m/%Y') AS releaseDate, TIME_FORMAT(SEC_TO_TIME(runningTime),'%H:%i') AS RunningTime, familyName,NAME, genreName 
        FROM movie m 
        INNER JOIN producer pr 
        ON m.idProducer = pr.idProducer 
        INNER JOIN person p
        ON pr.idPerson=p.idPerson 
        INNER JOIN moviegenre mg 
        ON mg.idMovie = m.idMovie 
        INNER JOIN genre g 
        ON g.idGenre = mg.idGenre 
        WHERE m.idMovie = :id
        ");
        $stmt->execute(["id"=>$id]);
        
        $stmt2 =$pdo->prepare("SELECT a.idActor,title, familyName, NAME, gender, roleName
        FROM moviecast mc
        INNER JOIN actor a
        ON mc.idActor=a.idActor
        INNER JOIN person p
        ON a.idPerson=p.idPerson
        INNER JOIN movie m
        ON mc.idMovie=m.idMovie
        INNER JOIN ROLE r
        ON mc.idRole=r.idRole
        WHERE m.idMovie = :id 
        ");
        $stmt2->execute(["id"=>$id]);
        
        $stmt3 =$pdo->prepare("SELECT g.idGenre, genreName
        FROM moviegenre mg
        INNER JOIN movie m
        ON mg.idMovie = m.idMovie
        INNER JOIN genre g
        ON mg.idGenre=g.idGenre
        WHERE m.idMovie= :id"
        );
        $stmt3->execute(["id"=>$id]);

        require "view/movieDetail.php";
    }

    // detail of one producer by it's ID
    public function producerDetail($id){
        $pdo = Connect::Connection();
        $stmt = $pdo->prepare("SELECT m.idProducer,photo,familyName,NAME,gender,DATE_FORMAT(birthday,'%d/%m/%Y') AS birthday,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),birthday)),'%Y')+0 AS age,title, DATE_FORMAT(releaseDateFrance,'%d/%m/%Y') AS releaseDate 
        FROM movie m 
        INNER JOIN producer pr  
        ON m.idProducer=pr.idProducer 
        INNER JOIN person p 
        ON p.idPerson=pr.idPerson 
        WHERE pr.idProducer= :id
        ");
        $stmt->execute(["id"=>$id]);
        require "view/producerDetail.php";
    }

    // detail of one genre by it's ID
    public function genreDetail($id){
        $pdo = Connect::Connection();
        $stmt = $pdo->prepare("SELECT mg.idGenre,genreName,title,DATE_FORMAT(releaseDateFrance,'%d/%m/%Y'),synopsis 
        FROM moviegenre mg 
        INNER JOIN genre g 
        ON mg.idGenre=g.idGenre 
        INNER JOIN movie m 
        ON m.idMovie=mg.idMovie 
        WHERE mg.idGenre= :id
        ");
        $stmt->execute(["id"=>$id]);

        $stmt2= $pdo->prepare("SELECT m.idMovie,g.idGenre,title,genreName ,poster,DATE_FORMAT(releaseDateFrance,'%d/%m/%Y') AS releaseDate, TIME_FORMAT(SEC_TO_TIME(runningTime),'%H:%i') AS RunningTime
        FROM moviegenre mg
        INNER JOIN movie m
        ON mg.idMovie=m.idMovie
        INNER JOIN genre g
        ON mg.idGenre=g.idGenre
        WHERE g.idGenre= :id
        ");
        $stmt2->execute(["id"=>$id]);
        require "view/GenreDetail.php";
    }

    // detail of one actor by it's ID
    public function actorDetail($id){
        $pdo = Connect::Connection();
        $stmt = $pdo->prepare("SELECT idActor,familyName,NAME,gender,DATE_FORMAT(birthday,'%d/%m/%Y') AS birthday,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),birthday)),'%Y')+0 AS age,photo 
        FROM actor a 
        INNER JOIN person p 
        ON a.idPerson=p.idPerson 
        WHERE idActor= :id
        ");
        $stmt->execute(["id"=>$id]);
        require "view/actorDetail.php";
    }
}






