<?php 

class Usuarios{

	public $objConec;
	public $objDba;
	public $objSe;
	public $result;
	public $rows;
	public $useropc;
	public $tipo_usuario;
	
	public function __construct(){

		$this->objConec = new Conectar();
		$this->objSe = new Sesion();
		
	}

	public function loguearse(){
		$preparamos = $this->objConec->prepare('SELECT * FROM usuarios WHERE documento = :docu AND password = :contra');

		//reemplazamos los parametros
		$preparamos->bindParam(':docu', $_POST["dni"]);
		$preparamos->bindParam(':contra', $_POST["pass"]);

		//ejecutamos la sentencia query
		$preparamos->execute();

		//traemos el resultado
		$resultado = $preparamos->fetchAll();

		//preguntamos si la variable resultado encontro algo. si es asi verificamos que tipo de usuario es y lo redireccionamos de acuerdo a su valor. si resultado no trae ningun valor es que los datos estan incorrectos o el usuario no existe por lo tanto devolvemos un error.
		if ($resultado) {
						
			$tipo_usuario = $resultado[0]["tipo_usuario"];

			switch ($tipo_usuario) {
				case 'ADMINISTRADOR':
					$this->objSe->ini_sesion();
					$this->objSe->set_sesion('nombre',$resultado[0]["nombre"]);
					$this->objSe->set_sesion('apell',$resultado[0]["apellido"]);
					$this->objSe->set_sesion('docu',$resultado[0]["documento"]);					
					header('location: usuario/admin/admin.php');
					break;
				
				case 'EMPLEADO':
					$this->objSe->ini_sesion();
					$this->objSe->set_sesion('nombre',$resultado[0]["nombre"]);
					$this->objSe->set_sesion('apell',$resultado[0]["apellido"]);
					$this->objSe->set_sesion('docu',$resultado[0]["documento"]);
					//header('location: veremp.php');
					header('location: usuario/empleado/verrecibos.php');
					break;
			}

		}else{
			header('location: index.php?error=1');
		}

	}

}


?>