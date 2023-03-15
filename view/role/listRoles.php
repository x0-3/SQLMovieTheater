<?php ob_start(); ?>

<section id="RolesSection">
<?php
foreach($stmt->fetchAll() as $role){ ?>

    <div class="roleList">
        <a href="index.php?action=actorDetail&id=<?=$role['idActor']?>"><h3><?=$role['NAME']." ".$role['familyName']?></h3></a>
        <p>Role : <?=$role['roleName']?></p>
        <p>Movie : <?=$role['title']?></p>
        <p>Date : <?=$role['releaseDate']?></p>
        <br>
    </div>

<?php
}
?>
</section>

<?php
$title = "list Roles";
$secondTitle = "Featured Roles";
$content = ob_get_clean();
require "view/template.php";