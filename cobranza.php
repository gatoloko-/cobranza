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
					<th width="100">RUT</th>
					<th width="200">RAZÓN</th>
					<th width="50">NUMERO</th>
					<th width="60">MONTO</th>
					<th width="40">VENCIMIENTO</th>
				</tr>
				<?php foreach($dueBills as $documento){ 
						$cliente->getData($documento['cliente']);
				?>
					
				<tr>
					<td><?php echo $documento['cliente'];?></td>
					<td><?php echo $cliente->getRazon() ?></td>
					<td><?php echo $documento['numero'];?></td>
					<td><?php echo $documento['monto'];?></td>
					<td><?php echo $documento['vencimiento'];?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>
