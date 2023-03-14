<?php ob_start();?>

<form action="index.php?action=addMovie" method="post">

    <p>
        <label for="title"><strong>Enter the Movie title :</strong></label>
        <input type="text" name="title" id="title" placeholder="Movie title" required>
    
    </p>

    <p>
        <label for="releaseDate"><strong>Enter the Release date :</strong></label>
        <input type="date" name="releaseDate" id="releaseDate" required>
    </p>

    <p>
        <label for="runningTime"><strong>Enter the running time in sec:</strong></label>
        <input type="text" id="runningTime" name="runningTime" placeholder="12345" required>
    </p>


    <p>
        <label for="synopsis"><strong>Enter the synopsis :</strong></label>
        <input type="number" name="synopsis" id="synopsis" step="0.1" placeholder="4.3" required>
    </p>

    <p>
        <label for="poster"><strong>Enter the poster :</strong></label>
        <input type="url" name="poster" id="poster" placeholder="https://exemple.com" required>
    </p>


    <p>
        <legend><strong>choose a producer :</strong></legend>
        

        <?php foreach($stmt->fetchAll() as $producer){?>
            <div class="producerRadio">
                <input type="radio" id="idProducer" name="idProducer" value="<?=$producer['idProducer']?>" checked required>
                <label for="idProducer"><?=$producer['name']." ".$producer['familyName']?></label>
            </div>
        <?php }?>
    </p>


    <p>
        <legend><strong>choose the genres :</strong></legend>
        
        <?php foreach($stmt2->fetchAll() as $genre){?>
            
            <div class="genreRadio">
                <input type="checkbox" id="idGenre" name="idGenre" value="<?=$genre['idGenre']?>">
                <label for="idGenre"><?=$genre['genreName']?></label>
            </div>

        <?php }?>
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