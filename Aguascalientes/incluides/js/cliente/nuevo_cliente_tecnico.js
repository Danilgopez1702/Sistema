var fecha = new Date();
document.getElementById("fecha_instalacion").value = fecha.toJSON().slice(0,10);

function precio() {
    var paquete = $("#paquete").val();
    console.log(paquete)
    if (paquete == 0) {
        document.getElementById('precio_m').value = 'Selecciona un Paquete';
    } else if (paquete == "2Megas") {
        document.getElementById('precio_m').value = '$199';
        document.getElementById('velocidad').value = '2MB';
    } else if (paquete == "4Megas") {
        document.getElementById('precio_m').value = '$269';
        document.getElementById('velocidad').value = '4MB';
    }else if (paquete == "6Megas") {
        document.getElementById('precio_m').value = '$349';
        document.getElementById('velocidad').value = '6MB';
    } else if (paquete == "8Megas") {
        document.getElementById('precio_m').value = '$399';
        document.getElementById('velocidad').value = '8MB';
    } else if (paquete == "10Megas") {
        document.getElementById('precio_m').value = '$499';
        document.getElementById('velocidad').value = '10MB';
    } else if (paquete == "15Megas") {
        document.getElementById('precio_m').value = '$599';
        document.getElementById('velocidad').value = '15MB';
    } else if (paquete == "5MegasFibra") {
        document.getElementById('precio_m').value = '$199';
        document.getElementById('velocidad').value = '5MBF';
    }else if (paquete == "10MegasFibra") {
        document.getElementById('precio_m').value = '$269';
        document.getElementById('velocidad').value = '10MBF';
    }else if (paquete == "20Megas") {
        document.getElementById('precio_m').value = '$349';
        document.getElementById('velocidad').value = '20MBF';
    }else if (paquete == "30Megas") {
        document.getElementById('precio_m').value = '$399';
        document.getElementById('velocidad').value = '30MBF';
    }else if (paquete == "50Megas") {
        document.getElementById('precio_m').value = '$499';
        document.getElementById('velocidad').value = '50MBF';
    }else if (paquete == "100Megas") {
        document.getElementById('precio_m').value = '$899';
        document.getElementById('velocidad').value = '100MBF';
    }
}
function seleccion_onu() {
    var instalador = $("#instalador").val();
    var tipo = $("#instalacion_nueva").val();
    var zona_onu = $("#zona_onu").val();

    $.ajax({
        url: "../../../base_datos/ajax/consulta_onu_nuevo_cliente.php",
        type: 'POST',
        data: {
            'instalador': instalador,
            'tipo': tipo,
            'zona': zona_onu
        }
    }).done(function (data) {
        $('#onu').html(data);
    });

    $.ajax({
        url: "../../../base_datos/ajax/consulta_bote_nuevo_cliente.php",
        type: 'POST',
        data: {
            'zona': zona_onu
        }
    }).done(function (data) {
        $('#bote_onu').html(data);
    });

    $.ajax({
        url: "../../../base_datos/ajax/consulta_bandera_nuevo_cliente.php",
        type: 'POST',
        data: {
            'instalador': instalador
        }
    }).done(function (data) {
        $('#bandera_onu').html(data);
    });
}
function seleccion_ont() {
    var instalador = $("#instalador").val();
    var tipo = $("#instalacion_nueva").val();
    var zona_ont = $("#zona_ont").val();

    $.ajax({
        url: "../../../base_datos/ajax/consulta_ont_nuevo_cliente.php",
        type: 'POST',
        data: {
            'instalador': instalador,
            'tipo': tipo,
            'zona': zona_ont
        }
    }).done(function (data) {
        $('#ont').html(data);
        console.log(data);
    });

    $.ajax({
        url: "../../../base_datos/ajax/consulta_bote_nuevo_cliente.php",
        type: 'POST',
        data: {
            'zona': zona_ont
        }
    }).done(function (data) {
        $('#bote_ont').html(data);
        console.log(data);
    });

    $.ajax({
        url: "../../../base_datos/ajax/consulta_bandera_nuevo_cliente.php",
        type: 'POST',
        data: {
            'instalador': instalador
        }
    }).done(function (data) {
        $('#bandera_ont').html(data);
        console.log(data);
    });
}
function form_instalacion() {
    var instalador = document.getElementById('instalador').value;
    var tipo = document.getElementById('instalacion_nueva').value;
    var zona_onu = document.getElementById('zona_onu').value;
    var zona_ont = document.getElementById('zona_ont').value;

    if (instalador != 999999999999) {
        document.getElementById("instalacion_div").style.visibility = "visible";
        document.getElementById("instalacion_nueva").style.visibility = "visible";
        document.getElementById("instalacion_nueva").required = true;
    } else {
        document.getElementById("instalacion_div").style.visibility = "hidden";
        document.getElementById("instalacion_nueva").style.visibility = "hidden";
        document.getElementById("instalacion_nueva").required = false;
        tipo = 0
    }

    if (tipo == 1) {
        document.getElementById("antena_div").style.display = "block";
        document.getElementById("antena").required = true;
        document.getElementById("ont_div").style.display = "none";
        document.getElementById('ont').value = null;
        document.getElementById("ont").required = false;
        document.getElementById("onu_div").style.display = "none";
        document.getElementById('onu').value = null;
        document.getElementById("onu").required = false;

        $.ajax({
            url: "../../../base_datos/ajax/consulta_torre_nuevo_cliente.php",
            type: 'POST',
            data: {
                'instalador': instalador,
                'tipo': tipo
            }
        }).done(function (data) {
            $('#antena').html(data);
        });


    } else if (tipo == 2) {
        document.getElementById("onu_div").style.display = "block";
        document.getElementById('onu').value = true;
        document.getElementById("antena_div").style.display = "none";
        document.getElementById("antena").value = null;
        document.getElementById("antena").required = false;
        document.getElementById("ont_div").style.display = "none";
        document.getElementById('ont').value = null;
        document.getElementById("ont").required = false;
        console.log(tipo)

    } else if (tipo == 3) {
        document.getElementById("ont_div").style.display = "block";
        document.getElementById("ont").required = true;
        document.getElementById("antena_div").style.display = "none";
        document.getElementById('antena').value = null;
        document.getElementById("antena").required = false;
        document.getElementById("onu_div").style.display = "none";
        document.getElementById('onu').value = null;
        document.getElementById("onu").required = false;
        console.log(tipo)

    } else if (tipo == 0) {
        document.getElementById("ont_div").style.display = "none";
        document.getElementById('ont').value = null;
        document.getElementById("ont").required = false;
        document.getElementById("antena_div").style.display = "none";
        document.getElementById('antena').value = null;
        document.getElementById("antena").required = false;
        document.getElementById("onu_div").style.display = "none";
        document.getElementById('onu').value = null;
        document.getElementById("onu").required = false;
        console.log(tipo)
    }
}
function formSubmit(){

    $("#btn_submit").attr("disabled", true);
    $("#btn_submit").prop('value', 'Creando usuario...');

    console.log("submiteando");
    toastr.info('Agregando cliente...');

    var num_cliente = $("#n_cliente").val();
    console.log(num_cliente);

    $.ajax({
        url: "../../../procesos/checar_pago.php",
        type: 'POST',
        data: {
            'num_cliente' : num_cliente
        }
    }).done(function(data) {
        console.log("el data es: " + data + " ª")
        //ver si ya existe ese numero de cliente
        if (data == 'error2') { 
            toastr.error('Ese número de cliente ya está siendo utilizado. Intente con otro.');
            $("#btn_submit").attr("disabled", false);
            $("#btn_submit").prop('value', 'Agregar Cliente');
            return false;
        } else {
            
            var fibra = document.getElementById("instalacion_nueva");
            var puerto_onu = $("#puerto_onu").val();
            var puerto_ont = $("#puerto_ont").val();
            if (fibra == 2){
                if(puerto_onu != '0'){
                    toastr.success('Agregando cliente.');
                    $("#velocidad").prop("disabled", false);
                    $("#precio_m").prop("disabled", false);
                    $("#formo").submit();
                }else{
                    toastr.error('Capture un valor de puerto de fibra válido.');
                    $("#btn_submit").attr("disabled", false);
                    $("#btn_submit").prop('value', 'Agregar Cliente.');
                    return false;
                }
            }else if (fibra == 3){
                if(puerto_ont != '0'){
                    toastr.success('Agregando cliente.');
                    $("#velocidad").prop("disabled", false);
                    $("#precio_m").prop("disabled", false);
                    $("#formo").submit();
                }else{
                    toastr.error('Capture un valor de puerto de fibra válido.');
                    $("#btn_submit").attr("disabled", false);
                    $("#btn_submit").prop('value', 'Agregar Cliente.');
                    return false;
                }
            }else{
                toastr.success('Agregando cliente!');
                $("#velocidad").prop("disabled", false);
                $("#precio_m").prop("disabled", false);
                $("#vendedor").prop("disabled", false);
                $("#instalador").prop("disabled", false);
                $("#formo").submit();
            }
            
        }
    });
}