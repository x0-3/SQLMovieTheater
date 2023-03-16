$(document).ready(function(){

    function fetchData(){
        var s = $("#input").val();
        
        if(s == ''){
            $('#searchResult').css('display','none');
        }
        $.post("index.php?action=liveSearch", {
            s:s
        }, 
        function(data, status){
            if (data != "not found") {
                $('#searchResult').css('display','block');
                $('#searchResult').html(data);
            }
        });
    }
    $('#input').on('input', fetchData);

    $('body').on('click', ()=>{
        $('#searchResult').css('display','none');
    });

    $('#input').on('click', fetchData);

    
});