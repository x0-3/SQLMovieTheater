<?php ob_start(); ?>


<form action="index.php?action=addGenre" method="post">

    <p>
        <label for="genreName">Enter the genre :</label>
        <input type="text" name="genreName" id="genreName" placeholder="genre">
    
    </p>

    <p>
        <input type="submit" id="submitButton" name="submit" value="Add genre">
    </p>
</form>


<?php 
$title = "genre Form";
$secondTitle = "add a genre";
$content = ob_get_clean();
require "view/template.php";