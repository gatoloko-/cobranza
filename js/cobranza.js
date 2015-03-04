$(document).ready(function(){
	$("#comentariosDiv").dialog({
		width:700,
		height: 400,
		autoOpen: false,
		modal: true
	});
});
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
