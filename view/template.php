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
    <script src="https://kit.fontawesome.com/adba52364d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
     
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/style.css.map">
    <title><?= $title ?></title>
</head>
<body>

    <header>
        <nav>
            
            <figure>
                <a href="index.php?action=homePage">
                    <img src="public/img/logo.png" alt="logo">
                </a>
            </figure>
            <ul>
                <li><a href="index.php?action=listFilms">MOVIE</a></li>
                <li><a href="index.php?action=listActors">ACTORS</a></li>
                <li><a href="index.php?action=listRoles">ROLES</a></li>
                <li><a href="index.php?action=listProducers">PRODUCERS</a></li>
                <li><a href="index.php?action=listGenres">GENRES</a></li>
                
                <div id="dropdown">
                    <button>ADD</button>

                    <div id="dropdownContent">
                        <a href="index.php?action=addProducerPage">ADD PRODUCERS</a>
                        <a href="index.php?action=genreFormPage">ADD GENRES</a>
                        <a href="index.php?action=MovieFormPage">ADD MOVIES</a>
                        <a href="index.php?action=addActorPage">ADD ACTORS</a>
                        <a href="index.php?action=roleFormPage">ADD ROLES</a>
                    </div>
                </div>
            </ul>
        </nav>

        <!-- WITHOUT AJAX -->
        <!-- <form action="index.php?action=search" method="post">

            <input type="search" name="search" id="search" placeholder="search..." autocomplete="on">
            
            <input type="submit" id="submitButton" name="submit" value="search">

            <i class="fa-solid fa-magnifying-glass"></i>
            
        </form> -->

        <!-- // AJAX -->
        <form action="#">
            <div class="s-box">
                <input type="text" name="s-input" id="input" autocomplete="off">
                <i class="fa-solid fa-magnifying-glass"></i>

                
            </div>
            <ul id="searchResult" class="searchResult"></ul>

        </form>
        
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
                <li><a href="index.php?action=siteMap">Sitemap</a></li>
            </ul>
        </div>

        <div class="socials">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>  
        </div>
    </footer>
    
    <script src="public/js/app.js"></script>

</body>
</html>

