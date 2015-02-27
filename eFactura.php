<?php
include 'classes/Login.php';
$L = new Login;
if(!$L->isUserLoggedIn()){
	header('Location: /index.php');
}
$numero = $_POST['numero'];
$tipo = $_POST['tipo'];
include 'factura.php';
$factura = new factura;
$data=$factura->getData($numero, $tipo);
if(!$data){
	header('Location: ingreso.php?f=nf');
}
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
		<script>
			$(document).ready(function(){
				$("#emision").datepicker({	
					dateFormat: "yy-mm-dd",
					monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Augosto", "Septiembre", "Octubre", "Novienbre", "Diciembre" ],
					dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
					dayNamesShort:[ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
					dayNamesMin:[ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ]
				});
			})
		</script>
	</head>

	<body>
		<header>
			<nav>
				<?php include 'nav.php' ?>
			</nav>
		</header>
		<div class="main">
			<form action="editar-factura.php" method="post">
				
			<table>
				<tr>
					<td></td>
				</tr>
			</table>
			<table>
				<tr>
					<td>Numero</td>
					<td><input type="text" name="numero" value="<?php echo $data['numero'] ?>" readonly required/></td>
					<input type="hidden" name="usuario" value="<?php echo $_SESSION['user_name'] ?>">
				</tr>
				<tr>
					<td>Tipo</td>
					<td>
						<input type="text" name="tipo" readonly value="<?php if($data['tipo']==33){echo "AFECTA";}elseif($data['tipo']==34){echo "EXENTA";} ?>" />
					</td>
				</tr>
				<tr>
					<td>Cliente</td>
					<td><input type="text" name="cliente" value="<?php echo $data['cliente'] ?>"  required/></td>
				</tr>
				<tr>
					<td>Monto</td>
					<td><input type="text" name="monto" value="<?php echo $data['monto'] ?>"  required/></td>
				</tr>
				<tr>
					<td>Emision</td>
					<td><input type="text" name="emision" value="<?php echo $data['fecha'] ?>"  id="emision" required/></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<div align="center">
							<button>
								EDITAR FACTURA
							</button>
						</div>
						
					</td>
				</tr>
			</table>
			</form>
		</div>
		
	</body>
</html>
