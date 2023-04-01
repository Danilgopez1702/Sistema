$(function() {
    $("#nummacont").on("input", function() {
        var numont = $("#numont").val().length;
        var nummacont = $("#nummacont").val().length;
        if(numont == 12 && nummacont == 12){
            $("#numont").prop('disabled', true);
            $("#nummacont").prop('disabled', true);

//aqui pides los datos de inventario add antena mediante tipo post
            $.ajax({
                url: "../../../base_datos/ajax/inventario/add/inventario_add_ont.php",
                type: 'POST',
//estos son los datos que pides
                data: {
                    'numont' : $("#numont").val(),
                    'nummacont' : $("#nummacont").val(),
                    'fallo' : $("#fallo").val()
                }
// indica que ya se conecto exitosamente
            }).done(function(data) {
//se manda una alerta (temporalmente) de que esta existiendo
                if(data == 'error'){
                    toastr.error('El equipo ' + $("#numont").val() + ' ya está en el inventario.'); 
                    $("#numont").val('');
                    $("#numont").focus();
                    $("#numont").prop('disabled', false);
                    $("#nummacont").val('');
                    $("#nummacont").focus();
                    $("#nummacont").prop('disabled', false);


//se mando una alerta (temporalmente)  de que fue cargada exitosamente
                } else {
                    toastr.success('Equipo ' + $("#numont").val() + ' agregado a la base de datos.'); 
                    $("#numont").val('');
                    $("#numont").focus();
                    $("#numont").prop('disabled', false);
                    $("#nummacont").val('');
                    $("#nummacont").focus();
                    $("#nummacont").prop('disabled', false);
                }
//se mando una alerta (temporalmente) de que fallo la conexion con ajax
            }).fail(function() {
                toastr.error('Ocurrió un error, vuelva a intentarlo.'); 
                $("#numont").val('');
                $("#numont").focus();
                $("#numont").prop('disabled', false);
                $("#nummacont").val('');
                $("#nummacont").focus();
                $("#nummacont").prop('disabled', false);
            });
        } 

    });
    $("#numont").on("input", function() {
        var nummacont = $("#nummacont").val().length;
        var numont = $("#numont").val().length;
        if(numont == 12 && nummacont == 12){
            $("#numont").prop('disabled', true);
            $("#nummacont").prop('disabled', true);

//aqui pides los datos de inventario add ont mediante tipo post
            $.ajax({
                url: "../../../base_datos/ajax/inventario/add/inventario_add_ont.php",
                type: 'POST',
//estos son los datos que pides
                data: {
                    'numont' : $("#numont").val(),
                    'nummacont' : $("#nummacont").val(),
                    'fallo' : $("#fallo").val()
                }
// indica que ya se conecto exitosamente
            }).done(function(data) {
//se manda una alerta (temporalmente) de que esta existiendo
                if(data == 'error'){
                    toastr.error('El equipo ' + $("#numont").val() + ' ya está en el inventario.'); 
                    $("#numont").val('');
                    $("#numont").focus();
                    $("#numont").prop('disabled', false);
                    $("#nummacont").val('');
                    $("#nummacont").focus();
                    $("#nummacont").prop('disabled', false);


//se mando una alerta (temporalmente)  de que fue cargada exitosamente
                } else {
                    toastr.success('Equipo ' + $("#numont").val() + ' agregado a la base de datos.'); 
                    $("#numont").val('');
                    $("#numont").focus();
                    $("#numont").prop('disabled', false);
                    $("#nummacont").val('');
                    $("#nummacont").focus();
                    $("#nummacont").prop('disabled', false);
                }
//se mando una alerta (temporalmente) de que fallo la conexion con ajax
            }).fail(function() {
                toastr.error('Ocurrió un error, vuelva a intentarlo.'); 
                $("#numont").val('');
                $("#numont").focus();
                $("#numont").prop('disabled', false);
                $("#nummacont").val('');
                $("#nummacont").focus();
                $("#nummacont").prop('disabled', false);
            });
        } 
    });
});