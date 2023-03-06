<?php ob_start();?>

<p>They're <? $stmt->rowCount()?></p>

<table>
    <thead>
        <tr>
            <th>title</th>
            <th>release day</th>
        </tr>
    </thead>

    <tbody>
        <?php 

            foreach($stmt->fetchAll() as $movie){?>

            <tr><?= $movie["title"]?></tr>
            <tr><?= $movie["releaseDateFrance"]?></tr>
            
            <?php
            }
        ?>
    </tbody>
</table>

<?php
$title = "list of movies";
$secondTitle = "List of movies";
$content = ob_get_clean();
require "view/template.php";