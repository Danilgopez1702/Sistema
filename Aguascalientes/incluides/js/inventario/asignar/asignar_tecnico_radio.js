$(function() {
    $("#numradio").on("input", function() {
        var numradio = $("#numradio").val().length;
        var instalador_antena = $("#instalador_antena").val();
        if(numradio == 12 && instalador_antena != 999999999999 ){
            $("#numradio").prop('disabled', true);
            $("#instalador_antena").prop('disabled', true);
        

//aqui pides los datos de inventario asignar antena mediante tipo post
            $.ajax({
                url: "../../../base_datos/ajax/inventario/asignar/inventario_tecnico_antena.php",
                type: 'POST',
//estos son los datos que pides
                data: {
                    'numradio' : $("#numradio").val(),
                    'instalador_antena' : $("#instalador_antena").val()
                }
// indica que ya se conecto exitosamente
            }).done(function(data) {
//se manda una alerta (temporalmente) de que esta existiendo
                if(data == 'error'){
                        toastr.error('El equipo ' + $("#numradio").val() + ' ya tiene un tecnico asignado' ); 
                    $("#numradio").val('');
                    $("#numradio").focus();
                    $("#numradio").prop('disabled', false);
                    $("#instalador_antena").prop('disabled', false);


//se mando una alerta (temporalmente)  de que fue cargada exitosamente
                } else if(data== 'success'){
                    toastr.success('Equipo ' + $("#numradio").val() + ' fue asignado correctamente al tecnico.'); 
                    $("#numradio").val('');
                    $("#numradio").focus();
                    $("#numradio").prop('disabled', false);
                    $("#instalador_antena").prop('disabled', false);


                } else if(data == 'error2'){
                    toastr.error('Equipo ' + $("#numradio").val() + ' no existe en el inventario.'); 
                    $("#numradio").val('');
                    $("#numradio").focus();
                    $("#numradio").prop('disabled', false);
                    $("#instalador_antena").prop('disabled', false);

                }
//se mando una alerta (temporalmente) de que fallo la conexion con ajax
            }).fail(function() {
                toastr.error('Ocurrió un error, vuelva a intentarlo.'); 
                
                $("#numradio").val('');
                $("#numradio").focus();
                $("#numradio").prop('disabled', false);
                $("#instalador_antena").prop('disabled', false);

            });
        }





    });
});