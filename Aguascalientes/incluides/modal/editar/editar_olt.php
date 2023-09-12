<div class="modal" id="modal_editar_olt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Equipo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
            </div>
            <div class="container"></div>
                <div class="modal-body">
                    <form class="forms-sample" method='post' action='../../../base_datos/editar/editar_olt.php' enctype="multipart/form-data">
                      <div class="form-group row">
                      <div class="col-md-12">
                        <p class="card-description" align="center"> Editar Equipo </p>
                        <input  type="hidden" class="form-control" id="editar_id_zonafibra" name="editar_id_zonafibra" required="" />
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Nombre <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="editar_nombre_zonafibra" name="editar_nombre_zonafibra" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Botes <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="editar_botes_zonafibra" name="editar_botes_zonafibra" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Puertos <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="editar_puertos_zonafibra" name="editar_puertos_zonafibra" required="" />
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Tipo de Equipo <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <select class="form-control" id="editar_equipo_zonafibra" name="editar_equipo_zonafibra" required >
                                <option value = 'Gpon'>Gpon</option> 
                                <option value = 'Epon'>Epon</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row-md-12">
                          <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Ip <span class="require">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="editar_ip_zonafibra" name="editar_ip_zonafibra" required="" />
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


