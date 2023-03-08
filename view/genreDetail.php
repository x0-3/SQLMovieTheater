<?php ob_start(); ?>

<?php 
$genre = $stmt->fetch();
?>

<section class="genreDetailSection">

    <h2><?=$genre['genreName']?></h2>
    
    <?php 
    foreach($stmt2->fetchAll() as $movieGenre){ ?>
        <figure>
            <img src="<?=$movieGenre['poster']?>" alt="movie poster">
        </figure>

        <p><?=$movieGenre['title']?></p>
        <p><?=$movieGenre['releaseDate']?></p>
        <p><?=$movieGenre['RunningTime']?></p>
    
    <?php }?>
</section>
    
<?php 
$title = "genre detail";
$secondTitle = "Genre Description";
$content = ob_get_clean();
require "view/template.php";

