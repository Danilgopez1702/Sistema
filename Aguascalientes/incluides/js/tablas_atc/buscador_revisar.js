$(document).ready(function () {
  var acomodo = $("#acomodo").val();
  var table = $('#dataTable').DataTable({
    "ajax": {
      "url": "../../../base_datos/ajax/tablas/consulta_contratos.php",
      "method": 'POST', //usamos el metodo POST
      data: {
        'acomodo': acomodo
    },
      "dataSrc":""
    },
    "columns":[

      {"data": "id_cliente" },
      {"data": "status_cliente"},
      {"data": "folio_cliente"},
      {"data": "onu_cliente"},
      {"data": "bandera_cliente"},
      {"data": "numero_cliente"},
      {"data": "apellido_p_cliente"},
      {"data": "apellido_m_cliente"},
      {"data": "nombre_cliente"},

      {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-sucess btn-sm btnBorrar'><i class='fas fa-light fa-eye'></i></button></div><div class='btn-group'><button class='btn btn-sucess btn-sm btnRepo' data-toggle='modal' title='Levantar reporte'><i class='fas fa-thin fa-wrench ml-2'></i></button></div>"}
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
$(document).on("click", ".btnBorrar", function(){
  fila = $(this);           
  user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		       
  console.log(user_id); 
  window.location.href = "/Sistema/Aguascalientes/incluides/atc/clientes/consultar/caratula.php?id=" + user_id;
  
});

//Reporte
$(document).on("click", ".btnRepo", function(){
  fila = $(this);           
  user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		       
  console.log(user_id); 
  window.location.href = "/Sistema/Aguascalientes/incluides/atc/reportes/nuevo_reporte/nuevo_reporte.php?id=" + user_id;
  
});
})
