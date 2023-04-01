$(function() {
    $("#numbandera").on("input", function() {
        var numbandera = $("#numbandera").val().length;
        if(numbandera == 9){
            $("#numbandera").prop('disabled', true);
//aqui pides los datos de inventario add antena mediante tipo post
            $.ajax({
                url: "../../../base_datos/ajax/inventario/add/inventario_add_bandera.php",
                type: 'POST',
//estos son los datos que pides
                data: {
                    'numbandera' : $("#numbandera").val(),
                    'fallo' : $("#fallo").val()
                }
// indica que ya se conecto exitosamente
            }).done(function(data) {
//se manda una alerta (temporalmente) de que esta existiendo
                if(data == 'error'){


                        toastr.error('El equipo ' + $("#numbandera").val() + ' ya está en el inventario.'); 


                    $("#numbandera").val('');
                    $("#numbandera").focus();
                    $("#numbandera").prop('disabled', false);

//se mando una alerta (temporalmente)  de que fue cargada exitosamente
                } else {

                    toastr.success('Equipo ' + $("#numbandera").val() + ' agregado a la base de datos.'); 


                    $("#numbandera").val('');
                    $("#numbandera").focus();
                    $("#numbandera").prop('disabled', false);

                }
//se mando una alerta (temporalmente) de que fallo la conexion con ajax
            }).fail(function() {
                toastr.error('Ocurrió un error, vuelva a intentarlo.'); 
                
                $("#numbandera").val('');
                $("#numbandera").focus();
                $("#numbandera").prop('disabled', false);

            });
        }





    });
});