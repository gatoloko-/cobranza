$(document).ready(function(){
	$("#clienteDiv").dialog({
		width:400,
		height: 400,
		autoOpen: false,
		modal: true
	});
});
function openDialog(id){
	$("#"+id).dialog("open");
}
