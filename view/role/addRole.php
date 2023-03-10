<?php ob_start(); ?>


<form action="index.php?action=addRole" method="post">

    <p>
        <label for="roleName">Enter the role played :</label>
        <input type="text" name="roleName" id="roleName" placeholder="Role">
    
    </p>

    <p>
        <input type="submit" id="submitButton" name="submit" value="Add role">
    </p>
</form>


<?php 
$title = "Role Form";
$secondTitle = "add a role";
$content = ob_get_clean();
require "view/template.php";