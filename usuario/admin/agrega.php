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
				<div class="col-10 col-md-6 col-lg-4 mx-auto pb-3">
					<p class="text-white text-center">Complete el siguiente formulario para realizar la insercion de un codigo nuevo.</p>
				</div>




				<!-- CUADRO DE ALERTA - MENSAJE ERROR-->
				<?php 

				if ($_GET["error"]) {	 

				?>
				<div class="alert alert-danger col-12 col-md-8 col-xl-6 mx-auto mt-3">
										
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span>&times;</span></button>
						<strong>Error!</strong> El codigo ingresado ya existe. Verifique bien sus datos e intentelo de nuevo.
										
				</div>

				<?php } ?>





				<!-- FORMULARIO -->
				<form class="col-12 col-md-8 col-lg-6  mx-auto needs-validation" action="../../crud/insertar.php" method="post" >
					<div class="form-group">
						<label class="text-left text-white">Ingrese el numero de codigo nuevo</label>					
						<input type="text" class="form-control" placeholder="" name="codi" required>					
					</div>

					<div class="form-group">
						<label class="text-left text-white">Ingrese el nombre de codigo nuevo</label>					
						<input type="text" class="form-control" placeholder="" name="nomb" required>					
					</div>

					<div class="form-group">
						<label class="text-left text-white">Seleccione el tipo de codigo</label>				
						<select class="form-control" id="select" name="tipo" required="">
					      <option>HABER</option>
					      <option>DESCUENTO</option>
					      <option>SALARIO</option>					      
					    </select>
					</div>

					<div class="form-group">
						<label class="text-left text-white">Agregue la descripcion del codigo a ingresar</label>										
						<textarea class="form-control" id="" rows="5" name="desc" required=""></textarea>					
					</div>

					<button type="submit" class="btn btn-light btn-block mb-5 mx-auto">
						<small>INGRESAR NUEVO CODIGO</small>
					</button>

				</form>

				



				<div class="row mt-5 col-12 col-xl-6 mx-auto">
					<form action="admin.php" method="post" class="col-12 col-sm-6 float-left text-center mb-5">
						<button class=" d-flex justify-content-center align-items-center btn btn-light mx-auto">
							<i class="iconopeque fas fa-retweet"></i><small>REALIZAR OTRA TAREA</small>
						</button>
					</form>
					<form action="../../cerrarsesion.php" method="post" class="col-12 col-sm-6 float-right text-center ">
						<button class=" d-flex justify-content-center align-items-center btn btn-light mx-auto">
							<i class="iconopeque fas fa-sign-out-alt"></i><small>CERRAR SESION</small>
						</button>
					</form>
				</div>


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