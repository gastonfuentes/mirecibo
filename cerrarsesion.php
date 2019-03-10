<?php 

//llamamos a la clases sesiones
require 'clases/sesiones.php';
// instanciamos una nueva clase sesion
$objSe = new Sesion();
// iniciamos la sesion
$objSe->ini_sesion();
// rompemos la sesion
$objSe->romper_sesion();
//redireccionamos al index
header('location: index.php');



 ?>


