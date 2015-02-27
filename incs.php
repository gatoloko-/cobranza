<?php
function incs($styles=FALSE, $jq=FALSE, $jqui=FALSE){
	echo "<link href='http://fonts.googleapis.com/css?family=Pathway+Gothic+One' rel='stylesheet' type='text/css'>";
	if($styles){
		echo '<link rel="stylesheet" type="text/css" href="styles/style.css" />';
	}
	if($jq){
		echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>';
	}
	if($jqui){
		echo '<link rel="stylesheet" href="js/ui/jquery-ui.min.css" />
				<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>';
	}
}
?>