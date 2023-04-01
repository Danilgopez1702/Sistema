var fecha = new Date();
document.getElementById("fecha_rechazo").value = fecha.toJSON().slice(0,10);
document.getElementById("fecha_2visita").value = fecha.toJSON().slice(0,10);

$(document).ready(function(){ 
    console.log("entro lectura");

    var tipo_status = document.getElementById("status").value;

    console.log(tipo_status);

    if(tipo_status == 2 || tipo_status == 3){
        document.getElementById("rep_tecnico").style.display = "block";
        document.getElementById("rechazo").style.display = "block";
        
    }

});