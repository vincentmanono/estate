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

$("#send").click(e=>{
    var canvas = document.getElementById('resetSign')
    var img = canvas.toDataURL("image/png") ;

console.log(img);
})

   
});