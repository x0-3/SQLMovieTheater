<?php

// calls folder in order

function chargerClasse($classe){
    require $classe . '.class.php';
}
spl_autoload_register('chargerClasse'); 


// the role for Batman
$actor1= new Actor("Keaton","Michael","male","05-09-1951");
$actor2= new Actor("Kilmer","Val","male","31-12-1959");
$actor3= new Actor("Clooney","George","male","06-05-1961");

$role1= new Role("Batman");

$genre1= new Genre("Action");

$producer1 = new Producer("Reeves","Matt","male","02-12-1945");

$movie1 = new Movie("Batman 1","07-04-1915","2h 55m","synopsis","poster",$genre1,$producer1);
$movie2 = new Movie("Batman 2","07-04-1915","2h 55m","synopsis","poster",$genre1,$producer1);
$movie3 = new Movie("Batman 3","07-04-1915","2h 55m","synopsis","poster",$genre1,$producer1);

$movieCast1 = new MovieCast($movie1,$actor1,$role1);
$movieCast2 = new MovieCast($movie2,$actor2,$role1);
$movieCast3 = new MovieCast($movie3,$actor3,$role1);



// settings for star wars
$actor4= new Actor("Ford","Harrison","male","13-07-1942");
$actor5= new Actor("Hamill","Mark","male","06-05-1961");

$role2= new Role("Han Solo");
$role3= new Role("Luke Skywalker");

$genre2= new Genre("Sci-fi");

$producer2 = new Producer("George","Lucas","male","02-12-1945");

$movie4 = new Movie("Star Wars Episode IV","19-08-1977","2h 1m","synopsis","poster",$genre2,$producer2);

$movieCast4 = new MovieCast($movie4,$actor4,$role2);
$movieCast5 = new MovieCast($movie4,$actor5,$role3);



// blade runner
$actor7= new Actor("Hauer","Rutger","male","23-01-1944");

$role4= new Role("Rick Deckard");
$role5= new Role("Roy Batty");

$producer3 = new Producer("Deeley","Michael","male","06-08-1932");

$movie5 = new Movie("Blade Runner","15-09-1982","1h 57m","synopsis","poster",$genre2,$producer3);

$movieCast6 = new MovieCast($movie5,$actor4,$role4);
$movieCast7 = new MovieCast($movie5,$actor7,$role5);



// The italian job
$actor8= new Actor("Statham","Jason","male","26-07-1967");
$actor9= new Actor("Wahlberg","Mark","male","05-06-1971");
$actor10= new Actor("Theron","Charlize","female","07-08-1975");

$role6= new Role("Handsome Rob");
$role7= new Role("Charlie Croker");
$role8= new Role("Stella Bridger");

$movie6 = new Movie("The italian job","17-08-2003","1h 51m","synopsis","poster",$genre1,$producer3);

$movieCast8 = new MovieCast($movie6,$actor8,$role6);
$movieCast9 = new MovieCast($movie6,$actor9,$role7);
$movieCast10 = new MovieCast($movie6,$actor10,$role8);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.21/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
<body>

    <?php
    // list of actors that played the same role
    echo "<h1 class='uk-heading-divider uk-text-center uk-text-bold'>". $role1 ."</h1>";
    echo $role1->showMovieCast();
 


    // list of a movie casting 
    echo "<h1 class='uk-heading-divider uk-text-center uk-text-bold'> Movie casting for ". $movie4->getTitle() ."</h1>";
    echo $movie4->showMovieCast();  
    


    // list movies by genres
    echo "<h1 class='uk-heading-divider uk-text-center uk-text-bold'> $genre2 </h1>";
    echo "<h4 class=''> Number of movies stored in that genre is : <span class='uk-text-bolder'>". $genre2->numberMovies() ."</span></h4>" ;
    echo $genre2->showMovies();

    

    // list of movies by actors
    // echo $actor4->showMovieCast();
    echo "<h1 class='uk-heading-divider uk-text-center uk-text-bold'> Filmography of ". $actor4->getName()." ". $actor4->getFamilyName() ." </h1>";
    echo "<h3 class='uk-text-bold uk-heading-bullet'>".$movieCast4->getMovie()->getTitle()."</h3>";
    echo $movieCast4->getRole();

    echo "<h3 class='uk-text-bold uk-heading-bullet'>". $movieCast6->getMovie()->getTitle()."</h3>";
    echo $movieCast6->getRole();

 
    
    // list of movies by producer
    echo "<h1 class='uk-heading-divider uk-text-center uk-text-bold'> Filmography of ". $producer3->getName()." ". $producer3->getFamilyName() ." </h1>";
    echo $producer3->showMovies();

    ?>

</body>
</html>