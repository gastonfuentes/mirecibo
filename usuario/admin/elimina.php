<?php 

	@session_start();
	error_reporting(E_ALL ^ E_NOTICE);

	//llamamos a los sig archivos
	require '../../clases/basededatos.php';

	require '../../clases/usuarios.php';

	require '../../clases/dbacciones.php';

	require '../../clases/sesiones.php';

	//instanciamos un objeto de la clase Dbacciones
	$objAccion = new Dbacciones();
	//llamamos al metodo verempleado y lo guardamos en una variable
	$resultado = $objAccion->Vercodigos();

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
					<p class="text-white text-center">Seleccione el codigo que desee ELIMINAR.</p>
				</div>



				<!-- TABLA PARA MOSTRAR LOS CODIGOS CARGADOS EN LA BASE DE DATOS -->
				<table class="table table-light table-bordered table-striped col-12 col-xl-10 mx-auto">
					<thead class="thead-light">
						<tr>
							<th>CODIGO</th>
							<th>NOMBRE</th>
							<th class="d-none d-md-table-cell">TIPO</th>
							<th class="d-none d-md-table-cell">DESCRIPCION</th>
							<th>ACCION</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($resultado as $codigos): ?>
						<tr>
							<td><?php echo $codigos['cod']; ?></td>
							<td><?php echo $codigos['nombre']; ?></td>
							<td class="d-none d-md-table-cell"><?php echo $codigos['tipo']; ?></td>
							<td class="d-none d-md-table-cell"><?php echo $codigos['desc_codigo']; ?></td>	
							<td><a href="../../crud/elimina_exe.php?id=<?php echo $codigos['cod']; ?>" class="badge badge-secondary">Eliminar</a></td>						
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				
				

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