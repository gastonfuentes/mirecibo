<?php 

//nos conectamos a la base de datos
require '../clases/basededatos.php';

require '../clases/usuarios.php';

require '../clases/dbacciones.php';

require '../clases/sesiones.php';



$objAccion = new Dbacciones();
$objAccion->Insertar();

 ?>