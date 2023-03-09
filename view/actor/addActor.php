<?php ob_start(); ?>




<?php 
$title = "actor detail";
$secondTitle = "actor Description";
$content = ob_get_clean();
require "view/template.php";