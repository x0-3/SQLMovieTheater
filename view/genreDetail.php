<?php ob_start(); ?>



<section id="genreDetailSection">
    <!-- fetch all the movies for that genre -->
    <?php 
    foreach($stmt2->fetchAll() as $movieGenre){ ?>

        <a href="index.php?action=movieDetail&id=<?=$movieGenre['idMovie']?>">

            <figure>
                <img src="<?=$movieGenre['poster']?>" alt="movie poster">
                
                <figcaption>
                    <p><?=$movieGenre['title']?></p>
                    <p><?=$movieGenre['releaseDate']?></p>
                    <p><?=$movieGenre['RunningTime']?></p>
                </figcaption>
            </figure>
            
        </a>
    
    <?php }?>
</section>

<!-- fetch the name of genres -->
<?php 
$genre = $stmt->fetch();
?>

<?php 
$title = "genre detail";
$secondTitle = $genre['genreName'];
$content = ob_get_clean();
require "view/template.php";

