<?php ob_start() ?>


<section id="listActors">
<?php
foreach($stmt->fetchAll() as $actors){ ?>

    <div class="actorInfo">
        <a href="index.php?action=actorDetail&id=<?=$actors['idActor']?>"><h3><?=$actors['NAME']?> <?=$actors['familyName']?></h3></a>
        <p>gender : <?=$actors['gender']?></p>
        <p>birthday : <?=$actors['birthday']?></p>
        <p>age : <?=$actors['age']?> y/o</p>
    </div>

<?php
}
?>
</section>

<?php
$title = "list Actors";
$secondTitle = "Featured Actors";
$content = ob_get_clean();
require "view/template.php";