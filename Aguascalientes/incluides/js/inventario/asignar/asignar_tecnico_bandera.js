$(function() {
    $("#numbandera").on("input", function() {
        var numbandera = $("#numbandera").val().length;
        var instalador_bandera = $("#instalador_bandera").val();
        if(numbandera == 9 && instalador_bandera != 999999999999 ){
            console.log (instalador_bandera);
            $("#numbandera").prop('disabled', true);
            $("#instalador_bandera").prop('disabled', true);
        

//aqui pides los datos de inventario asignar antena mediante tipo post
            $.ajax({
                url: "../../../base_datos/ajax/inventario/asignar/inventario_tecnico_bandera.php",
                type: 'POST',
//estos son los datos que pides
                data: {
                    'numbandera' : $("#numbandera").val(),
                    'instalador_bandera' : $("#instalador_bandera").val()
                }
// indica que ya se conecto exitosamente
            }).done(function(data) {
//se manda una alerta (temporalmente) de que esta existiendo
                if(data == 'error'){
                        toastr.error('El equipo ' + $("#numbandera").val() + ' ya tiene un tecnico asignado' ); 
                    $("#numbandera").val('');
                    $("#numbandera").focus();
                    $("#numbandera").prop('disabled', false);
                    $("#instalador_bandera").prop('disabled', false);


//se mando una alerta (temporalmente)  de que fue cargada exitosamente
                } else if(data== 'success'){
                    toastr.success('Equipo ' + $("#numbandera").val() + ' fue asignado correctamente al tecnico.'); 
                    $("#numbandera").val('');
                    $("#numbandera").focus();
                    $("#numbandera").prop('disabled', false);
                    $("#instalador_bandera").prop('disabled', false);


                } else if(data == 'error2'){
                    toastr.error('Equipo ' + $("#numbandera").val() + ' no existe en el inventario.'); 
                    $("#numbandera").val('');
                    $("#numbandera").focus();
                    $("#numbandera").prop('disabled', false);
                    $("#instalador_bandera").prop('disabled', false);

                }
//se mando una alerta (temporalmente) de que fallo la conexion con ajax
            }).fail(function() {
                toastr.error('Ocurrió un error, vuelva a intentarlo.'); 
                
                $("#numbandera").val('');
                $("#numbandera").focus();
                $("#numbandera").prop('disabled', false);
                $("#instalador_bandera").prop('disabled', false);

            });
        }





    });
});