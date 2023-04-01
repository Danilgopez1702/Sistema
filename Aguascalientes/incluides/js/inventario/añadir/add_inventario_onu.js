$(function() {
    $("#nummac").on("input", function() {
        var numonu = $("#numonu").val().length;
        var nummac = $("#nummac").val().length;
        if(numonu == 12 && nummac == 12){
            $("#numonu").prop('disabled', true);
            $("#nummac").prop('disabled', true);

//aqui pides los datos de inventario add antena mediante tipo post
            $.ajax({
                url: "../../../base_datos/ajax/inventario/add/inventario_add_onu.php",
                type: 'POST',
//estos son los datos que pides
                data: {
                    'numonu' : $("#numonu").val(),
                    'nummac' : $("#nummac").val(),
                    'fallo' : $("#fallo").val()
                }
// indica que ya se conecto exitosamente
            }).done(function(data) {
//se manda una alerta (temporalmente) de que esta existiendo
                if(data == 'error'){
                    toastr.error('El equipo ' + $("#numonu").val() + ' ya está en el inventario.'); 
                    $("#numonu").val('');
                    $("#numonu").focus();
                    $("#numonu").prop('disabled', false);
                    $("#nummac").val('');
                    $("#nummac").focus();
                    $("#nummac").prop('disabled', false);


//se mando una alerta (temporalmente)  de que fue cargada exitosamente
                } else {
                    toastr.success('Equipo ' + $("#numonu").val() + ' agregado a la base de datos.'); 
                    $("#numonu").val('');
                    $("#numonu").focus();
                    $("#numonu").prop('disabled', false);
                    $("#nummac").val('');
                    $("#nummac").focus();
                    $("#nummac").prop('disabled', false);
                }
//se mando una alerta (temporalmente) de que fallo la conexion con ajax
            }).fail(function() {
                toastr.error('Ocurrió un error, vuelva a intentarlo.'); 
                $("#numonu").val('');
                $("#numonu").focus();
                $("#numonu").prop('disabled', false);
                $("#nummac").val('');
                $("#nummac").focus();
                $("#nummac").prop('disabled', false);
            });
        } 

    });
    $("#numonu").on("input", function() {
        var nummac = $("#nummac").val().length;
        var numonu = $("#numonu").val().length;
        if(numonu == 12 && nummac == 12){
            $("#numonu").prop('disabled', true);
            $("#nummac").prop('disabled', true);

//aqui pides los datos de inventario add antena mediante tipo post
            $.ajax({
                url: "../../../base_datos/ajax/inventario/add/inventario_add_onu.php",
                type: 'POST',
//estos son los datos que pides
                data: {
                    'numonu' : $("#numonu").val(),
                    'nummac' : $("#nummac").val(),
                    'fallo' : $("#fallo").val()
                }
// indica que ya se conecto exitosamente
            }).done(function(data) {
//se manda una alerta (temporalmente) de que esta existiendo
                if(data == 'error'){
                    toastr.error('El equipo ' + $("#numonu").val() + ' ya está en el inventario.'); 
                    $("#numonu").val('');
                    $("#numonu").focus();
                    $("#numonu").prop('disabled', false);
                    $("#nummac").val('');
                    $("#nummac").focus();
                    $("#nummac").prop('disabled', false);


//se mando una alerta (temporalmente)  de que fue cargada exitosamente
                } else {
                    toastr.success('Equipo ' + $("#numonu").val() + ' agregado a la base de datos.'); 
                    $("#numonu").val('');
                    $("#numonu").focus();
                    $("#numonu").prop('disabled', false);
                    $("#nummac").val('');
                    $("#nummac").focus();
                    $("#nummac").prop('disabled', false);
                }
//se mando una alerta (temporalmente) de que fallo la conexion con ajax
            }).fail(function() {
                toastr.error('Ocurrió un error, vuelva a intentarlo.'); 
                $("#numonu").val('');
                $("#numonu").focus();
                $("#numonu").prop('disabled', false);
                $("#nummac").val('');
                $("#nummac").focus();
                $("#nummac").prop('disabled', false);
            });
        } 
    });
});