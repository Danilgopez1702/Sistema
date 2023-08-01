$(document).ready(function () {
    console.log("entro")
    var table = $('#dataTable').DataTable({
      "ajax": {
        "url": "../../../base_datos/ajax/tablas/consulta_usuario.php",
        "method": 'POST', //usamos el metodo POST
        "dataSrc":""
      },
      "columns":[
  
        {"data": "id_usuario"},
        {"data": "usuario_usuario"},
        {"data": "pass_usuario"},
        {"data": "tipo_usuario"},
        {"data": "status_usuario"},
  
        {"defaultContent": 
        "<div class='text-center'><div class='btn-group'><button class='btn btn-sucess btn-sm btnEditar' data-toggle='modal' title='Eliminar antena'><i class='fas fa-thin fa-pen ml-2'></i></button></div><div class='btn-group'><button class='btn btn-sucess btn-sm btnBorrar' title='Eliminar antena'><i class='fa fa-trash ml-2'></i></button></div></div>"}
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
    id_usuario = parseInt(fila.find('td:eq(0)').text()); //capturo el ID               
    tipo_usuario = fila.find('td:eq(3)').text();
    usuario_usuario = fila.find('td:eq(1)').text();
    pass_usuario = fila.find('td:eq(2)').text();
    status_usuario = fila.find('td:eq(4)').text();
    $("#editar_id_usuario").val(id_usuario);
    $("#editar_tipo").val(tipo_usuario);
    $("#editar_usuario").val(usuario_usuario);
    $("#editar_pass").val(pass_usuario);
    $("#editar_status").val(status_usuario);
    $('#modal_editar_usuario').modal('show');
    console.log(id_usuario+tipo_usuario+usuario_usuario+pass_usuario+status_usuario)
    
  });
  
  //Borrar
  $(document).on("click", ".btnBorrar", function () {
    fila = $(this);
    user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
    var y = confirm('Estás seguro que deseas eliminar la Antena');
    if (y) {
      window.location.href = "/Sistema/Aguascalientes/incluides/base_datos/eliminar/eliminar_usuario.php?id=" + user_id+"&&in=3";
    }

  });
  })
  