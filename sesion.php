<?php 

//llamamos al archivo que posee la clase para conectarnos a la base de datos
require 'clases/basededatos.php';
//llamamos al archivo usuarios.php el cual posee la clase Usuarios
require 'clases/usuarios.php';
//llamamos al archivo sesiones que posee la clase Sesion
require 'clases/sesiones.php';

//instanciamos una nueva clase Usuarios y llamamos al metodo "loguearse"
$objUser = new Usuarios();
$objUser->loguearse();

 ?>