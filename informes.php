<?php
include 'classes/Login.php';
$L = new Login;
if(!$L->isUserLoggedIn()){
	header('Location: /index.php');
}


if(isset($_POST['fecha'])){
	$d = $_POST['fecha'];
}elseif(!isset($_POST['fecha'])){
	$d = date("Y");
}
include 'factura.php';
$dueBills = new factura;
$factura = $dueBills->getFacturasPlazo($d, 0)
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

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<?php include 'incs.php'; incs(true, true, true); ?>
	</head>

	<body>
		<header>
			<nav>
				<?php include 'nav.php' ?>
			</nav>
		</header>
		<table>
			<tr>
				<td><span>AÑO</span></td>
				<td>
					<form id="yForm" action="informes.php" method="post">
						<select name="fecha" id="year">
							<option></option>
							<?php
								$years = $dueBills->getFacturaYears();
								foreach ($years as $key) { ?>
									<option value="<?php echo $key['vencimiento'] ?>-01-01"><?php echo $key['vencimiento'] ?></option>
								<?php }
							?>
						</select>
						<script>
							$("#year").change(function(){
								console.log($("#year").val());
								$("#yForm").submit();
							})
						</script>
					</form>
				</td>
			</tr>
			<tr>
				<td><span>CLIENTE</span></td>
				<td>
					<form action="informe-cliente.php" method="post">
						<input type="text" name="cliente" id="cliente" required="" />
						<button>VER COMPORTAMIENTO</button>
					</form>
				</td>
			</tr>
		</table>
		
		
		<div class="number">
			<h2>AÑO</h2>
			<span class="cifras"><?php echo date("Y", strtotime($d)) ?></span>
		</div>
		<div class="number">
			<h2>FACTURAS POR COBRAR</h2>
			<span class="cifras"><?php echo count($factura); ?></span>
		</div>
		<div class="number">
			<h2>90 DÍAS O MÁS</h2>
			<span class="cifras">
				<?php
					$count = 0;
					foreach($factura as $v){
						
						if($v['vencimiento']>=90){
							$count++;
						}
					}
					echo $count;
				 ?>
			</span>
		</div>
		
		<div class="number">
			<h2>30 a 60 DÍAS</h2>
			<span class="cifras">
				<?php
					$count = 0;
					foreach($factura as $v){
						
						if($v['vencimiento']>=30 AND $v['vencimiento']<90){
							$count++;
						}
					}
					echo $count;
				 ?>
			</span>
		</div>
		<div class="number">
			<h2>MENOS DE 30 DÍAS</h2>
			<span class="cifras">
				<?php
					$count = 0;
					foreach($factura as $v){
						
						if($v['vencimiento']<30){
							$count++;
						}
					}
					echo $count;
				 ?>
			</span>
		</div>
		
		<!--<script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Galaxy', 'Distance', 'Brightness'],
          ['Canis Major Dwarf', 8000, 23.3],
          ['Sagittarius Dwarf', 24000, 4.5],
          ['Ursa Major II Dwarf', 30000, 14.3],
          ['Lg. Magellanic Cloud', 50000, 0.9],
          ['Bootes I', 60000, 13.1]
        ]);

        var options = {
          width: 900,
          chart: {
            title: 'Nearby galaxies',
            subtitle: 'distance on the left, brightness on the right'
          },
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            y: {
              distance: {label: 'parsecs'}, // Left y-axis.
              brightness: {side: 'right', label: 'apparent magnitude'} // Right y-axis.
            }
          }
        };

      var chart = new google.charts.Bar(document.getElementById('dual_y_div'));
      chart.draw(data, options);
    };
    </script>
<div id="dual_y_div" style="width: 900px; height: 500px;"></div>-->
	</body>
</html>
