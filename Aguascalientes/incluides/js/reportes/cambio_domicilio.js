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
/*
    var problema = $("#problema_encontrado").val();
    var segunda = $("#segunda_solucion").val();

    if(problema != "" || problema != " "){
        document.getElementById("rep_tecnico").style.visibility = "visible";
        document.getElementById("rechazo").style.visibility = "visible";
        document.getElementById("problema_encontrado").required = true;
        document.getElementById("solucion").required = true;
        document.getElementById("fecha_rechazo").required = true;
        document.getElementById("razon_rechazo").required = true;
        document.getElementById("fecha_reagendado").required = true;
        document.getElementById("2problema_encontrado").required = true;
        document.getElementById("segunda_solucion").required = false;
        document.getElementById("fecha_2visita").required = false;
    }
    if(segunda != "" || segunda != " "){
        document.getElementById("segunda_tecnico").style.visibility = "visible";
        document.getElementById("segunda_solucion").required = true;
        document.getElementById("fecha_2visita").required = true;
    }else{
        document.getElementById("problema_encontrado").required = false;
        document.getElementById("solucion").required = false;
        document.getElementById("fecha_rechazo").required = false;
        document.getElementById("razon_rechazo").required = false;
        document.getElementById("fecha_reagendado").required = false;
        document.getElementById("2problema_encontrado").required = false;
        document.getElementById("segunda_solucion").required = false;
        document.getElementById("fecha_2visita").required = false;
        

    }

    */
});