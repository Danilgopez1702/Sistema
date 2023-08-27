function busqueda(){
    $("#buscar").prop("disabled", true);
    toastr.info('Arreglando...');
    $.ajax({
        url: "../../../mikrotik/boton_arreglar.php",
        type: 'POST',
        data: { 
            'id' : id
        }
    }).done(function(data) {
        if (data == 'error2') {
            toastr.error('Cliente No Encontrado.');
            $("#btn_refresh").prop("disabled", false);
        }else  {
            toastr.success('Cliente Arreglado.');
            $("#btn_refresh").prop("disabled", false);
        }
    })
}