<?php ob_start(); ?>

<section class="leafletMap">
    <div id="map"></div>

</section>


<?php
$title = "Site Map";
$secondTitle = "Site Map";
$content = ob_get_clean();
require "view/template.php";