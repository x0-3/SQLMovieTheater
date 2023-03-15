<?php ob_start();?>


<section class="FeaturedMovies">
    <?php foreach($stmt->fetchAll() as $movies){?>

    <a href="index.php?action=movieDetail&id=<?=$movies['idMovie']?>">
        <figure>
            <img src="<?=$movies['poster']?>" alt="movie Poster">

                
            <figcaption>
                
                <p><strong><?=$movies['title']?></strong></p>
                <p><?=$movies['releaseDate']?></p>
                
            </figcaption>
                
        </figure>
    </a>
        
    <?php } ?>
</section>

<h1>Best Movie Rating</h1>
<section class="FeaturedMovies">
    <?php foreach($stmt2->fetchAll() as $rating){?>

    <a href="index.php?action=movieDetail&id=<?=$rating['idMovie']?>">
        <figure>
            <img src="<?=$rating['poster']?>" alt="movie Poster">

                
            <figcaption>
                
                <p><strong><?=$rating['title']?></strong></p>
                <p><?=$rating['releaseDate']?></p>
                <p><?=$rating['synopsis']?></p>
                
            </figcaption>
                
        </figure>
    </a>
        
    <?php } ?>
</section>

<?php 
$title = "Home";
$secondTitle = "Most recent releases";
$content = ob_get_clean();
require "view/template.php";