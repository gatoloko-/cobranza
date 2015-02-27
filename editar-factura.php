<?php

include 'classes/Login.php';
$L = new Login;
if($L->isUserLoggedIn()){
	include 'factura.php';
	$factura = new factura;
	
	$numero = $_POST['numero'];
	$tipo = $_POST['tipo'];
	if($tipo=="AFECTA"){
		$tipo=33;
	}elseif($tipo=="EXENTA"){
		$tipo=34;
	}
	$cliente = $_POST['cliente'];
	$monto = $_POST['monto'];
	$emision = $_POST['emision'];
	if($factura->edit($numero, $tipo, $cliente, $monto, $emision, $_SESSION['user_name'])){
		header('Location: ingreso.php?f=oke');
	}
	
}
?>