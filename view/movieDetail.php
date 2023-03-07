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
        <p>Producer : <?=$movie['familyName']?> <?=$movie['NAME']?></p>
        <p>Genre : <?=$movie['genreName']?></p>

    </div>


        


    


</section>

<?php
$title = "list movies";
$secondTitle = "Movie Description";
$content = ob_get_clean();
require "view/template.php";