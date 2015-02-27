<?php
$t = $_POST['t'];
include 'classes/Login.php';
$L = new Login;
if(!$L->isUserLoggedIn()){
	header('Location: /index.php');
}
include 'factura.php';
include 'cliente.php';
$cliente = new cliente;

$lista = $cliente->search($t);
if(!empty($lista)){
	foreach($lista as $data){
		echo "<table><tr><td><img src='img/select.png' onclick='fillCliente(\"".$data['rut']."\");'></td><td width='100'>".utf8_encode($data['rut'])."</td>";
		echo "<td>".utf8_encode($data['razon'])."</td>";
		echo "</tr></table>";
	}
}else{
	echo "No se encontraron datos.";
}


?>