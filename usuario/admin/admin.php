
<?php 

	@session_start();

	error_reporting(E_ALL ^ E_NOTICE);
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>MiRecibo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<script defer src="../../js/all.js"></script> 
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
				<a href="../../index.php" class="mx-auto h-100"><img src="../../imagenes/logoWeb.png" class="img-fluid h-100" ></a>
		</div>

			<div class="container pb-5 pt-5" style="background-image: url(../../imagenes/bgadmin.jpg); background-size: cover;">

				<h3 class="text-white text-center mt-5 mb-4 text-capitalize">ADMIN: <?php echo $_SESSION['nombre']." ".$_SESSION['apell']; ?></h3>
				<div class="col-10 col-md-6 mx-auto pb-3">
					<p class="text-white text-center">Seleccione la tarea que desea realizar.</p>
				</div>





				<!-- FORMULARIO -->
				<form action="vercodigos.php">
					<button class="d-flex justify-content-center align-items-center btn btn-block btn-light col-12 col-sm-8 col-lg-5 col-xl-4 mx-auto">
						<i class="icono fas fa-list-ol"></i><div>Listar Items de Recibo de Sueldo</div>
					</button>
				</form>
				<form action="agrega.php">
					<button class="d-flex justify-content-center align-items-center btn btn-block btn-light col-12 col-sm-8 col-lg-5 col-xl-4 mx-auto mt-3">
						<i class="icono fas fa-folder-plus"></i><div>Agregar Items de Recibo de Sueldo</div>
					</button>
				</form>
				<form action="modifica.php">
					<button class="d-flex justify-content-center align-items-center btn btn-block btn-light col-12 col-sm-8 col-lg-5 col-xl-4 mx-auto mt-3">
						<i class="icono fas fa-exchange-alt"></i><div>Modificar Items de Recibo de Sueldo</div>
					</button>
				</form>
				<form action="elimina.php">
					<button class="d-flex justify-content-center align-items-center btn btn-block btn-light col-12 col-sm-8 col-lg-5 col-xl-4 mx-auto mt-3">
						<i class="icono fas fa-eraser"></i><div>Eliminar Items de Recibo de Sueldo</div>
					</button>
				</form>

				

				<!-- CUADRO DE ALERTA - MENSAJE -->
				<?php 

				if ($_GET["ok"]) {	 

				?>
				<div class="alert alert-success col-12 col-md-6 mx-auto mt-3">
										
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span>&times;</span></button>
						<strong>Ok!</strong> Tarea realizada con exito.
										
				</div>

				<?php } ?>

				



				<!-- BOTON PARA CERRAR SESION -->
				<form action="../../cerrarsesion.php" method="post" class="col-12 text-center mt-5 mb-5">
					<button class="d-flex justify-content-center align-items-center btn btn-light mx-auto">
						<i class="iconopeque fas fa-sign-out-alt"></i><small>CERRAR SESION</small>
					</button>
				</form>


			</div>			

		
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

<script src="../../js/jquery-3.3.1.slim.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
</body>
</html>