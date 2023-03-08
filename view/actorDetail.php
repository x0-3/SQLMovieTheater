<?php ob_start(); ?>
<?php 
$actor=$stmt->fetch();
?>

<h2><?=$actor['familyName']?><?=$actor['NAME']?></h2>
<p><?=$actor['gender']?></p>
<p><?=$actor['birthday']?></p>
<p><?=$actor['age']?></p>
<p><?=$actor['photo']?></p>

<?php 
$title = "actor detail";
$secondTitle = "actor Description";
$content = ob_get_clean();
require "view/template.php";