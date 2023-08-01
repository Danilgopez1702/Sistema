<?php
session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../../../../');
}
if ($_SESSION['zona'] != 1) {
    header('location: ../../../../redirigir.php');
}
if ($_SESSION['rol'] == 2) {

    //Comprobamos si esta definida la sesión 'tiempo'.
    if (isset($_SESSION['tiempo'])) {

        //Tiempo en segundos para dar vida a la sesión.
        $inactivo = 60000; //10min en este caso.

        //Calculamos tiempo de vida inactivo.
        $vida_session = time() - $_SESSION['tiempo'];

        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
        if ($vida_session > $inactivo) {
            //Removemos sesión.
            session_unset();
            //Destruimos sesión.
            session_destroy();
            //Redirigimos pagina.
            header("Location: ../../../../../index.php");

            exit();
        } else {  // si no ha caducado la sesion, actualizamos
            $_SESSION['tiempo'] = time();
        }
    } else {
        //Activamos sesion tiempo.
        $_SESSION['tiempo'] = time();
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>DigitalNet|Aguascalientes</title>

        <!-- Custom fonts for this template-->
        <link href="../../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../../../assets/css/sb-admin-2.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>

        <!-- toast -->
        <script src=" https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js "></script>
        <link href=" https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css " rel="stylesheet">

        <!-- Datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>


    </head>

    <body id="page-top"  onload="cel()">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center " href="../../../admin/dashboard/index/index.php">
                    <div>
                        <img src="../../../assets/img/logo_blanco.png" id="imagen" width="150" height="60" />
                        <H4 id="dn" style="display:none;">DN</H4>
                    </div>

                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="../../dashboard/index/index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Principal</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Contrato</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="../../clientes/agregar/nuevo_prospecto.php">Nuevo Prospecto</a>
                            <a class="collapse-item" href="../../clientes/agregar/nuevo_contrato.php">Nuevo Contrato</a>
                            <a class="collapse-item" href="../../clientes/consultar/consultar_contrato.php?acomodo=99">Consultar</a>
                            <a class="collapse-item" href="../../clientes/consultar/consultar_prospecto.php">Prospectos</a>
                            <a class="collapse-item" href="../../clientes/consultar/consultar_contrato.php?acomodo=9">Por Revisar</a>
                            <a class="collapse-item" href="../../clientes/consultar/encuestas.php?acomodo=1">Encuestas</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRevisiones" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Revisiones</span></a>
                    </a>
                    <div id="collapseRevisiones" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="../../reportes/visualizacion/ver_domicilio.php">Cambio de Domicilio</a>
                            <a class="collapse-item" href="../../reportes/visualizacion/ver_reparaciones.php">Reparaciones</a>
                            <a class="collapse-item" href="../../reportes/visualizacion/ver_migraciones.php">Migraciones</a>
                            <a class="collapse-item" href="../../reportes/visualizacion/ver_ventas.php">Ventas</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBarras" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-barcode"></i>
                        <span>Codigos de Barras</span></a>
                    </a>
                    <div id="collapseBarras" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <!--<a class="collapse-item" href="../../codigo_barras/plantilla/codigo_barras_plantilla.php">Tarjetas Digital</a> -->
                            <a class="collapse-item" href="../../codigo_barras/plantilla/codigo_barras_plantilla.php">Plantillas de Tarjetas</a>
                            <!--<a class="collapse-item" href="../../../docs/404.html">Tarjetas Digital</a> -->
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagosOXXO" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-credit-card"></i>
                        <span>Pagos OXXO </span></a>
                    </a>
                    <div id="collapsePagosOXXO" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="../../pagos_oxxo/previsualizar/historial_pagos.php">Historial de Pagos</a>
                            <a class="collapse-item" href="../../pagos_oxxo/agregar/subir_oxxo.php">Añadir Pagos OXXO</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../../log/bitacora_general/bitacora.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Bitacora</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>



                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombre']; ?></span>

                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../../../header/salir.php">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                    <script type="text/javascript">
                        function cel() {

                            if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {

                                document.getElementById('imagen').style.display = 'none';
                                document.getElementById('dn').style.display = 'block';
                            }
                            }
                    </script>
                    <?php
                } else {
                    header('location: ../../../reenvio/reenvio.php');
                }
                    ?>