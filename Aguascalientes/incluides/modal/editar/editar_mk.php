<div class="modal" id="modal_editar_mk">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Mikrotik</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
      </div>
      <div class="container"></div>
      <div class="modal-body">
        <form class="forms-sample" method='post' action='../../../base_datos/editar/editar_mk.php'
          enctype="multipart/form-data">
          <div class="form-group row">
            <div class="col-md-12">
              <p class="card-description" align="center"> Informacion del Mikrotik </p>
              <input type="hidden" class="form-control" id="editar_id_mk" name="editar_id_mk" />
              <div class="row-md-12">
                <div class="form-group row">
                  <label class="col-sm-8 col-form-label">Nombre <span class="require">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="editar_nombre_mk" name="editar_nombre_mk" required="" />
                  </div>
                </div>
              </div>
              <div class="row-md-12">
                <div class="form-group row">
                  <label class="col-sm-8 col-form-label">Ip Publica <span class="require">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="editar_ip_mk" name="editar_ip_mk" required="" />
                  </div>
                </div>
              </div>
              <div class="row-md-12">
                <div class="form-group row">
                  <label class="col-sm-8 col-form-label">Usuario<span class="require">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="editar_user_mk" name="editar_user_mk" required="" />
                  </div>
                </div>
              </div>
              <div class="row-md-12">
                <div class="form-group row">
                  <label class="col-sm-8 col-form-label">Contraseña <span class="require">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="editar_pass_mk" name="editar_pass_mk" required="" />
                  </div>
                </div>
              </div>
              <div class="row-md-12">
                <div class="form-group row">
                  <label class="col-sm-8 col-form-label">Zona <span class="require">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="editar_zona_mk" name="editar_zona_mk" required="" />
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