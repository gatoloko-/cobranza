$(document).ready(function(){
	$("#clienteDiv").dialog({
		width:700,
		height: 400,
		autoOpen: false,
		modal: true
	});
});
function openDialog(id){
	$("#"+id).dialog("open");
}

function postClientes(){

    term = $("#rr").val();
    url = "list-clientes.php";
 
  // Send the data using post
  var posting = $.post( url, { t: term } );
 
  // Put the results in a div
  posting.done(function( data ) {
  	$("#clientTable").empty();
  	$("#clientTable").append(data);
  });

}

function fillCliente(rut){
	$("#cliente").val(rut);
	$("#clientTable").empty();
	$("#clienteDiv").dialog("close");
}
