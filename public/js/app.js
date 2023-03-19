/************************************************************************ IMDb API ************************************************************/

// FIXME: find a way to get multiple movie trailer

var settings = {
    "url": "https://imdb-api.com/en/API/Trailer/k_7qbq89hm/tt8760708",
    "method": "GET",
    "timeout": 0,
};
  
$.ajax(settings).done(function (response) {
    console.log(response);

    const trailer = response.linkEmbed;
    const movie = `<iframe src="${trailer}"></iframe>`;

    document.querySelector('.trailer').innerHTML += movie;
});



/************************************************************************ LIVE SEARCH *********************************************************/

// waits for the document to be fully loaded and ready to be manipulated, and then executes the function
$(document).ready(function(){

    function fetchData(){
        // gets the value of an input field with ID "input" and assigns it to a variable
        var s = $("#input").val();
        
        // if the value of " s " is an empty string,
        if(s == ''){

            // it hides an element with ID "searchResult" by setting its display to "none".
            $('#searchResult').css('display','none');
        }

        // uses jQuery post() method to send an AJAX request to a PHP script named "index.php" with a "liveSearch" action
        $.post("index.php?action=liveSearch", {
            // along with the value of s
            s:s
        }, 

        //  The response from the script is handled by an anonymous function that checks if the data returned is not "not found"
        function(data, status){
            if (data != "not found") {

                // displays the element with ID "searchResult" by setting its display to "block"
                $('#searchResult').css('display','block');

                // sets its HTML content to the data returned
                $('#searchResult').html(data);
            }
        });
    }

    //  event listener to an input field with ID "input", which triggers the fetchData() function whenever the input field is changed
    $('#input').on('input', fetchData);

    // attached event listener to the body element, which triggers an anonymous function whenever the body is clicked
    $('body').on('click', ()=>{

        // hides the element with ID "searchResult" by setting its display to "none"
        $('#searchResult').css('display','none');
    });

    // attached event listener to an input field with ID "input", which triggers the fetchData() function whenever the input field is clicked
    $('#input').on('click', fetchData);

});



/************************************************************************ LEAFLET API *********************************************************/

// display the map
var map = L.map('map').setView([38.60053, -121.44885], 16);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


// display the marker in a specific location
var marker = L.marker([38.60053, -121.44885]).addTo(map);
marker.bindPopup("<b>San Luis Obispo, California(CA), 93401</b> </br>2634 Leisure Lane").openPopup(); // bind a pop up to the marker and display a message 


// shows a popup with the coordinate of the location clicked (latitude, longitude) 
var popup = L.popup();

function onMapClick(e) {
    popup.setLatLng(e.latlng).setContent("You clicked the map at " + e.latlng.toString()).openOn(map);
}

map.on('click', onMapClick);
