// Bind the keyup event to the input fields
$(document).ready(function () {

    // Buscador
    $(".busqueda input").keyup(busqueda);

});

function busqueda() {
    var numeroCliente = document.getElementById("num_clienteB").value;
    var nombre = document.getElementById("NombreB").value;
    var apellidoPaterno = document.getElementById("ApellidoP").value;
    var apellidoMaterno = document.getElementById("ApellidoM").value;

    $.ajax({
        type: "POST",
        url: "../../../base_datos/ajax/consulta_caratula_tecnico.php",
        data: {
            num_cliente: numeroCliente,
            nombre: nombre,
            apellido_paterno: apellidoPaterno,
            apellido_materno: apellidoMaterno
        },
        success: function (response) {
            var data = JSON.parse(response);
            document.getElementById("guardar_numero").value = data['num_cliente'];
            document.querySelector(".mostrar").innerHTML = data['searchResultsHtml'];
        }
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

function formSubmit() {

    toastr.success('Modificando equipo del cliente!');
    $("#guardar").prop("disabled", true);
    $("#modal").prop("disabled", true);
    $("#formo").submit();
}