<?php ob_start();
$movieCast = $stmt->fetch();?>

<!-- in order to retrieve the id it need to be in the action link -->
<form action="index.php?action=addMovieCast&idMovie=<?=$movieCast['idMovie']?>" method="post">
    
    <p>
        <?=$movieCast['title']?>
    </p>

    <p>
        <label for="idActor">choose an actor :</label>

        <select name="idActor" id="idActor">

            <?php foreach($stmt2->fetchAll() as $actor){?>
            
                <option value="<?=$actor['idActor']?>"><?=$actor['name'] . " " . $actor['familyName']?></option>

            <?php }?>

        </select>
    
    </p>

    <p>
        <label for="idRole">choose a role :</label>

        <select name="idRole" id="idRole">

            <?php foreach($stmt3->fetchAll() as $roles){?>
            
                <option value="<?=$roles['idRole']?>"><?=$roles['roleName']?></option>

            <?php }?>

        </select>
    
    </p>
    


    <p>
        <input type="submit" id="submitButton" name="submit" value="Add cast">
    </p>
</form>

<?php 
$title = "movieCast Form";
$secondTitle = "movieCast";
$content = ob_get_clean();
require "view/template.php";