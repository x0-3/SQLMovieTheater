<?php ob_start(); ?>

<section class="leafletMap">
    <div id="map"></div>

    <div class="contactInfo">
        <p><b>Street: </b>2634 Leisure Lane</p>
        <p><b>City, State, Zip: </b>San Luis Obispo, California(CA), 93401</p>
        <p><b>Phone Number: </b>424-273-4599</p>
    </div>

</section>


<?php
$title = "Site Map";
$secondTitle = "Contact Info";
$content = ob_get_clean();
require "view/template.php";