<?php 

@session_start();

////llamamos a los sig archivos
require '../../clases/basededatos.php';

require '../../clases/usuarios.php';

require '../../clases/dbacciones.php';

require '../../clases/sesiones.php';


//recibimos el periodo mandado por GET
$peri = $_GET['peri'];

//instanciamos un objeto de la clase Dbacciones
$objAccion = new Dbacciones();
//llamamos al metodo verrecibo mandado la variable $peri y lo guardamos 
$datos_persona = $objAccion->Verrecibo($peri);
//llamamos al metodo verrecibo mandado la variable $peri y lo guardamos en otra variable
$resultado = $objAccion->Verrecibo($peri);



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


		<div class="container mt-5 mb-5">

			<h3 class="text-white text-center mt-5 mb-1">NOMBRE: <?php echo $datos_persona[0]["apell"]." ".$datos_persona[0]["nomb"] ?></h3>
			<h4 class="text-white text-center mt-1 mb-1">PERIODO: <?php echo $datos_persona[0]["periodo"] ?></h4>
			<h4 class="text-white text-center mt-1 mb-4">Nº RECIBO: <?php echo $datos_persona[0]["nro_recibo"] ?></h4>

			<div class="col-10 col-md-6 mx-auto pb-3">
				<p class="text-white text-center">Resumen detallado del recibo de sueldo seleccionado. Seleccione el codigo que desee para conocer mas sobre el.</p>
			</div>

			<div class="row p-2 border bg-light">
				<div class="col-9">
					<div class="col-12 d-flex align-items-end" style="height: 30px;"><small class="">MUNICIPALIDAD DE LA CAPITAL</small></div>
					<div class="col-12 d-flex align-items-start" style="height: 30px;"><small>CUIT: 30-67185353-5</small></div>
				</div>
				<div class="col-3" style="height: 60px">
					<img src="../../imagenes/logoMuni.png" class="img-fluid h-100 float-right">
				</div>	
			</div>

			<div class='row bg-light border p-1'>
				<div class="col-12 col-lg-3 d-none d-sm-block text-center border-right"><small>Periodo: <?php echo $datos_persona[0]["periodo"] ?></small></div>	
				<div class="col-12 col-lg-5 text-center border-right"><small>Secretaria: <?php echo $datos_persona[0]["secretaria"] ?></small></div>	
				<div class="col-12 col-lg-4 text-center"><small>Organismo: <?php echo $datos_persona[0]["organismo"] ?></small></div>
			</div>
			<div class='row bg-light border p-1'>
				<div class="col-12 col-md-8 d-none d-sm-block text-center border-right"><small>Apellido y Nombre: <?php echo $datos_persona[0]["apell"]." ".$datos_persona[0]["nomb"] ?></small></div>
				<div class="col-12 col-md-4 text-center"><small>Fecha Alta: <?php echo $datos_persona[0]["fecha_alta"] ?></small></div>			
			</div>
			<div class='row bg-light border p-1'>
				<div class="col-12 col-sm-4 text-center border-right"><small>Cuil: <?php echo $datos_persona[0]["cuil"] ?></small></div>
				<div class="col-12 col-sm-8 text-center"><small>Categoria y Cargo: <?php echo $datos_persona[0]["categ"]." ".$datos_persona[0]["cargo"] ?></small></div>			
			</div>
			<div class='row bg-light border p-1'>
				<div class="col-12 col-md-5 text-center border-right"><small>Zona: <?php echo $datos_persona[0]["zona"] ?></small></div>	
				<div class="col-12 col-md-5 text-center border-right"><small>Planta: <?php echo $datos_persona[0]["planta"] ?></small></div>	
				<div class="col-12 col-md-2 text-center"><small>Antig: <?php echo $datos_persona[0]["anti"] ?></small></div>
			</div>

		
			<div class='row bg-dark text-white'>
				<div class="col-6 col-sm-2 text-center"><small>CODIGO</small></div>
				<div class="col-4 d-none d-sm-block text-center"><small>CONCEPTO</small></div>
				<div class="col-2 d-none d-sm-block text-center"><small>UN. CALC.</small></div>
				<div class="col-3 col-sm-2 text-center"><small>HABERES</small></div>
				<div class="col-3 col-sm-2 text-center"><small>DESC.</small></div>
			</div>




			<!-- recorremos nuestro array con foreach -->
			<?php foreach ($resultado as $dato): ?>
				             <!-- le decimos que cree un boton por cada id encontrado en la cosulta-->
				<button data-toggle="collapse" data-target="#id<?php echo $dato['id'] ?>" class="btn-block text-left ">
				

					<div class='row'> <!-- dentro de cada boton ingresamos los siguiente campos-->
						<div class='col-2 d-inline border-right'><small class="text-wrap"><?php echo $dato["codi"]?></small></div>
						<div class='col-4 d-inline border-right'><small class="text-wrap" style="font-size: 0.7rem;"><?php echo $dato["descrip"]?></small></div>
						<div class="col-2 d-none d-sm-inline border-right"><small class="text-wrap"><?php echo $dato["cantidad"]?></small></div>
						<div class="col-3 col-sm-2 d-inline text-right border-right"><small class="text-wrap"><?php echo $dato["acumulado"]?></small></div>
						<div class="col-3 col-sm-2 d-inline text-left"><small class="text-wrap"><?php echo $dato["descuento"]?></small></div>
					</div>
					
				</button>

				<?php 

					//guardamos el codigo y lo mandamos al metodo "Leerdesc" para obtener la descripcion de dicho codigo
					$codigo_recibido = $dato['codi'];
 					$datos_codigos = $objAccion->Leerdesc($codigo_recibido);
					
					//recorremos y tomamos los datos con foreach
					foreach ($datos_codigos as $dc):

				 ?>	

					<!-- muestra la descripcion de cada item del recibo de sueldo seleccionado -->
					<div id="id<?php echo $dato['id'] ?>" class="collapse bg-white pl-1">
						<small><?php  echo $dc['desc_codigo']; ?></small>
					</div>

					<?php endforeach ?><!-- cerramos el primer ciclo -->
			
			<!-- finalizamos el segundo ciclo -->
			<?php endforeach ?>

			<!-- creamos la seccion de los totales y llamamos a sus respectivos valores del recibo de sueldo seleccionado -->
			<div class='row bg-light border p-1'>
				<div class="col-12 col-md-2 text-center border-right"><small>TOTALES: </small></div>	
				<div class="col-12 col-md-5 text-center border-right"><small>Haberes: $<?php echo $datos_persona[0]["total_acum"] ?></small></div>	
				<div class="col-12 col-md-5 text-center"><small>Descuentos: $<?php echo $datos_persona[0]["total_descu"] ?></small></div>
			</div>
			<div class='row bg-light border p-1'>
				<div class="col-12 col-md-4 text-center border-right"><small>Aportes Patronales: $<?php echo $datos_persona[0]["patronal_j"] ?></small></div>	
				<div class="col-12 col-md-4 text-center border-right"><small>Liquido Quincena: $<?php echo $datos_persona[0]["quincena"] ?></small></div>	
				<div class="col-12 col-md-4 text-center"><small>Salario Familiar: $<?php echo $datos_persona[0]["salario"] ?></small></div>
			</div>
			<div class='row bg-light border p-1'>
				<div class="col-12 col-md-8 text-center border-right"><small>Neto Efectivo (Haberes + Salario Familiar - Descuentos - Liquido Quincena) </small></div>	
				<div class="col-12 col-md-4 text-center"><small>$<?php echo $datos_persona[0]["neto"] ?></small></div>			
			</div>


			<div class="row mt-5">
				<form action="bienvenido.php" method="post" class="col-12 col-sm-6 float-left text-center mb-5">
					<button class=" d-flex justify-content-center align-items-center btn btn-light mx-auto">
						<i class="iconopeque fas fa-retweet"></i><small>SELECCIONAR OTRO RECIBO</small>
					</button>
				</form>
				<form action="../../cerrarsesion.php" method="post" class="col-12 col-sm-6 float-right text-center mb-5">
					<button class=" d-flex justify-content-center align-items-center btn btn-light mx-auto">
						<i class="iconopeque fas fa-sign-out-alt"></i><small>CERRAR SESION</small>
					</button>
				</form>
			</div>


		</div>
		

	</div> <!-- fin del container -->

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