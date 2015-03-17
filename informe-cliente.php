<?php
include 'classes/Login.php';
$L = new Login;
if(!$L->isUserLoggedIn()){
	header('Location: /index.php');
}
$c = $_POST['cliente'];

include 'factura.php';
$factura = new factura;
$eCliente = $factura->getClienteStatics($c);
include 'cliente.php';
$cliente = new cliente;
$dataCliente = $cliente->getData($c);
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
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
	      google.load("visualization", "1.1", {packages:["bar"]});
	      google.setOnLoadCallback(drawChart);
	      function drawChart() {
	        var data = google.visualization.arrayToDataTable([
	          ['AÑO', '30 DÍAS', '60 DÍAS', '90 DÍAS'],
	          <?php foreach($eCliente as $data){ ?>
	          ['<?php echo $data['ano']; ?>', <?php echo ($data['30_dias']/($data['total']/100)); ?>, <?php echo ($data['60_dias']/($data['total']/100)); ?>, <?php echo ($data['90_dias']/($data['total']/100)); ?>],
	          <?php } ?>
	        ]);
	
	        var options = {
	          chart: {
	            title: 'COMPORTAMIENTO DE PAGO <?php echo $cliente->getRazon(); ?>',
	            subtitle: '% de plazos de pago.',
	          }
	        };
	
	        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
	
	        chart.draw(data, options);
	      }
	    </script>
	</head>

	<body>
		<header>
			<nav>
				<?php include 'nav.php'; ?>
			</nav>
		</header>
		<div id="columnchart_material" style="width: 900px; height: 500px;"></div>
	</body>
</html>
