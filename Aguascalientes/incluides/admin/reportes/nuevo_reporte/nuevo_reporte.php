<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
$id = $_GET['id'];
include "../../../procesos/reportes.php"
?>

<h2>Crear Reporte</h2>
<div class="card shadow mb-4">
	<div class="card-header py-sm-2">
		<h4 class="m-0 font-weight-bold text-primary">Crear reporte a: <?php echo $nombre_completo . " (" . $num_cliente . ")" ?></h4>
	</div>
	<div class="card-body ">

		<!-- div de Informacion de Cliente -->
		<form class="forms-sample" method='post' action='../../../base_datos/subir/add_reporte.php' enctype="multipart/form-data">
			<input type="hidden" class="form-control" id="num_reporte" name="num_reporte" value="<?php echo $id_numero_reporte ?>" required="" />
			<!-- div de Informacion de la Reparacion -->
			<div class="card shadow mb-4">
				<div class="card-header py-sm-2">
					<h4 class="m-0 font-weight-bold text-primary">Informacion del Reporte</h4>
				</div>
				<div class="form-row py-3">
					<div class="container text-center">
						<div class="form-row align-items-center py-3">
							<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id_cliente ?>" required="" />
							<!-- Tipo -->
							<div class="col-md-6 mb-3">
								<div class="form-inline">
									<label class="col-sm-4 col-form-label">Tipo de reporte</label>
									<div class="col-sm-8">
										<select class="form-control col-sm-12" name="tipo" id="tipo" style="border-radius: 5px;" required onchange='precio();'>
											<option value="0">Selecciona un tipo...</option>
											<option value="1">Reparacion</option>
											<option value="2">Migracion</option>
											<option value="4">Cambio de Domicilio</option>
										</select>
									</div>
								</div>
							</div>
							<!-- Fecha a acudir -->
							<div class="col-md-6 mb-3">
								<div class="form-inline">
									<label class="col-sm-4 col-form-label">Fecha a acudir</label>
									<div class="col-sm-8">
										<input type="date" class="form-control col-sm-12" id="fecha" name="fecha" required>
									</div>
								</div>
							</div>
							<!-- Fecha Asignacion -->
							<div class="col-md-6 mb-3">
								<div class="form-inline ">
									<label class="col-sm-4 col-form-label">Fecha Asignacion<span class="require">*</span></label>
									<div class="col-sm-8">
										<input class="form-control col-sm-8" type="date" id="asignacion" name="asignacion" value="<?php echo date("Y-m-d"); ?>">
									</div>
								</div>
							</div>
							<!-- Reparador -->
							<div class="col-md-6 mb-3">
								<div class="form-inline">
									<label class="col-sm-4 col-form-label">Reparador</label>
									<div class="col-sm-8">
										<select class="form-control col-sm-12" name="reparador" id="reparador" style="border-radius: 5px;" require>
											<!--el valor 999999999999 es el tecnico default-->
											<option value="999999999999">Selecciona un tecnico....</option>
											<?php
											//aqui se seleccion el tipo de usuario tecnico
											$tecnico = mysqli_query($conexion, "SELECT * FROM usuario WHERE tipo_usuario = 4");
											$result_tecnico = mysqli_num_rows($tecnico);
											if ($result_tecnico > 0) {
												while ($data_tecnico = mysqli_fetch_assoc($tecnico)) {
											?>
													<option value="<?php echo $data_tecnico['id_usuario'] ?>">
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
							<!-- Reporte -->
							<div class="col-md-6 mb-3">
								<div class="form-inline">
									<label class="col-sm-4">Reporte<span class="require">*</span></label>
									<div class="col-sm-8">
										<textarea class="form-control col-sm-12" type="text" id="reporte" name="reporte" required></textarea>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="panel-body text-right">
							<button type="button" id="btn_submit" class="btn btn-primary btn-icon-split btn-lg col-sm-2">Agregar Reporte</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
include "../../../header/header2.php";
?>