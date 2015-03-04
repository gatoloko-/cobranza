<?php
$f = $_POST['ff'];
$t = $_POST['tt'];
include 'classes/Login.php';
$L = new Login;
if(!$L->isUserLoggedIn()){
	header('Location: /index.php');
}
include 'comentario.php';
$comentario = new comentario;

$lista = $comentario->getComentarios($f, $t);
if(!empty($lista)){ ?>
	<table>
		<tr>
			<td>Comentario</td>
			<td><textarea name="com" id="com"></textarea></td>
			<td colspan="2" id="buttonTd"><button onclick="postComentario(<?php echo $f.", ".$t.", '".$_SESSION['user_name']."'"; ?>)">COMENTAR</button></td>
		</tr>
	</table>
			<div id="commentsFeed">
	<?php
	echo "<table class='comTable' id='comTable'>";
	foreach($lista as $data){ ?>
	<tr>
		<td valign="top" width="80"><?php echo $data['fecha']."<br/>".$data['usuario']; ?></td>
		<td valign="top"><?php echo $data['comentario']; ?></td>
	</tr>
<?php	}
	echo "</table>";
}else{
	echo "No se encontraron datos.";
}


?>