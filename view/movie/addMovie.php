<?php ob_start();?>

<form action="index.php?action=addMovie" method="post">

    <p>
        <label for="title">Enter the Movie title :</label>
        <input type="text" name="title" id="title" placeholder="Movie title" required>
    
    </p>

    <p>
        <label for="releaseDate">Enter the Release date :</label>
        <input type="date" name="releaseDate" id="releaseDate" required>
    </p>

    <p>
        <label for="runningTime">Enter the running time :</label>
        <input type="text" id="runningTime" name="runningTime" value="00:00" required>
    </p>

    <!-- FIXME: input format not correct -->
    <p>
        <label for="synopsis">Enter the synopsis :</label>
        <input type="number" name="synopsis" id="synopsis" step="0.1" required>
    </p>

    <p>
        <label for="poster">Enter the poster :</label>
        <input type="url" name="poster" id="poster" required>
    </p>


    <!-- FIXME: -->
    <p>
        <legend>choose a producer :</legend>
        
        <?php foreach($stmt->fetchAll() as $producer){?>
            
            <div class="producerRadio">
                <input type="radio" id="idProducer" name="idProducer" value="idProducer" checked required>
                <label for="idProducer"><?=$producer['name'].$producer['familyName']?></label>
            </div>
        <?php }?>
    </p>


    <p>
        <legend>choose the genres :</legend>
        
        <?php foreach($stmt2->fetchAll() as $genre){?>
            
            <div class="genreRadio">
                <input type="checkbox" id="genreName" name="genreName">
                <!-- <input type="radio" id="genreName" name="genreName" value="genreName"> -->
                <label for="genreName"><?=$genre['genreName']?></label>
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