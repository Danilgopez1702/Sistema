<?php

include_once "../../../header/header_admin.php";
include "../../../procesos/dashboard.php";

?>
<h2>Inicio</h2>
<div class="card shadow mb-4">
    <div class="card-header py-sm-2">
        <h4 class="m-0 font-weight-bold text-primary">Panel Principal</h4>
    </div>
    <!-- Clientes por status -->
    <div class="card-body w-100 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-sm-2">
                <h4 class="m-0 font-weight-bold text-primary text-center">Clientes por estatus</h4>
            </div>
            <div class="card-body">
                <div class="row mx-md-n5">
                    <div class="col px-md-5">
                        <div class="list-group">
                            <a href="../../clientes/consultar/consultar_contrato.php?acomodo=0" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Activos</h5>
                                    <small><?php echo $activos ?></small>
                                </div>
                            </a>
                            <a href="../../clientes/consultar/consultar_contrato.php?acomodo=1" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Por Vencer</h5>
                                    <small><?php echo $vencer ?></small>
                                </div>
                            </a>
                            <a href="../../clientes/consultar/consultar_contrato.php?acomodo=2" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Morosos Activos</h5>
                                    <small><?php echo $morosos ?></small>
                                </div>
                            </a>
                            <a href="../../clientes/consultar/consultar_contrato.php?acomodo=3" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Morosos Inactivos</h5>
                                    <small><?php echo $inactivos ?></small>
                                </div>
                            </a>
                            <a href="../../clientes/consultar/consultar_contrato.php?acomodo=6" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Clientes Cancelados</h5>
                                    <small><?php echo $cancelado ?></small>
                                </div>
                            </a>
                            <a href="../../clientes/consultar/consultar_contrato.php?acomodo=8" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Dificil Recuperacion</h5>
                                    <small><?php echo $dificil ?></small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col px-md-5">
                        <div class="list-group">
                            <a href="../../clientes/consultar/consultar_contrato.php?acomodo=4" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Equipos Recuperados</h5>
                                    <small><?php echo $recuperado ?></small>
                                </div>
                            </a>
                            <a href="../../clientes/consultar/consultar_contrato.php?acomodo=5" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Equipos por Recuperar</h5>
                                    <small><?php echo $sinrec ?></small>
                                </div>
                            </a>
                            <a href="../../reportes/visualizacion/ver_domicilio.php" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Cambio de Domicilio</h5>
                                    <small><?php echo $cambio ?></small>
                                </div>
                            </a>
                            <a href="../../reportes/visualizacion/ver_reparaciones.php" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Reparaciones</h5>
                                    <small><?php echo $reparaciones ?></small>
                                </div>
                            </a>
                            <a href="../../reportes/visualizacion/ver_migraciones.php" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Migraciones</h5>
                                    <small><?php echo $migraciones ?></small>
                                </div>
                            </a>
                            <a href="../../reportes/visualizacion/ver_ventas.php" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Ventas</h5>
                                    <small><?php echo $ventas ?></small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Div por Revisar -->
    <div class="row mx-md-n5">
        <div class="col px-md-5">
            <!-- Contratos por Revisar -->
            <div class="card-body w-100 mx-auto">
                <div class="card shadow mb-4">
                    <div class="card-header py-sm-2">
                        <h4 class="m-0 font-weight-bold text-primary">Contratos por Revisar</h4>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="../../clientes/consultar/consultar_contrato.php?acomodo=9" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Por Revisar</h5>
                                    <small><?php echo $rev ?></small>
                                </div>
                            </a>
                            <a href="../../clientes/consultar/consultar_contrato.php?acomodo=10" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Por Revisar (segunda vez)</h5>
                                    <small><?php echo $rev2 ?></small>
                                </div>
                            </a>
                            <a href="../../clientes/consultar/encuestas.php?acomodo=1" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Por Encuestar</h5>
                                    <small><?php echo $en ?></small>
                                </div>
                            </a>
                            <a href="../../clientes/consultar/encuestas.php?acomodo=2" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Por Encuestar (segunda vez)</h5>
                                    <small><?php echo $en2 ?></small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col px-md-5">
            <!-- Reparaciones por Revisar -->
            <div class="card-body w-100 mx-auto">
                <div class="card shadow mb-4">
                    <div class="card-header py-sm-2">
                        <h4 class="m-0 font-weight-bold text-primary">Reparaciones por Revisar</h4>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="../../clientes/consultar/consultar_reparaciones.php?acomodo=1" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Primera Revisón</h5>
                                    <small><?php echo $rep ?></small>
                                </div>
                            </a>
                            <a href="../../clientes/consultar/consultar_reparaciones.php?acomodo=2" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Segunda Revisón</h5>
                                    <small><?php echo $segunda ?></small>
                                </div>
                            </a>
                            <a href="../../clientes/consultar/consultar_reparaciones.php?acomodo=3" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Revisón Morosa</h5>
                                    <small><?php echo $moroso ?></small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once "../../../header/header2.php";
    ?>