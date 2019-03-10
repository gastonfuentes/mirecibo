<?php 

//llamamos al archivo para generar la conexion a la base de datos
include_once 'clases/basededatos.php';

//linea para evitar los mensaje de NOTICE Error
error_reporting(E_ALL ^ E_NOTICE);


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>MiRecibo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script defer src="js/all.js"></script> 
	<style>  
		.icono{
			color: #58595D;
			font-size: 2rem;
			margin-right: 1rem;   
		}
		.iconopeque{
			color: #58595D;
			font-size: 1rem;
			margin-right: 0.5rem;
		}
	</style>
</head>
<body>


	<div class="container-fluid" style="background-color: #8d377f;">

		<div class="row bg-white p-3" style="height: 150px;">	
				<a href="index.php" class="mx-auto h-100"><img src="imagenes/logoWeb.png" class="img-fluid h-100" ></a>
		</div>

			<div class="container pb-5 pt-5" style="background-image: url(imagenes/bghome.jpg); background-size: cover;">

				<h1 class="text-white text-center mt-5 mb-4">BIENVENIDO</h1>
				<div class="col-10 col-md-4 mx-auto pb-3">
					<p class="text-white text-center">Ingrese su DNI y número de legajo para acceder a sus recibos de sueldo.</p>
				</div>

				<!-- FORMULARIO DE LOGUEO QUE SE DIRIGE AL ARCHIVO SESION.PHP EN EL CUAL VERIFICAMOS EL USUARIO -->
				<form class="col-10 col-md-4 mx-auto text-center needs-validation" action="sesion.php" method="post" >
					<div class="form-group">										
						<input type="text" class="form-control" placeholder="Ingrese su DNI" name="dni" required>					
					</div>

					<div class="form-group">				
						<input type="password" class="form-control" placeholder="Ingrese su Contraseña" name="pass" required>
					</div>

					<button type="submit" class="btn btn-light mb-5"><small>INGRESAR</small></button>
				</form>

				<!-- CUADRO DE ALERTA - MENSAJE -->
				<?php 

				if ($_GET["error"]) {	 

				?>
				<div class="alert alert-danger col-12 col-md-8 mx-auto">
										
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span>&times;</span></button>
						<strong>Error!</strong> Verifique su <strong>Dni</strong> o <strong>Contraseña</strong> ingresada. Deben ser los mismos que ha generado en el sitio web www.municipiolarioja.gob.ar. Si no los recuerda, concurra nuevamente al sitio web indicado y solicite una nueva clave.
										
				</div>

				<?php } ?>
				

			</div>	

		<!-- FOOTER -->	
		<footer class="row bg-white text-center p-4">
			<h4 class="mx-auto col-12 mb-3">CONTACTO</h4>
			<div class="d-flex justify-content-center align-items-center col-12 mx-auto">
				<i class="iconopeque fas fa-phone"></i><small> 380-4587795 // 380-4742444</small>
			</div>
			<div class="d-flex justify-content-center align-items-center col-12 mx-auto mt-2">
				<i class="iconopeque fas fa-envelope"></i><small> mirecibo@municipiolr.com</small>
			</div>
		</footer>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>