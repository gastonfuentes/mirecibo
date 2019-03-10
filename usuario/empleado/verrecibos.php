<?php 

@session_start();

//llamamos a los sig archivos
require '../../clases/basededatos.php';

require '../../clases/usuarios.php';

require '../../clases/dbacciones.php';

require '../../clases/sesiones.php';


//instanciamos un objeto de la clase Dbacciones
$objAccion = new Dbacciones();
//llamamos al metodo verempleado y lo guardamos en una variable
$resultado = $objAccion->Verempleado();


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

			<div class="container pb-5 pt-5" style="background-image: url(../../imagenes/bgbienvenido.jpg); background-size: cover;">

				<h3 class="text-white text-center mt-5 mb-4">BIENVENIDO: <?php echo $_SESSION['nombre']." ".$_SESSION['apell']; ?></h3>
				<div class="col-10 col-md-6 mx-auto pb-3">
					<p class="text-white text-center">seleccione el recibo de sueldo que desea consultar.</p>
				</div>



				<?php foreach ($resultado as $datos): ?>

				<form action="midetalle.php?peri=<?php echo $datos['periodo'] ?>" method="post" class="mb-2">
					<button class="col-8 col-sm-12 col-md-12 col-lg-10 mx-auto btn btn-light btn-block" name="periodo" >
						<div class="row col-2 col-md-1 float-left mr-1 border-right ">
							<img src="../../imagenes/icon.jpg" class="rounded float-left">
						</div>
						<div class="row col-10 col-sm-8 col-md-3 float-left mx-auto border-right">
							<div class="row col-12">
								<small class="font-weight-bolder">Fecha:_ </small><small class="font-italic"><?php echo $datos['periodo'] ?></small>
							</div>
							<div class="row col-12">
								<small class="font-weight-bolder">Nº Recibo:_ </small><small class="font-italic"><?php echo $datos['nro_recibo'] ?></small>
							</div>
						</div>
						<div class="row col-8 d-none d-md-block float-right">
							<div class="row col-12">
								<small class="font-weight-bolder">Lugar de trabajo:_</small><small class="font-italic"><?php echo $datos['organismo'] ?></small>
							</div>
							<div class="row col-12">
								<small class="font-weight-bolder">Area:_</small><small class="font-italic"> <?php echo $datos['secretaria'] ?></small>
							</div>
						</div>
					</button>
				</form>
				<?php endforeach ?>

				
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