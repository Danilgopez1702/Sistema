$(document).ready(function () {
  var table = $('#dataTable').DataTable({
    "ajax": {
      "url": "../../../base_datos/ajax/tablas/consulta_prospectos.php",
      "method": 'POST', //usamos el metodo POST
      "dataSrc":""
    },
    "columns":[

      {"data": "id_prospecto"},
      {"data": "apellido_p_prospecto"},
      {"data": "apellido_m_prospecto"},
      {"data": "nombre_prospecto"},
      {"data": "tel1"},

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
    if (title == 'ID' || title == 'Acciones') {
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
  window.location.href = "/Sistema/Aguascalientes/incluides/admin/clientes/consultar/prospecto.php?id=" + user_id;
  
});

//Reporte
$(document).on("click", ".btnRepo", function(){
  fila = $(this);           
  user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		       
  console.log(user_id); 
  window.location.href = "/Sistema/Aguascalientes/incluides/admin/reportes/nuevo_reporte/nuevo_reporte.php?id=" + user_id;
  
});
})

