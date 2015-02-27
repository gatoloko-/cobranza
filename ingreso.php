<?php
include 'classes/Login.php';
$L = new Login;
if(!$L->isUserLoggedIn()){
	header('Location: /index.php');
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
		<script src="js/ingreso.js"></script>
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
		<?php if(isset($_GET['f']) AND $_GET['f']=="nf"){?>
			<script>
				alert("Factura no encontrada");
			</script>
		<?php }elseif(isset($_GET['f']) AND $_GET['f']=="oke"){ ?>
			<script>
				alert("Factura correctamente editada");
			</script>
		<?php } ?>
	</head>

	<body>
		<header>
			<nav>
				<?php include 'nav.php' ?>
			</nav>
		</header>
		<div class="main">			
			<form method="post" action="eFactura.php">
			<table>
				<tr><td colspan="2"><div align="center"><h1>MODIFICAR FACTURA</h1></div></td></tr>
				<tr>
					<td width="80">Numero</td>
					<td><input type="text" name="numero" required/></td>
				</tr>
				<tr>
					<td width="80">Tipo</td>
					<td>
						<select name="tipo" required>
							<option></option>
							<option value="33">AFECTA</option>
							<option value="34">EXENTA</option>
						</select>
					</td>
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
			<form action="nueva-factura.php" method="post">
			<table>
				<tr>
					<td colspan="2"><div align="center"><h1>INGRESAR NUEVA FACTURA</h1></div></td>
				</tr>
				<tr>
					<td width="80">Numero</td>
					<td><input type="text" name="numero" required/></td>
				</tr>
				<tr>
					<td>Tipo</td>
					<td>
						<select name="tipo" required>
							<option></option>
							<option value="33">AFECTA</option>
							<option value="34">EXENTA</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Cliente</td>
					<td><input type="text" id="cliente" name="cliente" onclick="openDialog('clienteDiv')" readonly="" required/></td>
				</tr>
				<tr>
					<td>Monto</td>
					<td><input type="text" name="monto" required/></td>
				</tr>
				<tr>
					<td>Emision</td>
					<td><input type="text" name="emision" id="emision" required/></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<div align="center">
							<button>
								INGRESAR FACTURA
							</button>
						</div>
						
					</td>
				</tr>
			</table>
			</form>
		</div>
		<!--||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
		<div id="clienteDiv">
			<table>
				<tr>
					<td>RUT/RAZÓN SOCIAL</td>
					<td><input type="text" name="rr" id="rr"></td>
					<td><button onclick="postClientes();">BUSCAR</button></td>
				</tr>
			</table>
			<div  id="clientTable"></div>
		</div>
		<!--||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
	</body>
</html>
