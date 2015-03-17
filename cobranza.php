<?php
include 'classes/Login.php';
$L = new Login;
if(!$L->isUserLoggedIn()){
	header('Location: /index.php');
}
include 'factura.php';
include 'cliente.php';
$cliente = new cliente;
$factura = new factura;
$dueBills = $factura->dueBillsPlazo(30);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>HTML</title>
		<meta name="description" content="">
		<meta name="author" content="MANAGER">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<?php include 'incs.php'; incs(true, true, true); ?>
		<script src="js/cobranza.js"></script>
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		
	</head>

	<body>
		<header>
			<nav>
				<?php include 'nav.php' ?>
			</nav>
		</header>
		<div class="main">
			<table class="grid-cobranza">
				<tr>
					<th></th>
					<th width="100">RUT</th>
					<th width="300">RAZÓN</th>
					<th width="100">NUMERO</th>
					<th width="80">MONTO</th>
					<th width="40">VENCIMIENTO</th>
					<th width="40">REBAJAR</th>
				</tr>
				<?php foreach($dueBills as $documento){ 
						$cliente->getData($documento['cliente']);
						$razon = $cliente->getRazon();
				?>
					
				<tr>
					<td><img style="cursor: pointer;" src="img/select.png" onclick="showComentarios(<?php echo $documento['numero'].", ".$documento['tipo'] ?>)"></td>
					<td><?php echo $documento['cliente'];?></td>
					<td><?php echo utf8_encode($razon); ?></td>
					<td><?php if($documento['tipo']==33){$tipo="A";}else{$tipo="E";} echo $documento['numero']." ".$tipo;?></td>
					<td><?php echo $documento['monto'];?></td>
					<td><?php echo $documento['vencimiento'];?></td>
					<td><img src="img/bil.png" onclick="showRebaja(<?php echo $documento['numero'].", ".$documento['tipo']; ?>);"></td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
		<div id="comentariosDiv">
				
		</div>
		<div id="rebajaDiv">
			
		</div>
		<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
	</body>
</html>
