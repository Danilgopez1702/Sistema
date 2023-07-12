<div class="modal" id="modal_agregar_pago">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Realizar pago al cliente: <?php echo $num_cliente ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
            </div>
            <div class="container"></div>
                <div class="modal-body">
                    <form class="forms-sample" method='POST' id="form" action='../../../base_datos/subir/add_pago.php' enctype="multipart/form-data">
                      <div class="form-group row">
                      <div class="col-md-12">
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Tipo de pago <span class="require">*</span></label>
                            <input type="hidden" class="form-control" id="num_cliente_modal" name="num_cliente_modal" value="<?php echo $num_cliente ?>" required="" />
                            <div class="col-sm-10">
                              <select class="form-control" id="tipo_modal" name="tipo_modal" required>
                                <option value = '1'>Depósito Oxxo</option>
                                <option value = '2'>Santander</option>
                                <option value = '3'>Otros Bancos</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Autorizacion <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="auto_modal" name="auto_modal" maxlength="6" required="" />
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" id="btn_submit" class="btn btn-primary btn-icon-split btn-lg col-sm-2" onclick="pagoManual();">Activar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
  function pagoManual() {
    $("#btn_submit").attr("disabled", true);
    toastr.info('Agregando Pago...');
    var auto = $('#auto_modal').val();

    $.ajax({
        url: "../../../base_datos/subir/add_pago.php",
        type: 'POST',
        data: {
            'auto' : auto
        }
    }).done(function(data) {
        console.log("el data es: " + data + " ª")
        //ver si ya existe ese numero de cliente
        if (data == 'error2') { 
            toastr.error('Este numero de autorizacion ya esta registrado.');
            $("#btn_submit").attr("disabled", false);
            $("#btn_submit").prop('value', 'Agregar Cliente');
            return false;
        }else{
            toastr.success('Pago realizado.');
            $("#formo").submit();
        }
    })
}
</script>