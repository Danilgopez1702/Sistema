// Bind the keyup event to the input fields
$(document).ready(function() {
    $(".busqueda input").keyup(busqueda);
});

function busqueda() {
    var numeroCliente = document.getElementById("num_clienteB").value;
    var nombre = document.getElementById("NombreB").value;
    var apellidoPaterno = document.getElementById("ApellidoP").value;
    var apellidoMaterno = document.getElementById("ApellidoM").value;

    $.ajax({
        type: "POST",
        url: "../../../base_datos/ajax/consulta_caratula_tecnico.php", // Replace with the actual path to search.php
        data: {
            num_cliente: numeroCliente,
            nombre: nombre,
            apellido_paterno: apellidoPaterno,
            apellido_materno: apellidoMaterno
        },
        success: function(response) {
            document.querySelector(".mostrar").innerHTML = response;
        }
    });
}
$('#miModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Botón que abre el modal
    var dato1 = button.data('dato1'); // Extraer valor de los atributos data-dato1
    var dato2 = button.data('dato2'); // Extraer valor de los atributos data-dato2
    var modal = $(this);
    modal.find('#dato1').text(dato1); // Insertar valor en el elemento del modal
    modal.find('#dato2').text(dato2); // Insertar valor en el elemento del modal
});