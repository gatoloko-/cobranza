<?php
include 'classes/Login.php';
$L = new Login;
if($L->isUserLoggedIn()){
	include 'comentario.php';
	$comentario = new comentario;
	$c = $_POST['cc'];
	$factura = $_POST['ff'];
	$tipo = $_POST['tt'];
	
	if($comentario->newComentario($c, $factura, $tipo, $_SESSION['user_name'])){
		header('Location: main.php?f=ok');
	}
}
?>