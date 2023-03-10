<?php ob_start();?>

<!-- FIXME: -->
<form action="index.php?action=addMovie" method="post">

    <p>
        <label for="title">Enter the Movie title :</label>
        <input type="text" name="title" id="title" placeholder="Movie title">
    
    </p>

    <p>
        <label for="releaseDate">Enter the Release date :</label>
        <input type="date" name="releaseDate" id="releaseDate" placeholder="Release date">
    </p>

    <p>
        <label for="runningTime">Enter the running time :</label>
        <input type="time" name="runningTime" id="runningTime" placeholder="Running time">
    </p>
    
    <p>
        <label for="synopsis">Enter the synopsis :</label>
        <input type="number" name="synopsis" id="synopsis" step=".1">
    </p>

    <p>
        <label for="poster">Enter the poster :</label>
        <input type="url" name="poster" id="poster" placeholder="https://exemple.com">
    </p>

    <p>
        <label for="producer">choose the producer :</label>

        <select name="producer" id="producer">
        <option value="">--Please choose an option--</option>

            <?php foreach($stmt->fetchAll() as $producer){ ?>
                <option value="<?=$producer['familyName']?>"><?=$producer['familyName']?></option>
            <?php }?>

        </select>

    </p>
    
    <p>
        <input type="submit" id="submitButton" name="submit" value="Add movie">
    </p>
</form>

<?php 
$title = "movie Form";
$secondTitle = "add a movie";
$content = ob_get_clean();
require "view/template.php";