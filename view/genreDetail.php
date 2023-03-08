<?php ob_start(); ?>

<?php 
$genre = $stmt->fetch();
?>

<h2><?=$genre['genreName']?></h2>



<?php 
$title = "genre detail";
$secondTitle = "Genre Description";
$content = ob_get_clean();
require "view/template.php";

