$(document).ready(function () {
    var tables = $('#revision').DataTable({
      "ajax": {
        "url": "../../../base_datos/ajax/tablas_tecnico/consulta_contratos.php",
        "method": 'POST', //usamos el metodo POST
        "dataSrc":""
      },
      "columns":[
  
        {"data": "id_cliente" }, 
        {"data": "status_cliente" }, 
        {"data": "ont_cliente"},
        {"data": "onu_cliente"},
        {"data": "bandera_cliente"},
        {"data": "numero_cliente"},
        {"data": "apellido_p_cliente"},
        {"data": "apellido_m_cliente"},
        {"data": "nombre_cliente"},
  
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-sucess btn-sm btnBorrar'><i class='fas fa-light fa-eye'></i></button></div><div class='btn-group'><button class='btn btn-sucess btn-sm btnRepo' data-toggle='modal' title='Levantar reporte'><i class='fas fa-thin fa-wrench ml-2'></i></button></div>"}
    ],
      lengthMenu: [5, 10, 15, 20],
      language: {
        url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-MX.json',
      },
      orderCellsTop: true,
      fixedHeader: true
    });
  
    //Creamos  una fila en el head de la tabla y lo clonamos para cada columna
    $('#revision thead tr').clone(true).appendTo('#revision thead');
  
    $('#revision thead tr:eq(1) th').each(function (i) {
      var title = $(this).text();
      if (title == 'ID' || title == 'Status' || title == 'Acciones') {
        $(this).html('<h2 style="color:blank;"><H2/>');
      } else {
        $(this).html('<input class= "col-md-12" type= "text" placeholder= "Buscar..." />');
        $('input', this).on('keyup change', function () {
          if (tables.column(i).search() !== this.value) {
            tables
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
    window.location.href = "/Sistema/Aguascalientes/incluides/tecnicos/clientes/consultar/caratula.php?id=" + user_id;
    
  });
  
  //Reporte
  $(document).on("click", ".btnRepo", function(){
    fila = $(this);           
    user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		       
    console.log(user_id); 
    window.location.href = "/Sistema/Aguascalientes/incluides/tecnicos/reportes/nuevo_reporte/nuevo_reporte.php?id=" + user_id;
    
  });
  })
  
  $(document).ready(function () {
    var table = $('#reparaciones').DataTable({
      "ajax": {
        "url": "../../../base_datos/ajax/tablas_tecnico/consulta_reparaciones.php",
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
        { "data": "tipo" },
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
    $('#reparaciones thead tr').clone(true).appendTo('#reparaciones thead');
  
    $('#reparaciones thead tr:eq(1) th').each(function (i) {
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
      window.location.href = "/Sistema/Aguascalientes/incluides/tecnicos/reportes/caratula/reparaciones.php?id=" + + user_id+"&&tipo=2";
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