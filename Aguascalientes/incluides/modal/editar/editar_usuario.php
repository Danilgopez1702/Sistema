<div class="modal" id="modal_editar_usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
            </div>
            <div class="container"></div>
                <div class="modal-body">
                    <form class="forms-sample" method='post' action='../../../base_datos/editar/editar_usuario.php' enctype="multipart/form-data">
                      <div class="form-group row">
                      <div class="col-md-12">
                        <p class="card-description" align="center"> Informacion de Usuario </p>
                        <input  type="hidden" class="form-control" id="editar_id_usuario" name="editar_id_usuario" required="" />
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Nombre <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="editar_usuario" name="editar_usuario" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Contraseña <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="editar_pass" name="editar_pass" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">ROL <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <select class="form-control" id="editar_tipo" name="editar_tipo" required >
                                <option value = "Super Usuario">Superusuario</option> 
                                <option value = "Administrador">Administrador</option>
                                <option value = "Atencion a Clientes">Atencion a Clientes</option>
                                <option value = "Cobranza">Cobranza</option>
                                <option value = "Tecnicos">Tecnicos</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Status <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <select class="form-control" id="editar_status" name="editar_status" required >
                                <option value = 'Activo'>Activo</option> 
                                <option value = 'Tecnico Deshabilitado'>Tecnico Deshabilitado</option>
                                <option value = 'Inactivo'>Inactivo</option>
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


