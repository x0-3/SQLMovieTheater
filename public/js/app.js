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