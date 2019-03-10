<?php 

class Sesion
{
	
	function __construct()
	{
		
	}

	//esta funcion nos permite iniciar las sesiones
	public function ini_sesion(){
		@session_start();
	}

	//esta funcion nos permite inicializar las variables de sesion que queremos utilizar
	public function set_sesion($varname, $valor){
		$_SESSION[$varname] = $valor;
	}

	//sirve para quitar las variables prev creadas y destruir la sesion
	public function romper_sesion(){
		session_unset();
		session_destroy();
	}

}



 ?>