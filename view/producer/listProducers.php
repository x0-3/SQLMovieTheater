<?php ob_start();?>



<section class="producerSection">
<?php
foreach ($stmt->fetchAll() as $producer){ ?>

    <div class="producerList">
        <a href="index.php?action=producerDetail&id=<?=$producer['idProducer']?>"> <h3><?= $producer['familyName'] ?> <?= $producer['name'] ?></h3> </a>
        <p>Movie : <?= $producer['title'] ?></p>
        <p>date : <?= $producer['releaseDate'] ?></p>

        <br>

    </div>


<?php }
?>
</section>

<?php
$title = "producers";
$secondTitle = "Featured producers";
$content = ob_get_clean();
require "view/template.php";