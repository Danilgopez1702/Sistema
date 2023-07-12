<div class="modal" id="modal_editar_antena">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Antena</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
      </div>
      <div class="container"></div>
      <div class="modal-body">
        <form class="forms-sample" method='post' action='../../../base_datos/editar/editar_antena.php' enctype="multipart/form-data">
          <div class="form-group row">
            <div class="col-md-12">
              <p class="card-description" align="center"> Informacion de la Antena </p>
              <input type="hidden" class="form-control" id="editar_id_inventario" name="editar_id_inventario" required="" />
              <div class="row-md-12">
                <div class="form-group row">
                  <label class="col-sm-8 col-form-label">Mac de la Antena <span class="require">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="editar_radio_inventario" name="editar_radio_inventario" required="" />
                  </div>
                </div>
              </div>
              <div class="row-md-12">
                <div class="form-group row">
                  <label class="col-sm-8 col-form-label">Asignado a: <span class="require">*</span></label>
                  <div class="col-sm-10">
                    <select class="form-control" name="editar_id_instalador" id="editar_id_instalador" style="border-radius: 5px;">
                      <option value="No Asignado">Sin Asignar....</option>
                      <?php
                      $tecnico = mysqli_query($conexion, "SELECT * FROM usuario WHERE tipo_usuario = 4");
                      $result_tecnico = mysqli_num_rows($tecnico);
                      if ($result_tecnico > 0) {
                        while ($data_tecnico = mysqli_fetch_assoc($tecnico)) {
                      ?>
                          <option value="<?php echo $data_tecnico['usuario_usuario'] ?>">
                            <?php echo $data_tecnico['usuario_usuario'] ?>
                          </option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row-md-12">
                <div class="form-group row">
                  <label class="col-sm-8 col-form-label">Fallo <span class="require">*</span></label>
                  <div class="col-sm-10">
                    <select class="form-control" id="editar_fallo_inventario" name="editar_fallo_inventario" required>
                    <option value="No Asignado">Sin Asignar....</option>
                      <option value='No'>No</option>
                      <option value='Si'>Si</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary submitBtn">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>


</script>