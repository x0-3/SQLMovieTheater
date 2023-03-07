<?php ob_start() ?>


<section class="genreSection">
<?php
foreach($stmt->fetchAll() as $genre){?>

    <a href="#"><h3><?=$genre['genreName']?></h3></a>


<?php }?>
</section>

<?php
$title = "list genres";
$secondTitle = "Featured genres";
$content = ob_get_clean();
require "view/template.php";


