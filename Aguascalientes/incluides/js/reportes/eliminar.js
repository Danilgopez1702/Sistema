function eliminar(){
    var numero = $("#numero").val();
    $("#eliminar").attr("disabled", true);
    toastr.info('Cerrando Reparaciones...');
    console.log(numero)
    $.ajax({
        url: "../../../base_datos/eliminar/eliminar_reporte.php",
        type: 'POST',
        data: {
            'numero': numero
        }
    }).done(function (data) {
        if (data == 'error2') {
            toastr.error('Cliente No Encontrado.');
            $("#eliminar").prop("disabled", false);
        } else {
            toastr.success('Reportes antiguos cerrados.');
            $("#eliminar").prop("disabled", false);
        }
    })
}