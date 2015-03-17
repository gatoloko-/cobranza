<?php

include 'classes/Login.php';
$L = new Login;
if($L->isUserLoggedIn()){
	include 'factura.php';
	$factura = new factura;
	$doc = $_FILES['doc']['name'];
	$numero = $_POST['numero'];
	$tipo = $_POST['tipo'];
	$estado = 1;
	$user = $_SESSION['user_name'];
	$cierre = $_POST['cierre'];
	$tc = $_POST['tc'];
	if($tc=0){
		$estado = 0;
	}elseif($tc=1){
		$estado = 1;
	}
	if($factura->editEstado($numero, $tipo, $estado, $cierre, $user, $doc)){
		
		$uploaddir = 'D:\xampp\cobranza\docs\\';
		$uploadfile = $uploaddir . basename($_FILES['doc']['name']);
		
		echo '<pre>';
		if (move_uploaded_file($_FILES['doc']['tmp_name'], $uploadfile)) {
		    echo "El archivo es válido y fue cargado exitosamente.\n";
		} else {
		    echo "¡Posible ataque de carga de archivos!\n";
		}
		
		echo 'Aquí hay más información de depurado:';
		print_r($_FILES);
		
		print "</pre>";
		
		header('Location: main.php?f=ok');
	}
}
?>