$(document).ready(function () {
    var instalacion = document.getElementById('instalacion_nueva').value;
    if (instalacion == 1) {
        document.getElementById("antena_div").style.display = "block";
    } else if (instalacion == 2) {
        document.getElementById("onu_div").style.display = "block";
    } else if (instalacion == 3) {
        document.getElementById("ont_div").style.display = "block";
    }
})

function precio() {
    var paquete = $("#paquete").val();
    console.log(paquete)
    if (paquete == 0) {
        document.getElementById('precio_m').value = 'Selecciona un Paquete';
    } else if (paquete == "2Megas") {
        document.getElementById('precio_m').value = '199';
        document.getElementById('velocidad').value = '2MB';
    } else if (paquete == "4Megas") {
        document.getElementById('precio_m').value = '269';
        document.getElementById('velocidad').value = '4MB';
    } else if (paquete == "6Megas") {
        document.getElementById('precio_m').value = '349';
        document.getElementById('velocidad').value = '6MB';
    } else if (paquete == "8Megas") {
        document.getElementById('precio_m').value = '399';
        document.getElementById('velocidad').value = '8MB';
    } else if (paquete == "10Megas") {
        document.getElementById('precio_m').value = '499';
        document.getElementById('velocidad').value = '10MB';
    } else if (paquete == "15Megas") {
        document.getElementById('precio_m').value = '599';
        document.getElementById('velocidad').value = '15MB';
    } else if (paquete == "5MegasFibra") {
        document.getElementById('precio_m').value = '199';
        document.getElementById('velocidad').value = '5MBF';
    } else if (paquete == "10MegasFibra") {
        document.getElementById('precio_m').value = '269';
        document.getElementById('velocidad').value = '10MBF';
    } else if (paquete == "20Megas") {
        document.getElementById('precio_m').value = '349';
        document.getElementById('velocidad').value = '20MBF';
    } else if (paquete == "30Megas") {
        document.getElementById('precio_m').value = '399';
        document.getElementById('velocidad').value = '30MBF';
    } else if (paquete == "50Megas") {
        document.getElementById('precio_m').value = '499';
        document.getElementById('velocidad').value = '50MBF';
    } else if (paquete == "100Megas") {
        document.getElementById('precio_m').value = '899';
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
                'tipo': tipo,
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
function formSubmit() {

    toastr.success('Modificando cliente!');
    $("#velocidad").prop("disabled", false);
    $("#precio_m").prop("disabled", false);
    $("#status").prop("disabled", false);
    $("#paquete").prop("disabled", false);
    $("#fecha_corte").prop("disabled", false);
    $("#instalador").prop("disabled", false);
    $("#instalacion_nueva").prop("disabled", false);
    $("#antena").prop("disabled", false);
    $("#zona_onu").prop("disabled", false);
    $("#puerto_onu").prop("disabled", false);
    $("#onu").prop("disabled", false);
    $("#router").prop("disabled", false);
    $("#bandera_onu").prop("disabled", false);
    $("#zona_ont").prop("disabled", false);
    $("#bote_ont").prop("disabled", false);
    $("#puerto_ont").prop("disabled", false);
    $("#ont").prop("disabled", false);
    $("#bandera_ont").prop("disabled", false);
    $("#formo").submit();
}
function refresh() {
    var id = $("#id").val();
    $("#btn_refresh").attr("disabled", true);
    toastr.info('Deslogueando...');
    console.log(id)
    $.ajax({
        url: "../../../mikrotik/refresh.php",
        type: 'POST',
        data: {
            'id': id
        }
    }).done(function (data) {
        if (data == 'error2') {
            toastr.error('Cliente No Encontrado.');
            $("#btn_refresh").prop("disabled", false);
        } else {
            toastr.success('Cliente Deslogueado.');
            $("#btn_refresh").prop("disabled", false);
        }
    })
}
function arreglar() {
    var id = $("#id").val();
    $("#btn_arreglar").prop("disabled", true);
    toastr.info('Arreglando...');
    console.log(id)
    $.ajax({
        url: "../../../mikrotik/boton_arreglar.php",
        type: 'POST',
        data: {
            'id': id
        }
    }).done(function (data) {
        if (data == 'error2') {
            toastr.error('Cliente No Encontrado.');
            $("#btn_refresh").prop("disabled", false);
        } else {
            toastr.success('Cliente Arreglado.');
            $("#btn_refresh").prop("disabled", false);
        }
    })
}
function ont_router() {
    var ont = document.getElementById('ont').value;
    $.ajax({
        url: "../../../base_datos/ajax/consultar_mac_ont.php",
        type: 'POST',
        data: {
            'ont': ont
        }
    }).done(function (data) {
        dec = parseInt(data, 16);
        nrouter = dec + 1;
        hex = nrouter.toString(16);
        $("#router_ont").val(hex);
    });

}
function abrirNuevaPestana() {
    var precio = $("#precio_m").val();
    // Especifica el tamaño de la nueva ventana
    var ancho = 800;
    var alto = 600;

    // Eliminar caracteres no numéricos (mantener solo los dígitos)
    precio = precio.replace(/[^0-9]/g, '');

    // Convertir la cadena resultante en un número entero
    var cantidad = parseInt(precio, 10);

    // Calcula la posición del centro de la pantalla
    var izquierda = (window.screen.width - ancho) / 2;
    var arriba = (window.screen.height - alto) / 2;

    // Abre una nueva ventana en el tamaño y posición especificados
    window.open('../../../pago_tarjeta/tarjeta/checkout.php?dinero=' + cantidad + '00', 'MiNuevaPestana', 'width=' + ancho + ',height=' + alto + ',left=' + izquierda + ',top=' + arriba);

    // Escucha el mensaje de la nueva ventana
    window.addEventListener('message', function (event) {
        // Verifica que el mensaje provenga de la ventana correcta (por seguridad)
        if (event.source === nuevaVentana) {
            // Realiza la acción necesaria cuando se recibe el mensaje
            if (event.data === 'Pago exitoso') {
                console.log('Pago exitoso. Realiza la acción necesaria aquí.');
                // Puedes llamar a funciones o realizar otras acciones
            }
        }
    });

}