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

        require "view/movie/listFilms.php";
    }


    // list of all the actors in db
    public function listActors(){
        $pdo = Connect::Connection();
        $stmt = $pdo->query("SELECT idActor, familyName, NAME, gender, DATE_FORMAT(birthday, '%d/%m/%Y') AS birthday, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),birthday)),'%Y')+0 AS age
        FROM actor a
        INNER JOIN person p
        ON a.idPerson=p.idPerson
        ");
        require "view/actor/listActors.php";
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
        require "view/role/listRoles.php";
    }


    // list of all the producers in db
    public function listProducers(){
        $pdo = Connect ::Connection();
        $stmt = $pdo->query("SELECT pr.idProducer,familyName,name,title, DATE_FORMAT(releaseDateFrance,'%d/%m/%Y') AS releaseDate
        FROM producer pr
        INNER JOIN person p 
        ON pr.idPerson = p.idPerson
        INNER JOIN movie m
        ON m.idProducer = pr.idProducer
        ");
        require "view/producer/listProducers.php";
    }


    // list of all the genres in db
    public function listGenres(){
        $pdo = Connect::Connection();
        $stmt=$pdo->query("
        SELECT *
        FROM genre
        ");
        require "view/genre/listGenres.php";
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

        require "view/movie/movieDetail.php";
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
        require "view/producer/producerDetail.php";
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
        require "view/genre/GenreDetail.php";
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
        require "view/actor/actorDetail.php";
    }


    // insert a new actor in db
    public function addActor($familyName,$name,$gender,$birthday,$photo){
        $pdo = Connect::Connection();
        $stmt = $pdo->prepare("INSERT INTO person (familyName,NAME,gender,birthday,photo) 
        VALUES(:familyName,:NAME,:gender,:birthday,:photo)
        ");
        $stmt->execute([
            "familyName"=>$familyName,
            "NAME"=>$name,
            "gender"=>$gender,
            "birthday"=>$birthday,
            "photo"=>$photo,
        ]);


        $stmt2 = $pdo->query("INSERT INTO actor (idPerson)
        VALUES (LAST_INSERT_ID())
        ");

        require "view/actor/addActor.php";  
    }


    public function addProducer($familyName,$name,$gender,$birthday,$photo){
        $pdo = Connect::Connection();
        $stmt = $pdo->prepare("INSERT INTO person (familyName,NAME,gender,birthday,photo) 
        VALUES(:familyName,:NAME,:gender,:birthday,:photo)
        ");
        $stmt->execute([
            "familyName"=>$familyName,
            "NAME"=>$name,
            "gender"=>$gender,
            "birthday"=>$birthday,
            "photo"=>$photo,
        ]);

        $stmt2 = $pdo->query("INSERT INTO producer(idPerson)
        VALUES (LAST_INSERT_ID())
        ");
        require "view/producer/addProducer.php";
    }


    public function addGenre($genreName){
        $pdo = Connect::Connection();
        $stmt =$pdo->prepare("INSERT INTO genre (genreName)
        VALUES (:genreName)
        ");
        $stmt->execute([
            "genreName"=>$genreName,
        ]);

        require "view/genre/addGenre.php";
    }

    // FIXME:
    public function addMovie($title,$releaseDateFrance,$runningTime,$synopsis,$poster,$producer){
        $pdo = Connect::Connection();
        $stmt = $pdo->prepare("INSERT INTO movie (title,releaseDateFrance,runningTime,synopsis,poster,idProducer)
        VALUES (:title,:releaseDateFrance,:runningTime,:synopsis,:poster,:idProducer)
        ");
        $stmt->execute([
            "title"=>$title,
            "releaseDateFrance"=>$releaseDateFrance,
            "runningTime"=>$runningTime,
            "synopsis"=>$synopsis,
            "poster"=>$poster,
            "idProducer"=>$producer,
        ]);

        require "view/movie/addMovie.php";
    }
    // FIXME:
    public function MovieForm(){
        $pdo = Connect::Connection();
        $stmt = $pdo->query("SELECT p.idPerson, familyName,name
        FROM person p
        INNER JOIN producer pr
        ON p.idPerson = pr.idPerson
        ");

        require "view/movie/addMovie.php";
    }
}






