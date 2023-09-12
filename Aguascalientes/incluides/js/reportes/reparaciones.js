var fecha = new Date();
var rechazo = document.getElementById("fecha_rechazo").value;
var reagendado = document.getElementById("fecha_reagendado").value;
if (!rechazo) {
    rechazo = fecha.toJSON().slice(0, 10);
}

if (!reagendado) {
    reagendado = fecha.toJSON().slice(0, 10);
}

$(document).ready(function() {
    console.log("entro lectura");

    var tipo_status = document.getElementById("status").value;

    console.log(tipo_status);

    if (tipo_status == 2 || tipo_status == 3) {
        document.getElementById("rep_tecnico").style.display = "block";
        document.getElementById("rechazo").style.display = "block";
    }
});

function enviar(){
    toastr.success('Modificando reporte!');
    $("#status").prop("disabled", false);
    $("#fecha_asignacion").prop("disabled", false);
    $("#fecha_acudir").prop("disabled", false);
    $("#problema_encontrado").prop("disabled", false);
    $("#solucion").prop("disabled", false);
    $("#problema_encontrado_2").prop("disabled", false);
    $("#segunda_solucion").prop("disabled", false);
    $("#formo").submit();
}