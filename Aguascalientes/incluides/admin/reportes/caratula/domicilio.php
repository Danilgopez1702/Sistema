<?php
include "../../../header/header_admin.php";
require("../../../base_datos/conexion/conexion.php");
$id = $_GET['id'];
include "../../../procesos/domicilio.php"
?>

<h2>Ver Cambio de Domicilio #<?php echo $numero_reporte ?></h2>
<div class="card shadow mb-4">
	<div class="card-header py-sm-2">
		<h4 class="m-0 font-weight-bold text-primary">Consultar Cambio de Domicilio de: <?php echo $nombrec_reporte . " (" . $num_cliente . ")" ?></h4>
	</div>
	<div class="text-right">
		<?php
		if ($onu_reporte == "") {
		?>
			<a href="http://<?php echo $ip_reporte ?>" type="button" class="btn btn-info" target="_blank">Revisar Instalacion</a>
		<?php
		} else {
		?>
			<a href="https://<?php echo $ip_olt ?>/action/login.html" type="button" class="btn btn-info" target="_blank">Revisar Instalacion</a>
		<?php
		}
		?>
	</div>
	<div class="card-body ">

		<!-- div de Informacion de Cliente -->
		<div class="card shadow mb-4">
			<div class="card-header py-sm-2">
				<h4 class="m-0 font-weight-bold text-primary">Informacion del Cliente</h4>
			</div>
			<div class="form-row py-3">
				<div class="container text-center">
					<div class="form-row align-items-center">
						<!-- Numero de Cliente -->
						<div class="col-md-6 mb-3">
							<div class="form-inline">
								<label class="col-sm-4 col-form-label">Numero de Cliente</label>
								<div class="col-sm-8">
									<input class="form-control col-sm-12" type="text" id="folio" name="folio" value="<?php echo $num_cliente ?>" disabled>
								</div>
							</div>
						</div>
						<!-- Nombre(s) de Cliente -->
						<div class="col-md-6 mb-3">
							<div class="form-inline ">
								<label class="col-sm-4 col-form-label">Nombre(s)</label>
								<div class="col-sm-8">
									<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $nombre_reporte ?>" disabled>
								</div>
							</div>
						</div>
						<!-- Apellido Paterno de Cliente -->
						<div class="col-md-6 mb-3">
							<div class="form-inline ">
								<label class="col-sm-4 col-form-label">Apellido Paterno</label>
								<div class="col-sm-8">
									<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $paterno_reporte ?>" disabled>
								</div>
							</div>
						</div>
						<!-- Apellido Materno de Cliente -->
						<div class="col-md-6 mb-3">
							<div class="form-inline ">
								<label class="col-sm-4 col-form-label">Apellido Materno</label>
								<div class="col-sm-8">
									<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $materno_reporte ?>" disabled>
								</div>
							</div>
						</div>
						<!-- Colonia -->
						<div class="col-md-6 mb-3">
							<div class="form-inline ">
								<label class="col-sm-4 col-form-label">Colonia</label>
								<div class="col-sm-8">
									<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $colonia_reporte ?>" disabled>
								</div>
							</div>
						</div>
						<!-- Calle -->
						<div class="col-md-6 mb-3">
							<div class="form-inline ">
								<label class="col-sm-4 col-form-label">Calle</label>
								<div class="col-sm-8">
									<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $calle_reporte ?>" disabled>
								</div>
							</div>
						</div>
						<!-- Numero Externo -->
						<div class="col-md-6 mb-3">
							<div class="form-inline ">
								<label class="col-sm-4 col-form-label">Numero Externo</label>
								<div class="col-sm-8">
									<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $externo_reporte ?>" disabled>
								</div>
							</div>
						</div>
						<!-- Ver si existe Numero Interno -->
						<?php
						if ($interno_reporte != 0) {
						?>
							<!-- Numero Interno -->
							<div class="col-md-6 mb-3">
								<div class="form-inline ">
									<label class="col-sm-4 col-form-label">Numero Interno</label>
									<div class="col-sm-8">
										<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $interno_reporte ?>" disabled>
									</div>
								</div>
							</div>
						<?php
						}
						?>
						<!-- Telefono 1-->
						<div class="col-md-6 mb-3">
							<div class="form-inline ">
								<label class="col-sm-4 col-form-label">Telefono 1</label>
								<div class="col-sm-8">
									<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $tel1_reporte ?>" disabled>
								</div>
							</div>
						</div>
						<?php
						if ($tel2_reporte != 0) {
						?>
							<!-- Telefono 2-->
							<div class="col-md-6 mb-3">
								<div class="form-inline ">
									<label class="col-sm-4 col-form-label">Telefono 2</label>
									<div class="col-sm-8">
										<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $tel2_reporte ?>" disabled>
									</div>
								</div>
							</div>
						<?php
						}
						?>
						<?php
						if ($tel3_reporte != 0) {
						?>
							<!-- Telefono 3-->
							<div class="col-md-6 mb-3">
								<div class="form-inline ">
									<label class="col-sm-4 col-form-label">Telefono 3</label>
									<div class="col-sm-8">
										<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $tel3_reporte ?>" disabled>
									</div>
								</div>
							</div>
						<?php
						}
						?>
						<?php
						if ($onu_reporte != 0) {
						?>
							<!-- Onu -->
							<div class="col-md-6 mb-3">
								<div class="form-inline ">
									<label class="col-sm-4 col-form-label">Onu</label>
									<div class="col-sm-8">
										<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $onu_reporte ?>" disabled>
									</div>
								</div>
							</div>
							<!-- Bote -->
							<div class="col-md-6 mb-3">
								<div class="form-inline ">
									<label class="col-sm-4 col-form-label">Bote</label>
									<div class="col-sm-8">
										<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $bote_reporte ?>" disabled>
									</div>
								</div>
							</div>
							<!-- Puerto -->
							<div class="col-md-6 mb-3">
								<div class="form-inline ">
									<label class="col-sm-4 col-form-label">Puerto</label>
									<div class="col-sm-8">
										<input class="form-control col-sm-12" type="text" id="n_cliente" name="n_cliente" value="<?php echo $puerto_reporte ?>" disabled>
									</div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<form class="forms-sample" method='post' action='../../../base_datos/editar/editar_domicilio.php' enctype="multipart/form-data">
			<input type="hidden" class="form-control" id="num_reporte" name="num_reporte" value="<?php echo $id_numero_reporte ?>" required="" />
			<!-- div de Informacion de la Reparacion -->
			<div class="card shadow mb-4">
				<div class="card-header py-sm-2">
					<h4 class="m-0 font-weight-bold text-primary">Informacion del Cambio de Domicilio</h4>
				</div>
				<div class="form-row py-3">
					<div class="container text-center">
						<!-- Activo -->
						<div class="col-md-6 mb-3">
							<div class="form-inline">
								<label class="col-sm-4 col-form-label">Reporte</label>
								<div class="col-sm-8">
									<?php
									if ($activo_reporte == 2) {
									?>
										<button type="button" class="btn btn-primary btn-sm" disabled>Activo</button>
									<?php
									} else {
									?>
										<button type="button" class="btn btn-danger btn-sm" disabled>Cerrado</button>
									<?php
									}
									?>
								</div>
							</div>
						</div>
						<div class="form-row align-items-center py-3">
							<!-- Status de Reporte -->
							<div class="col-md-6 mb-3">
								<div class="form-inline ">
									<label class="col-sm-4 col-form-label">Status</label>
									<div class="col-sm-8">

										<?php
										if ($status_reporte == 1) {
										?>
											<input class="form-control col-sm-12" id="status" name="status" value="Visita Pendiente" disabled>
										<?php
										} else if ($status_reporte == 2) {
										?>
											<input class="form-control col-sm-12" id="status" name="status" value="Revisión Pendiente" disabled>
										<?php
										} else if ($status_reporte == 3) {
										?>
											<input class="form-control col-sm-12" id="status" name="status" value="Segunda Visita Pendiente" disabled>
										<?php
										} else if ($status_reporte == 4) {
										?>
											<input class="form-control col-sm-12" id="status" name="status" value="Segunda Revisión Pendiente" disabled>
										<?php
										} else if ($status_reporte == 5) {
										?>
											<input class="form-control col-sm-12" id="status" name="status" value="Reparacion Completa" disabled>
										<?php
										}
										?>
										</select>
									</div>
								</div>
							</div>
							<!-- Fecha para la Reparacion -->
							<div class="col-md-6 mb-3">
								<div class="form-inline ">
									<label class="col-sm-4 col-form-label">Fecha de Asignacion</label>
									<div class="col-sm-8">
										<input class="form-control col-sm-12 text-left" type="date" id="fecha_asignacion" name="fecha_asignacion" value="<?php echo $fecha_reporte ?>" disabled required>
									</div>
								</div>
							</div>

							<!-- Reparador -->
							<div class="col-md-6 mb-3">
								<div class="form-inline ">
									<label class="col-sm-4 col-form-label">Reparador<span class="require">*</span></label>
									<div class="col-sm-8">
										<input class="form-control col-sm-12" type="text" id="n_reparador" name="n_reparador" value="<?php echo $reparador_reporte ?>" required>
									</div>
								</div>

							</div>
							<!-- Reporte -->
							<div class="form-inline ">
								<label class="col-sm-4">Reporte<span class="require">*</span></label>
								<div class="col-sm-8">
									<textarea class="col-sm-12" type="text" id="reporte" name="reporte" required><?php echo $mensaje_reporte ?></textarea>
								</div>
							</div>
						</div>
					</div>
		</form>
		
	</div>
	
</div>
<?php if ($activo_reporte == 2) { ?>
						<div class="text-right" id="bb">
							<a class="btn btn-info" href="../../../base_datos/confirmar/domicilio.php?id=<?php echo $id_numero_reporte ?>">
								Cerrar Reporte
							</a>
							<a class="btn btn-success" href="../../../admin/clientes/consultar/caratula.php?id=<?php echo $id_cliente ?>" target="_blank">
								Ver Cliente
							</a>
							<button type="submit" class="btn btn-primary submitBtn">Actualizar</button>
						</div>
					<?php } ?>

<?php
include "../../../header/header2_admin.php";
?>