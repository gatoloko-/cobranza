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
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<?php if(isset($_GET['f'])){ ?>
			<script>
				alert('La factura ha sido ingresada de forma correcta');
			</script>
		<?php } ?>
	</head>

	<body>
		<header>
			<nav>
				<?php include 'nav.php'; ?>
			</nav>
		</header>
	</body>
</html>
