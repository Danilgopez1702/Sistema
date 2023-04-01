$(function() {
    $("#numradio").on("input", function() {
        var numradio = $("#numradio").val().length;
        if(numradio == 12){
            $("#numradio").prop('disabled', true);
//aqui pides los datos de inventario add antena mediante tipo post
            $.ajax({
                url: "../../../base_datos/ajax/inventario/add/inventario_add_antena.php",
                type: 'POST',
//estos son los datos que pides
                data: {
                    'numradio' : $("#numradio").val(),
                    'fallo' : $("#fallo").val()
                }
// indica que ya se conecto exitosamente
            }).done(function(data) {
//se manda una alerta (temporalmente) de que esta existiendo
                if(data == 'error'){


                        toastr.error('El equipo ' + $("#numradio").val() + ' ya está en el inventario.'); 


                    $("#numradio").val('');
                    $("#numradio").focus();
                    $("#numradio").prop('disabled', false);

//se mando una alerta (temporalmente)  de que fue cargada exitosamente
                } else {

                    toastr.success('Equipo ' + $("#numradio").val() + ' agregado a la base de datos.'); 


                    $("#numradio").val('');
                    $("#numradio").focus();
                    $("#numradio").prop('disabled', false);

                }
//se mando una alerta (temporalmente) de que fallo la conexion con ajax
            }).fail(function() {
                toastr.error('Ocurrió un error, vuelva a intentarlo.'); 
                
                $("#numradio").val('');
                $("#numradio").focus();
                $("#numradio").prop('disabled', false);

            });
        }





    });
});