$(document).ready(event=>{
   
    $("#rent").change(event=>{
        var rentAmount = $("#rent").val();
        var serviceAMount = rentAmount * 0.01 ;
        $("#service_charge").val(serviceAMount)
    })

})