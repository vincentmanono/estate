$(document).ready(function()
{
    $('#myCanvas').sign({
        resetButton: $('#resetSign'),
        lineWidth: 5,
        height:300,
        width:400
    });

   
});

$(document).ready(function()
{

$("#signform").submit(e=>{
    // event.preventDefault()
    var canvas =  document.getElementById("myCanvas") ;
    var img = canvas.toDataURL("image/png") ;
    var sign = $("#signature64").val(img).css('display','none') ;


})

   
});