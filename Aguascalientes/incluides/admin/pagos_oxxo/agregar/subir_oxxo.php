<?php 

include "../../../header/header_admin.php"; 

?>

<!--BEGIN PAGE WRAPPER-->

        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">

                    <div class="page-title">Subir archivo de OXXO</div>

                </div>
                <ol class="breadcrumb page-breadcrumb pull-left">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="index.php">Principal</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="hidden"><a href="#">Subir archivo de OXXO</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li class="active">OXXO</li>
                </ol>

                <div class="clearfix"></div>

            </div>

            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->

            <div class="page-content">

                <div id="tab-general">

                    <div class="row">

                        <div class="col-md-6 col-md-offset-3">
                        <div class="portlet box portlet-yellow">
                            <div class="portlet-header">
                                <div class="caption">Subir archivo de OXXO</div>
                            </div>
                            <div class="portlet-body pal">
                                <form id="form-barras" class="form-horizontal form-separated" method="POST" enctype="multipart/form-data">
                                    <div class="form-body pal">
                                        <div class="form-group">
                                            <label for="exampleInputFile" class="col-md-3 control-label">Archivo de OXXO</label>

                                            <div class="col-md-9"><input name="fileToUpload" id="fileToUpload" type="file">
                                                <!--<p class="help-block">some help text here.</p>-->
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <p style="text-align: justify;">
                                                NOTA: la funcionalidad de este módulo se basa en que el 
                                                "número de cliente" de cada Cliente sea correcto (que 
                                                sean de 10 dígitos, que no haya duplicados, etc.), favor
                                                de tomar eso en cuenta a la hora de subir un archivo ya que
                                                de lo contrario podría estar activando el servicio a algún otro
                                                cliente.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-actions text-right pal">
                                        <button style="width: 100%" type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                    
                                </form>


                            </div>


                        </div>
                    </div>



                </div>

            </div>

            <!--END CONTENT--></div>
<!-- estos 3 renglones son para los poop ups con el tostring-->
<link href = "../../../js/toastr/toastr.min.css" rel="stylesheet" >
<script src="https:ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../../js/toastr/toastr.min.js"></script>

<!-- aqui se manda llamar el js (script) de add_inv_radio.js-->
<script src="../../../js/oxxo/agregar/agregar_oxxo.js"></script>


<?php include "../../../header/header2_admin.php";  ?>