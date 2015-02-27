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
		<?php include 'incs.php'; incs(true); ?>
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<?php if(isset($_GET['c'])){ ?>
			<script>
				alert('El cliente ha sido ingresada de forma correcta');
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
			<form method="post" action="eClientes.php">
				<table>
					<tr>
						<td colspan="2"><div align="center"><h1>EDITAR CLIENTE</h1></div></td>
					</tr>
					<tr>
						<td>RUT</td>
						<td><input type="text" name="rut" required/></td>
					</tr>
					<tr>
						<td width="80"></td>
						<td>
							<button>EDITAR CLIENTE</button>
						</td>
					</tr>
				</table>
			</form>
			<form action="nuevo-cliente.php" method="post">
			<table>
				<tr>
					<td colspan="2"><div align="center"><h1>INGRESAR NUEVO CLIENTE</h1></div></td>
				</tr>
				<tr>
					<td>Rut</td>
					<td><input type="text" name="rut" required/></td>
				</tr>
				<tr>
					<td>Razón social</td>
					<td><input type="text" name="rs" required/></td>
				</tr>
				<tr>
					<td>Dirección</td>
					<td><input type="text" name="direccion" required/></td>
				</tr>
				<tr>
					<td>Teléfono</td>
					<td><input type="text" name="telefono"  required/></td>
				</tr>
				<tr>
					<td>Correo</td>
					<td><input type="email" name="correo" required/></td>
				</tr>
				<tr>
					<td>Contacto</td>
					<td><input type="text" name="contacto" required/></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<div align="center">
							<button>
								EDITAR CLIENTE
							</button>
						</div>
						
					</td>
				</tr>
			</table>
			</form>
		</div>
		
	</body>
</html>
