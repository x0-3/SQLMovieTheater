<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/style.css.map">
    <title><?= $title ?></title>
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="index.php?action=listFilms">MOVIE</a></li>
                <li><a href="index.php?action=listActors">ACTORS</a></li>
                <li><a href="index.php?action=listRoles">ROLES</a></li>
                <li><a href="index.php?action=listProducers">PRODUCERS</a></li>
                <li><a href="index.php?action=listGenres">GENRES</a></li>
                
                <div id="dropdown">
                    <button>ADD</button>

                    <div id="dropdownContent">
                        <a href="#">ADD MOVIES</a>
                        <a href="index.php?action=addActorPage">ADD ACTORS</a>
                        <a href="#">ADD ROLES</a>
                        <a href="index.php?action=addProducerPage">ADD PRODUCERS</a>
                        <a href="index.php?action=genreFormPage">ADD GENRES</a>
                    </div>
                </div>
            </ul>
        </nav>

        <a href="#">SEARCH</a> 
    </header>
    

    <div id="wrapper">
        <main>
            <div id="contenu">
                <h1><?= $secondTitle ?></h1>
                <?=$content?>
                
            </div>
        </main>
    </div>
    

    <footer>
        <div class="infos">
            <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Investors</a></li>
                <li><a href="#">Legal</a></li>
                <li><a href="#">Licensing</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Sitemap</a></li>
            </ul>
        </div>

        <div class="socials">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>  
        </div>
    </footer>


</body>
</html>

