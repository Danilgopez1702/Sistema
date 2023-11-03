$(document).ready(function () {
  var acomodo = $("#acomodo").val();
  var table = $('#dataTable').DataTable({
    "ajax": {
      "url": "../../../base_datos/ajax/tablas/consulta_contratos.php",
      "method": 'POST', //usamos el metodo POST
      data: {
        'acomodo': acomodo
      },
      "dataSrc": ""
    },
    "columns": [
      { "data": "id_cliente" },
      {
        "data": "status_cliente",
        "mRender": function (data, type, full) {
          if (data == 0) {
            return "<div class='alert alert-primary' role='alert'> Activo </div>";
          } else if (data == 1) {
            return "<div class='alert alert-primary' role='alert'> Por Vencer </div>";
          } else if (data == 2) {
            return "<div class='alert alert-warning' role='alert'> Moroso </div>";
          } else if (data == 3) {
            return "<div class='alert alert-warning' role='alert'> Moroso Inactivo </div>";
          } else if (data == 4) {
            return "<div class='alert alert-info' role='alert'> Eq Recuperado </div>";
          } else if (data == 5) {
            return "<div class='alert alert-warning' role='alert'> Eq por Recuperar </div>";
          } else if (data == 6) {
            return "<div class='alert alert-info' role='alert'> Eq Recuperado </div>";
          } else if (data == 7) {
            return "<div class='alert alert-info' role='alert'> Prospecto </div>";
          } else if (data == 8) {
            return "<div class='alert alert-dark' role='alert'> Dificil Rec. </div>";
          } else if (data == 9) {
            $status_cliente = "Por Revisar";
          }
        }
      },
      { "data": "folio_cliente" },
      { "data": "onu_cliente" },
      { "data": "ont_cliente" },
      { "data": "bandera_cliente" },
      { "data": "numero_cliente" },
      { "data": "apellido_p_cliente" },
      { "data": "apellido_m_cliente" },
      { "data": "nombre_cliente" },
      { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-sucess btn-sm btnBorrar'><i class='fas fa-light fa-eye'></i></button></div><div class='text-center'><div class='btn-group'><button class='btn btn-sucess btn-sm btnBorrar'><i class='fas fa-light fa-eye'></i></button></div>" }
    ],
    lengthMenu: [50, 75, 100],
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-MX.json',
    },
    orderCellsTop: true,
    fixedHeader: true
  });

  //Creamos  una fila en el head de la tabla y lo clonamos para cada columna
  $('#dataTable thead tr').clone(true).appendTo('#dataTable thead');

  $('#dataTable thead tr:eq(1) th').each(function (i) {
    var title = $(this).text();
    if (title == 'ID' || title == 'Status' || title == 'Acciones') {
      $(this).html('<h2 style="color:blank;"><H2/>');
    } else {
      $(this).html('<input class= "col-md-12" type= "text" placeholder= "Buscar..." />');
      $('input', this).on('keyup change', function () {
        if (table.column(i).search() !== this.value) {
          table
            .column(i)
            .search(this.value)
            .draw();
        }
      })
    }
  });

  //Borrar
  $(document).on("click", ".btnBorrar", function () {
    fila = $(this);
    user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
    console.log(user_id);
    window.location.href = "/Sistema/Aguascalientes/incluides/admin/clientes/consultar/caratula.php?id=" + user_id;

  });

  //Reporte
  $(document).on("click", ".btnRepo", function () {
    fila = $(this);
    user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
    console.log(user_id);
    window.location.href = "/Sistema/Aguascalientes/incluides/admin/reportes/nuevo_reporte/nuevo_reporte.php?id=" + user_id;

  });
})