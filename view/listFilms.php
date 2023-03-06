<?php ob_start();?>

<p class="uk-label uk-label-warning">They're <? $stmt->rowCount()?> movies</p>

<table class="uk-table uk-table-striped">
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