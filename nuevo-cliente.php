<?php
include 'classes/Login.php';
$L = new Login;
if($L->isUserLoggedIn()){
	include 'cliente.php';
	$cliente = new cliente;
	$rut = $_POST['rut'];
	$razon = $_POST['rs'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];
	$contacto = $_POST['contacto'];
	
	if($cliente->newCliente($rut, $razon, $direccion, $telefono, $correo, $contacto)){
		header('Location: clientes.php?c=ok');
	}
}	
?>
