<?php ob_start();?>

<section class="movieDesc">
    
    <?php 

        $movie = $stmt->fetch();
    ?>

    <figure>
        <img src="<?=$movie['poster']?>" alt="moviePoster">
    </figure>
    <div class="descrition">
        <h1><?=$movie['title']?></h1>
        <p>release date : <?=$movie['releaseDate']?></p>
        <p>Running time : <?=$movie['RunningTime']?></p>
        <p>Producer : <a href="index.php?action=producerDetail&id=<?=$movie['idProducer']?>"><?=$movie['familyName']?> <?=$movie['NAME']?></a></p>
        <p>Genre : <a href="index.php?action=genreDetail&id=<?=$movie['idGenre']?>"><?=$movie['genreName']?></a></p>


    </div>
</section>

<?php
$title = "movie detail";
$secondTitle = "Movie Description";
$content = ob_get_clean();
require "view/template.php";