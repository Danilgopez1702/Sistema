function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

  async function iterateClients(line) {
      var linea = line.split(",");
      var lugar = linea[1].replace(/\s/g, "");;
      var fecha_pago = linea[2].substr(0,4)+"-"+linea[2].substr(4,2)+"-"+linea[2].substr(6,2);
      var hora = linea[3];
      var num_cliente = linea[4].substr(2,10);
      var monto = linea[6].replace(/^0+/, '');

      $.ajax({
          url: "../../../base_datos/ajax/oxxo/subir_oxxo/add_pagos_oxxo.php",
          type: 'POST',
          data : { 
              lugar : lugar,
              fecha_pago : fecha_pago,
              hora : hora,
              num_cliente : num_cliente,
              monto : monto
          },
          success: function (data) {
              if (data.substring(0,5) == "error") {
                  toastr.error('Ocurrió un error al actualizar cliente: '+num_cliente+'. el cliente estaba activo');
              } else {
                  toastr.success('Cliente actualizado: '+num_cliente);
              }
          }

      });
  }

  $("form#form-barras").submit(function(e) {
      e.preventDefault();

      if ( ! window.FileReader ) {
          return alert( 'Esta función no está soportada en tu navegador.' );
      }
      var $i = $( '#fileToUpload' ), // Put file input ID here
          input = $i[0]; // Getting the element from jQuery
      if ( input.files && input.files[0] ) {
          file = input.files[0]; // The file
          fr = new FileReader(); // FileReader instance
          fr.onload = async function () {
              var txtContent = fr.result;
              var lines = txtContent.split('\n');
              for(var i = 0;i < lines.length;i++){ //cada línea del archivo

                  iterateClients(lines[i]);
                  await sleep(5000);
              }

              

              toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }
              
              Command: toastr["success"]("Clear itself?<br /><br /><button type="button" class="btn clear">Yes</button>")
   
          }
          fr.readAsText( file );
      } 
  });