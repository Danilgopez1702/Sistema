$(function() {
    $("#nummacont").on("input", function() {
        var instalador_ont = $("#instalador_ont").val();
        var nummacont = $("#nummacont").val().length;
        if(nummacont == 12 && instalador_ont != 999999999999 ){
            $("#nummacont").prop('disabled', true);
            $("#instalador_ont").prop('disabled', true);        

//aqui pides los datos de inventario asignar antena mediante tipo post
            $.ajax({
                url: "../../../base_datos/ajax/inventario/asignar/inventario_tecnico_ont.php",
                type: 'POST',
//estos son los datos que pides
                data: {
                    'nummacont' : $("#nummacont").val(),
                    'instalador_ont' : $("#instalador_ont").val()
                }
// indica que ya se conecto exitosamente
            }).done(function(data) {
//se manda una alerta (temporalmente) de que esta existiendo
                if(data == 'error'){
                    toastr.error('El equipo ' + $("#nummacont").val() + ' ya tiene un tecnico asignado' ); 
                    $("#nummacont").val('');
                    $("#nummacont").focus();
                    $("#nummacont").prop('disabled', false);
                    $("#instalador_ont").prop('disabled', false);


//se mando una alerta (temporalmente)  de que fue cargada exitosamente
                } else if(data== 'success'){
                    toastr.success('Equipo ' + $("#nummacont").val() + ' fue asignado correctamente al tecnico.'); 
                    $("#nummacont").val('');
                    $("#nummacont").focus();
                    $("#nummacont").prop('disabled', false);
                    $("#instalador_ont").prop('disabled', false);

                } else if(data == 'error2'){
                    toastr.error('Equipo ' + $("#nummacont").val() + ' no existe en el inventario.'); 
                    $("#nummacont").val('');
                    $("#nummacont").focus();
                    $("#nummacont").prop('disabled', false);
                    $("#instalador_ont").prop('disabled', false);
                }
//se mando una alerta (temporalmente) de que fallo la conexion con ajax
            }).fail(function() {
                toastr.error('Ocurrió un error, vuelva a intentarlo.'); 
                $("#nummacont").val('');
                $("#nummacont").focus();
                $("#nummacont").prop('disabled', false);
                $("#instalador_ont").prop('disabled', false);
            });
        }
    });
});