<?php ob_start(); ?>



    
<form action="index.php?action=addActor" method="post" enctype="multipart/form-data">

    <p>
        <label for="FamilyName">Enter the lastname :</label>
        <input type="text" name="familyName" id="FamilyName" placeholder="lastName">
    
    </p>

    <p>
        <label for="Name">Enter the Name :</label>
        <input type="text" name="name" id="Name" placeholder="Name">
    </p>

    <p>
        <label for="gender">Enter the gender :</label>
        <input type="text" name="gender" id="gender" placeholder="Gender">
    </p>
    
    <p>
        <label for="birthday">Enter the birthday :</label>
        <input type="date" name="birthday" id="birthday" >
    </p>

    <p>
        <label for="photo">Enter the photo :</label>
        <input type="file" name="photo" id="photo" required>
    </p>

    <!-- <p>
        <label for="photo">Enter the photo :</label>
        <input type="url" name="photo" id="photo" placeholder="https://exemple.com">
    </p> -->

    <p>
        <input type="submit" id="submitButton" name="submit" value="Add actor">
    </p>
</form>

<?php 
$title = "actor Form";
$secondTitle = "add an actor";
$content = ob_get_clean();
require "view/template.php";