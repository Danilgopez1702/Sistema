function formSubmit() {

    toastr.info('Enviando Factura...');

    var rfc = $("#rfc").val();
    var regimen = $("#regimen").val();
    var id = $("#id").val();
    var name = $("#nombre").val();
    var email = $("#email").val();

    if (rfc.length < 12 || regimen == 0) {
        toastr.error('Rellena todos los datos.');
        return false;
    } else {
        var denominacion = rfc.substr(0, 3);
        var fecha = rfc.substr(3, 6);

        if(rfc.length == 12){
            var homoclave = rfc.substr(9);
        }else if(rfc.length == 13){
            var homoclave = rfc.substr(10);
        }

                    $.ajax({
                        url: "../../../phpmailer/enviar_factura.php",
                        type: 'POST',
                        data: {
                            'id': id,
                            'name': name,
                            'email': email
                        },
                        beforeSend: function() {
                            //... your initialization code here (so show loader) ...
                            $('#enviarFactura').prop('disabled', true);
                            toastr.warning('Enviando correo con facturas, ésto puede tardar un poco, espere el mensaje de confirmación...');
                        },
                        complete: function() {
                            //... your finalization code here (hide loader) ...
                            $('#enviarFactura').prop('disabled', false);
                        },
                        success: function(result){
                          if (result == "1") {
                            toastr.success('Facturas enviadas al correo del cliente y a servicio@digitalnetags.com.mx.');
                          } else {
                            console.log(result);
                            toastr.error('Ocurrió un problema, por favor verifique los datos ingresados y vuelva a intentarlo.<br><br>ERROR: '+result);
                          }
                        },
                        error: function(xhr, textStatus, errorThrown){
                            toastr.error('Ocurrió un error de sistema. Por favor dé aviso al administrador.');
                            //alert("Error: " +textStatus)
                            console.log(textStatus + " || " + errorThrown);
                        }
                    })

          

    }
}