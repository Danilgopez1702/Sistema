$(document).ready(function () {
  var table = $('#dataTable').DataTable({
    "ajax": {
      "url": "../../../base_datos/ajax/tablas/consulta_domicilio.php",
      "method": 'POST', //usamos el metodo POST
      "dataSrc": ""
    },
    "columns": [

      { "data": "id_reportes" },
      { "data": "status" },
      { "data": "no_reporte_reportes" },
      { "data": "num_cliente" },
      { "data": "nombrec_reporte" },
      { "data": "agente" },
      { "data": "instalador" },
      { "data": "fecha_reporte" },
      { "data": "comentario" },
      {
        "defaultContent":
          "<div class='text-center'><div class='btn-group'><div class='btn-group'><button class='btn btn-sucess btn-sm btnAbrir' title='Ver Reporte'><i class='fas fa-light fa-eye'></i></button></div><button class='btn btn-sucess btn-sm btnBorrar' title='Eliminar Reporte'><i class='fa fa-trash ml-2'></i></button></div></div>"
      }
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

  //Caratula
  $(document).on("click", ".btnAbrir", function () {
    fila = $(this);
    user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
    window.location.href = "/Sistema/Aguascalientes/incluides/atc/reportes/caratula/domicilio.php?id=" + user_id+"&&tipo=1";
  });

  //Borrar
  $(document).on("click", ".btnBorrar", function () {
    fila = $(this);
    user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
    var y = confirm('Estás seguro que deseas eliminar la Antena');
    if (y) {
      window.location.href = "/Sistema/Aguascalientes/incluides/base_datos/eliminar/eliminar_reparacion.php?id=" + user_id+"&&in=4";
    }

  });
})
