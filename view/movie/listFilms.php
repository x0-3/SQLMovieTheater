<?php ob_start();?>


<section class="FeaturedMovies">
    <?php foreach($stmt->fetchAll() as $movie){?>

    <a href="index.php?action=movieDetail&id=<?=$movie['idMovie']?>">
        <figure>
            <img src="<?=$movie['poster']?>" alt="movie Poster">

                
            <figcaption>
                
                <p><strong><?=$movie['title']?></strong></p>
                <p><?=$movie['releaseDay']?></p>
                
            </figcaption>
                
        </figure>
    </a>
        
    <?php } ?>
</section>
    
<?php
$title = "list movies";
$secondTitle = "Featured Movies";
$content = ob_get_clean();
require "view/template.php";