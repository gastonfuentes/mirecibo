<?php 

class Conectar extends PDO
{
	
	public function __construct()
	{
		try {
			parent::__construct('mysql:host=localhost;dbname=base_recibos','root','');
			parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
			echo $e . '<br>';
			die ("error al conectarse");
		}
	}

}

?>