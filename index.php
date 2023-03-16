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

        case "addActorPage": require "view/actor/addActor.php";break; // form for actor

        // add an actor to db
        case "addActor":
            $target_dir = "public/upload/"; //directory of where the file is going to be
            $target_file = $target_dir . basename(uniqid().$_FILES["photo"]["name"]); //specifies the path of the img that gonna be uploaded
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // holds the file extension

            // if button submit pressed then 
            if(isset($_POST['submit'])){
                $familyName = $_POST['familyName'];
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $birthday = $_POST['birthday'];
                // $photo = $_POST['photo'];
                
                $photo = $target_file; //instance the $target_file variable to the poster in order to insert it in db  

                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
                } else {
                echo "File is not an image.";
                $uploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["photo"]["size"] > 200000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
                    } else {
                    echo "Sorry, there was an error uploading your file.";
                    }
                }

                $familyName = filter_input(INPUT_POST, "familyName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                // $photo = filter_input(INPUT_POST, "photo", FILTER_SANITIZE_URL);
                
                if($familyName && $name && $gender){
                    $ctrlMovieTheater->addActor($familyName,$name,$gender,$birthday,$photo);  
                }
            }
            // redirect to the list actor page
            header("location:index.php?action=listActors");

        break; 


        // form for Producer
        case "addProducerPage": require "view/producer/addProducer.php"; break;
        
        // add a Producer to db
        case "addProducer":
            $target_dir = "public/upload/"; //directory of where the file is going to be
            $target_file = $target_dir . basename(uniqid().$_FILES["photo"]["name"]); //specifies the path of the img that gonna be uploaded
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // holds the file extension

            if(isset($_POST['submit'])){

                $familyName = $_POST['familyName'];
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $birthday = $_POST['birthday'];
                // $photo = $_POST['photo'];

                $photo = $target_file; //instance the $target_file variable to the poster in order to insert it in db  

                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
                } else {
                echo "File is not an image.";
                $uploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["photo"]["size"] > 200000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
                    } else {
                    echo "Sorry, there was an error uploading your file.";
                    }
                }

                
                $familyName = filter_input(INPUT_POST, "familyName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                // $photo = filter_input(INPUT_POST, "photo", FILTER_SANITIZE_URL);

                if($familyName && $name && $gender){
                    $ctrlMovieTheater->addProducer($familyName,$name,$gender,$birthday,$photo);
                }
            }
            // header("location:index.php?action=listProducers");
        break;


        // form for genres 
        case "genreFormPage": require "view/genre/addGenre.php"; break;

        // add genres in db
        case "addGenre":
            require "view/genre/addGenre.php";

            if(isset($_POST['submit'])){
                $genreName = $_POST['genreName'];

                $genreName = filter_input(INPUT_POST,"genreName",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($genreName){
                    $ctrlMovieTheater->addGenre($genreName);
                }
            }
            header("location:index.php?action=listGenres");
        break;


        // role form
        case "roleFormPage" : require "view/role/addRole.php"; break;
        
        // add role to db
        case "addRole" : 

            if(isset($_POST['submit'])){
                $roleName = $_POST['roleName'];

                $roleName = filter_input(INPUT_POST,"roleName",FILTER_SANITIZE_SPECIAL_CHARS);

                if($roleName){
                    $ctrlMovieTheater->addRole($roleName);
                }
            }
        
        break;


        // movie form page and get the producer in options
        case "MovieFormPage": $ctrlMovieTheater->addMovieProducer();break; 
        
        // add movie to db
        case "addMovie":
            $target_dir = "public/upload/"; //directory of where the file is going to be
            $target_file = $target_dir . basename(uniqid().$_FILES["poster"]["name"]); //specifies the path of the img that gonna be uploaded
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // holds the file extension

            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $releaseDate = $_POST['releaseDate'];
                $runningTime = $_POST['runningTime'];
                $synopsis = $_POST['synopsis'];
                // $poster = $_POST['poster'];
                $idProducer = $_POST['idProducer'];
                $idGenre = $_POST['idGenre'];
                
                $poster = $target_file; //instance the $target_file variable to the poster in order to insert it in db  

                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["poster"]["tmp_name"]);
                if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
                } else {
                echo "File is not an image.";
                $uploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["poster"]["size"] > 200000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename($_FILES["poster"]["name"])). " has been uploaded.";
                    } else {
                    echo "Sorry, there was an error uploading your file.";
                    }
                }


                $title = filter_input(INPUT_POST,"title",FILTER_SANITIZE_SPECIAL_CHARS);
                $runningTime = filter_input(INPUT_POST,"runningTime",FILTER_SANITIZE_NUMBER_INT);
                $synopsis = filter_input(INPUT_POST,"synopsis",FILTER_SANITIZE_NUMBER_FLOAT);
                // $poster = filter_input(INPUT_POST,"poster",FILTER_SANITIZE_URL);

                if($title && $runningTime && $synopsis){
                    $ctrlMovieTheater->addMovie($title,$releaseDate,$runningTime,$synopsis,$poster,$idProducer,$idGenre);

                }
                 
            }
            header("location:index.php?action=listFilms");
        break;


        // movieCast form page for one movie 
        case "movieCastForm": $ctrlMovieTheater->movieCastForm($id); break;

        // add movieCast to db and write it in movieDetail
        case "addMovieCast": 
            if(isset($_POST['submit'])){

                // get the idMovie from the action form
                $idMovie = $_GET['idMovie'];
                $idActor = $_POST['idActor'];
                $idRole = $_POST['idRole'];

                $ctrlMovieTheater->addMovieCast($idMovie,$idActor, $idRole); 
            }
            header("location:index.php?action=listFilms");  

        break;

        case "homePage" : $ctrlMovieTheater->homePage(); break;


        // WITHOUT AJAX
        // case "search" : 
        //     if(isset($_POST['submit'])){
        //         $title = $_POST['search'];

        //         $title = filter_input(INPUT_POST, "search", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        //         if($title){
        //             $ctrlMovieTheater->search($title);
        //         }
        //     }
        
        // break;

        // WITH AJAX
        case "liveSearch" :
            if (isset($_POST['s'])) {
                
                $title = $_POST['s'];
    
                $ctrlMovieTheater->liveSearch($title);
            }
        break;
    }
} else{
    $ctrlMovieTheater->homePage();
}