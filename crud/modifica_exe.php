<?php 


	@session_start();
	error_reporting(E_ALL ^ E_NOTICE);

	//recibimos las variables enviada por POST
	$idcod = $_POST['idcod'];
	$newcod = $_POST['codinew'];
	$newnomb = $_POST['nombnew'];
	$newtipo = $_POST['tiponew'];
	$newdesc = $_POST['descnew'];

	//llamamos a la clase para conectarnos
	require '../clases/basededatos.php';
	// instanciamos un nuevo objeto de la clase Conectar
	$objconec = new Conectar();
	//preparamos la sentencia SQL que se va a ejecutar
	$query = "UPDATE codigos SET cod = '$newcod', nombre = '$newnomb', tipo = '$newtipo', desc_codigo = '$newdesc' WHERE cod = '$idcod' ";
	//preparamos la sentencia 
	$preparamos = $objconec->prepare($query);
	//ejecutamos la sentencia
	$preparamos->execute();
	
	//redireccionamos
	header('location: ../usuario/admin/modifica.php');



 ?>