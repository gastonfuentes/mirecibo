<?php 

@session_start();
error_reporting(E_ALL ^ E_NOTICE);


//llamamos a los sig archivos
	require '../../clases/basededatos.php';

	require '../../clases/usuarios.php';

	require '../../clases/dbacciones.php';

	require '../../clases/sesiones.php';

	//tomamos la variable mandada por GET
	$idcod = $_GET['id'];
	//instanciamos un objeto de la clase Dbacciones
	$objAccion = new Dbacciones();
	//llamamos al metodo vercodigoparticular y le mandamos la variable tomada por GET
	$resultado = $objAccion->Vercodigoparticular($idcod);


	
	// //llamamos a la clase para conectarnos
	// require 'clases/basededatos.php';
	// // instanciamos un nuevo objeto de la clase Conectar
	// $objconec = new Conectar();
	// //preparamos la sentencia SQL que se va a ejecutar y le pasamos la variable recibida por GET
	// $query = "SELECT * FROM codigos WHERE cod='$idcod'";
	// //preparamos la sentencia 
	// $preparamos = $objconec->prepare($query);
	// //ejecutamos la sentencia
	// $preparamos->execute();
	// //recogemos los resultados de la sentencia a traves de la funcion fechall
	// $resultado = $preparamos->fetchall();

	// //echo "<pre>";
	// //var_dump($resultado);

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
				<a href="#" class="mx-auto h-100"><img src="../../imagenes/logoWeb.png" class="img-fluid h-100" ></a>
		</div>

			<div class="container pb-5 pt-5" style="background-image: url(../../imagenes/bgadmin.jpg); background-size: cover;">

				<h3 class="text-white text-center mt-5 mb-4 text-capitalize">ADMIN: <?php echo $_SESSION['nombre']." ".$_SESSION['apell']; ?></h3>
				<div class="col-10 col-md-6 col-lg-4 mx-auto pb-3">
					<p class="text-white text-center">Modifique la descripcion del CODIGO seleccionado.</p>
				</div>





				<!-- FORMULARIO -->
				<form class="col-12 col-md-8 col-lg-6 mx-auto needs-validation" action="../../crud/modifica_exe.php" method="post" >
					<div class="form-group">
						<label class="text-left text-white">Numero de codigo </label>					
						<input type="text" class="form-control" value="<?php echo $resultado[0]['cod']; ?>" name="codinew" readonly="readonly">					
					</div>

					<div class="form-group">
						<label class="text-left text-white">Nombre de codigo </label>					
						<input type="text" class="form-control" value="<?php echo $resultado[0]['nombre']; ?>" name="nombnew" readonly="readonly">					
					</div>

					<div class="form-group">
						<label class="text-left text-white">Tipo de codigo</label>				
						<input type="text" class="form-control" value="<?php echo $resultado[0]['tipo']; ?>" name="nombnew" readonly="readonly">			
					</div>

					<div class="form-group">
						<label class="text-left text-white">Descripcion del codigo</label>										
						<textarea class="form-control" id="" rows="5" name="descnew" ><?php echo $resultado[0]['desc_codigo']; ?></textarea>					
					</div>
					<input type="hidden" name="idcod" value="<?php echo $resultado[0]['cod']; ?>">

					<button type="submit" class="btn btn-light btn-block mb-5 mx-auto">
						<small>MODIFICAR CODIGO</small>
					</button>

				</form>

				



				<!-- CUADRO DE ALERTA - MENSAJE ERROR-->
				<?php 

				if ($_GET["error"]) {	 

				?>
				<div class="alert alert-danger col-12 col-md-8 col-xl-6 mx-auto mt-3">
										
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span>&times;</span></button>
						<strong>Error!</strong> El codigo ingresado ya existe.
										
				</div>

				<?php } ?>





				<div class="row mt-5 col-12 col-xl-8 mx-auto">
					<form action="usuario/admin/admin.php" method="post" class="col-12 col-lg-4 float-left text-center mb-3">
						<button class=" d-flex justify-content-center align-items-center btn btn-light mx-auto">
							<i class="iconopeque fas fa-retweet"></i><small>REALIZAR OTRA TAREA</small>
						</button>
					</form>
					<form action="usuario/admin/modifica.php" method="post" class="col-12 col-lg-4 float-left text-center mb-3">
						<button class=" d-flex justify-content-center align-items-center btn btn-light mx-auto">
							<i class="iconopeque fas fa-exchange-alt"></i><small>MODIFICAR OTRO CODIGO</small>
						</button>
					</form>
					<form action="cerrarsesion.php" method="post" class="col-12 col-lg-4 float-right text-center ">
						<button class=" d-flex justify-content-center align-items-center btn btn-light mx-auto">
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

		
	</div>

<script src="../../js/jquery-3.3.1.slim.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
</body>
</html>