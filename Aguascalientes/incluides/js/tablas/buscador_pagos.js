$(document).ready(function () {
    console.log("entro")
    var table = $('#dataTable').DataTable({
      "ajax": {
        "url": "../../../base_datos/ajax/tablas/consulta_pagos.php",
        "method": 'POST', //usamos el metodo POST
        "dataSrc":""
      },
      "columns":[
  
        {"data": "id_pagos"},
        {"data": "lugar_pagos"},
        {"data": "fecha_pagos"},
        {"data": "hora_pagos"},
        {"data": "num_cliente"},
        {"data": "monto_pagos"}

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
      if (title == 'ID') {
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

  })
  