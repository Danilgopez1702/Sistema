$(function() {
    $("#nummac").on("input", function() {
        var instalador_onu = $("#instalador_onu").val();
        var nummac = $("#nummac").val().length;
        if(nummac == 12 && instalador_onu != 999999999999 ){
            $("#nummac").prop('disabled', true);
            $("#instalador_onu").prop('disabled', true);        

//aqui pides los datos de inventario asignar antena mediante tipo post
            $.ajax({
                url: "../../../base_datos/ajax/inventario/asignar/inventario_tecnico_onu.php",
                type: 'POST',
//estos son los datos que pides
                data: {
                    'nummac' : $("#nummac").val(),
                    'instalador_onu' : $("#instalador_onu").val()
                }
// indica que ya se conecto exitosamente
            }).done(function(data) {
//se manda una alerta (temporalmente) de que esta existiendo
                if(data == 'error'){
                    toastr.error('El equipo ' + $("#nummac").val() + ' ya tiene un tecnico asignado' ); 
                    $("#nummac").val('');
                    $("#nummac").focus();
                    $("#nummac").prop('disabled', false);
                    $("#instalador_onu").prop('disabled', false);


//se mando una alerta (temporalmente)  de que fue cargada exitosamente
                } else if(data== 'success'){
                    toastr.success('Equipo ' + $("#nummac").val() + ' fue asignado correctamente al tecnico.'); 
                    $("#nummac").val('');
                    $("#nummac").focus();
                    $("#nummac").prop('disabled', false);
                    $("#instalador_onu").prop('disabled', false);

                } else{
                    toastr.error('Equipo ' + $("#nummac").val() + ' no existe en el inventario.'); 
                    $("#nummac").val('');
                    $("#nummac").focus();
                    $("#nummac").prop('disabled', false);
                    $("#instalador_onu").prop('disabled', false);
                }
//se mando una alerta (temporalmente) de que fallo la conexion con ajax
            }).fail(function() {
                toastr.error('Ocurrió un error, vuelva a intentarlo.'); 
                $("#nummac").val('');
                $("#nummac").focus();
                $("#nummac").prop('disabled', false);
                $("#instalador_onu").prop('disabled', false);
            });
        }
    });
});