<?php ob_start();?>

<?php
$producer = $stmt->fetch();
?>

<section id="producerDetailSection">

    <figure>
        <img src="<?=$producer['photo']?>" alt="producers photo">
    </figure>

    <div class="description">
        <h3><?=$producer['NAME'] . " " . $producer['familyName']?></h3>
        <p>gender : <?=$producer['gender']?></p>
        <p>birthday : <?=$producer['birthday']?></p>
        <p><?=$producer['age']?> Y/o</p>
    </div>

</section>

<?php
$title = "Detail Producer";
$secondTitle = "Producer";
$content = ob_get_clean();
require "view/template.php";