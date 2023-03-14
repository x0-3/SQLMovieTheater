<?php ob_start();?>

<section class="movieDesc">
    
    <!-- movie descrition -->
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
        
        <!-- liste of genres by the selected movie -->
        <div class="movieGenre">
            <p>Genre : </p>
            <?php
                foreach($stmt3->fetchAll() as $genre){ ?>
                    <p> <a href="index.php?action=genreDetail&id=<?=$genre['idGenre']?>"><?=$genre['genreName']?></a></p>
                <?php }
            ?>
            <br>
        </div>
        
        <!-- fetch the role played in the movie -->
        <div class="movieCast">
            <div class="movieCastTitle">
                <p>moviecasts</p>
                <?php foreach($stmt->fetchAll() as $movieCast){ ?>
                    <a href="index.php?action=movieCastForm&id=<?=$movieCast['idMovie']?>">add moviecast</a>
                <?php } ?>
            </div>

            <?php
            foreach($stmt2->fetchAll() as $cast){?>
                <div class="moviecasts">
                    <p> <a href="index.php?action=actorDetail&id=<?=$cast['idActor']?>"><?=$cast['NAME']?> <?=$cast['familyName']?> </a>(<?=$cast['roleName']?>)</p>
                    <br>
                </div>
        
            <?php }?>
        </div>
    </div>

</section>

<?php
$title = "movie detail";
$secondTitle = "Movie Description";
$content = ob_get_clean();
require "view/template.php";