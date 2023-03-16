<!-- // WITH AJAX -->
<?php


    foreach($stmt->fetchAll() as $result){ ?>
        <li><a href="index.php?action=movieDetail&id=<?=$result['idMovie']?>"><?=$result['title']?></a></li>
    
    <?php }

?>


