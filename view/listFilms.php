<?php ob_start();?>

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

                <tr>
                    <td><?= $movie["title"]?></td>
                    <td><?= $movie["releaseDay"]?></td>
                </tr>
                
                <?php
            }
        ?>
    </tbody>
</table>

<?php
$title = "list movies";
$secondTitle = "Featured Movies";
$content = ob_get_clean();
require "view/template.php";