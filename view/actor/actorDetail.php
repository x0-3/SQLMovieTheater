<?php ob_start(); ?>

<?php $actor=$stmt->fetch();?>

<section id="actorDetailSection">
    <figure>
        <img src="<?=$actor['photo']?>" alt="actor photo">
    </figure>

    <div class="actorDescrition">
        <h2><?=$actor['familyName']?> <?=$actor['NAME']?></h2>
        <p>gender : <?=$actor['gender']?></p>
        <p>birthday : <?=$actor['birthday']?></p>
        <p><?=$actor['age']?> Y/o</p>
    </div>
</section>

<?php 
$title = "actor detail";
$secondTitle = "actor Description";
$content = ob_get_clean();
require "view/template.php";