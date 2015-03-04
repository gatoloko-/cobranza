<?php
include 'classes/Login.php';
$L = new Login;
if($L->isUserLoggedIn()){
	include 'comentario.php';
	$comentario = new comentario;
	$c = $_POST['cc'];
	$factura = $_POST['ff'];
	$tipo = $_POST['tt'];
	$newComment;
	$newComment = $comentario->newComentario($c, $factura, $tipo, $_SESSION['user_name']);
	$tr = "<tr>
				<td>".$newComment['fecha']."<br/>".$newComment['usuario']."</td>
				<td>".$newComment['comentario']."</td>
			</tr>";
	echo $tr;
	
}
?>