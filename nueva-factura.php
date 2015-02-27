<?php

include 'classes/Login.php';
$L = new Login;
if($L->isUserLoggedIn()){
	include 'factura.php';
	$factura = new factura;
	
	$numero = $_POST['numero'];
	$tipo = $_POST['tipo'];
	$cliente = $_POST['cliente'];
	$monto = $_POST['monto'];
	$emision = $_POST['emision'];
	if($factura->newFactura($numero, $tipo, $cliente, $monto, $emision, $_SESSION['user_name'])){
		header('Location: main.php?f=ok');
	}
}
?>