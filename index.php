<?php
  require_once "Aguascalientes/incluides/base_datos/conexion/conexion.php";
  session_start();
        $alert = '<div class="alert alert-succesful" role="alert">inicie sesion</div>';

		if (!empty($_POST)) {
	  		if (empty($_POST['usuario']) || empty($_POST['clave'])) {
				  $alert = '<div class="alert alert-danger" role="alert">Ingrese su usuario y su contraseña</div>';
			}else{
				$user = mysqli_real_escape_string($conexion, $_POST['usuario']);
      		    $clave = mysqli_real_escape_string($conexion, md5($_POST['clave']));

			  	$query = mysqli_query($conexion, "SELECT * FROM `usuario` WHERE usuario_usuario = '$user' AND md5 = '$clave'");
			  	$resultado = mysqli_num_rows($query);
                
			  	if ($resultado > 0) {

            $dato = mysqli_fetch_array($query);
            $_SESSION['active'] = true;
            $_SESSION['id_usuario'] = $dato['id_usuario'];
            $_SESSION['nombre'] = $dato['usuario_usuario'];
            $_SESSION['rol'] = $dato['tipo_usuario'];
            $_SESSION['zona'] = $dato['zona_usuario'];
            header('location: redirigir.php');
      
			  	} else {
					  $alert = '<div class="alert alert-danger" role="alert"> Usuario o Contraseña Incorrecta </div>';
					  session_destroy();
			  	}
			  }
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

    <title>DigitalNet</title>

    <!-- Custom fonts for this template-->
    <link href="Aguascalientes/incluides/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="Aguascalientes/incluides/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="text-centerposition-absolute top-50 start-50">
                                <div class="contenido"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <?php echo $alert; ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">DigitalNet</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name = "usuario" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="clave" placeholder="Password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="Aguascalientes/incluides/assets/vendor/jquery/jquery.min.js"></script>
    <script src="Aguascalientes/incluides/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="Aguascalientes/incluides/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="Aguascalientes/incluides/assets/js/sb-admin-2.min.js"></script>

</body>
<script>
    var url = "archivo.php";
    var data = { variable : "valor" };
    $.ajax({
        url: url,
        data: data,
        beforeSend: function() {
            $(".contenido").html("<img src='misin.gif'>");
        },
        success: function(r) {
            $(".contenido").html(r);
        }
    });
</script>

</html>