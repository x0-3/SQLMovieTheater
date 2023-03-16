<!-- WITHOUT AJAX -->
<?php ob_start();?>


<section class="FeaturedMovies">
    <?php foreach($stmt->fetchAll() as $movieSearch){?>

    <a href="index.php?action=movieDetail&id=<?=$movieSearch['idMovie']?>">
        <figure>
            <img src="<?=$movieSearch['poster']?>" alt="movie Poster">

                
            <figcaption>
                <p><strong><?=$movieSearch['title']?></strong></p>                
            </figcaption>
                
        </figure>
    </a>
        
    <?php } ?>
</section>



<?php 
$title = "search Page";
$secondTitle = "looking for a movie ?";
$content = ob_get_clean();
require "view/template.php";