<div class="modal" id="modal_agregar_torre">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Cliente de Torre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">x</button>
            </div>
            <div class="container"></div>
            <div class="modal-body">
                <form class="forms-sample" method='post' action='../../../base_datos/subir/add_torre.php' enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <p class="card-description" align="center"> Informacion del Cliente de Torre </p>
                            <div class="row-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-8 col-form-label">Torre de: <span class="require">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="torre" name="torre" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-8 col-form-label">Nombre del Cliente de Torre:<span class="require">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nombre" name="nombre" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-8 col-form-label">Direccion: <span class="require">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="direccion" name="direccion" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-8 col-form-label">Numero de servicio cfe:<span class="require">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="cfe" name="cfe" required="" />
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