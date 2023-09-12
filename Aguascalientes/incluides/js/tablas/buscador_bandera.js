$(document).ready(function () {
    console.log("entro")
    var table = $('#dataTable').DataTable({
      "ajax": {
        "url": "../../../base_datos/ajax/tablas/consulta_bandera.php",
        "method": 'POST', //usamos el metodo POST
        "dataSrc":""
      },
      "columns":[
  
        {"data": "id_inventario"},
        {"data": "bandera_inventario"},
        {"data": "asignado"},
        {"data": "fallo_inventario"},
        {"data": "fecha_inventario"},
  
        {"defaultContent": 
        "<div class='text-center'><div class='btn-group'><button class='btn btn-sucess btn-sm btnEditar' data-toggle='modal' title='Eliminar antena'><i class='fas fa-thin fa-pen ml-2'></i></button></div><div class='btn-group'><button class='btn btn-sucess btn-sm btnBorrar' title='Eliminar antena'><i class='fa fa-trash ml-2'></i></button></div></div>"}
    ],
      order: [1, 'desc'],
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
      if (title == 'ID' || title == 'Acciones' ) {
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
  
  //Editar
  $(document).on("click", ".btnEditar", function () {
    fila = $(this).closest("tr");
    id_inventario = parseInt(fila.find('td:eq(0)').text()); //capturo el ID               
    bandera_inventario = fila.find('td:eq(1)').text();
    id_instalador = fila.find('td:eq(2)').text();
    fallo_instalador = fila.find('td:eq(3)').text();
    $("#editar_id_inventario").val(id_inventario);
    $("#editar_bandera_inventario").val(bandera_inventario);
    $("#editar_id_instalador").val(id_instalador);
    $("#editar_fallo_inventario").val(fallo_instalador);
    $('#modal_editar_bandera').modal('show');
    
  });
  
  //Borrar
  $(document).on("click", ".btnBorrar", function () {
    fila = $(this);
    user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
    var y = confirm('Estás seguro que deseas eliminar la Bandera');
    if (y) {
      window.location.href = "/Sistema/Aguascalientes/incluides/base_datos/eliminar/eliminar_inventario.php?id=" + user_id +"&&in=4";
    }

  });
  })
  