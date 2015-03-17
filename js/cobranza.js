$(document).ready(function(){
	$("#comentariosDiv, #rebajaDiv").dialog({
		width:700,
		height: 400,
		autoOpen: false,
		modal: true
	});
});

function openDialog(id){
	$("#"+id).dialog('open');
}
function showComentarios(factura, tipo){
	$("#comentariosDiv").dialog("open");
	
	f = factura;
	t = tipo;
    url = "list-comentarios.php";
 
	// Send the data using post
	var posting = $.post( url, { ff: factura, tt: tipo } );
	 
	// Put the results in a div
	posting.done(function( data ) {
		$("#comentariosDiv").empty();
		$("#comentariosDiv").append(data);
	});
}
function postComentario(f, t, user){
	var comentario = $("#com").val();
	if(comentario != ""){
	    url = "nuevo-comentario.php";
	 
		// Send the data using post
		var posting = $.post( url, { ff: f, tt: t, cc: comentario, u: user } );
		 
		// Put the results in a div
		posting.done(function( data ) {
			console.log(data);
			$("#comTable").prepend(data);
		});
	}else{
		alert('Debe ingresar un comentario!');
	}
}

function showRebaja(numero, tipo){
	$("#rebajaDiv").dialog("open");
	$("#rebajaDiv").empty();
	$("#rebajaDiv").append(
		'<script>\
			$("#cierre").datepicker({\
				dateFormat: "yy-mm-dd",\
				monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Augosto", "Septiembre", "Octubre", "Novienbre", "Diciembre" ],\
				dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],\
				dayNamesShort:[ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],\
				dayNamesMin:[ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ]\
			});\
		</script>\
		<form method="POST" enctype="multipart/form-data" action="rebaja.php">\
				<input type="hidden" name="numero" id="numero" value="'+ numero +'">\
				<input type="hidden" name="tipo" id="tipo" value="'+ tipo +'">\
				<table>\
					<tr>\
						<td>DOCUMENTO DE RESPALDO</td>\
						<td>\
							<input type="file" name="doc" id="doc" required/>\
						</td>\
					</tr>\
					<tr>\
						<td>TIPO DE CIERRE</td>\
						<td>\
							<input type="radio" name="tc" value="1" required>TOTAL<br />\
							<input type="radio" name="tc" value="0" required>PARCIAL\
						</td>\
					</tr>\
					<tr>\
						<td>FECHA DE PAGO</td>\
						<td><input type="text" name="cierre" id="cierre" required/></td>\
					</tr>\
					<tr>\
						<td>DETALLES DE REBAJA</td>\
						<td><textarea name="comRebaja" id="comRebaja" required></textarea></td>\
					</tr>\
					<tr>\
						<td></td>\
						<td><button>REBAJAR DOCUMENTO</button></td>\
					</tr>\
				</table>\
			</form>'
	);
	
}
