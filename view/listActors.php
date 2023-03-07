<?php ob_start() ?>


<section id="listActors">
<?php
foreach($stmt->fetchAll() as $actors){ ?>

    <div class="actorInfo">
        <a href=""><h3><?=$actors['NAME']?><?=$actors['familyName']?></h3></a>
        <p><?=$actors['gender']?></p>
        <p><?=$actors['birthday']?></p>
        <p><?=$actors['age']?></p>
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