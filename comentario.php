<?php
class comentario{
	private $id;
	private $comentario;
	private $factura;
	private $tipo;
	private $user;
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	
	public function setComentario($comentario){
		$this->comentario = $comentario;
	}
	public function getComentario(){
		return $this->comentario;
	}
	
	public function setFactura($factura){
		$this->factura = $factura;
	}
	public function getFactura(){
		return $this->factura;
	}
	
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function getTipo(){
		return $this->tipo;
	}
	
	public function setUser($user){
		$this->user = $user;
	}
	public function getUser(){
		return $this->user;
	}
	
	private function con(){
		include 'link/link.php';
		return $con;
	}
	
	public function newComentario($comentario, $factura, $tipo, $user){
		$myCon =$this->con();
		$q = "CALL newComentario('".$comentario."', '".$factura."', ".$tipo.", '".$user."')";
		$myCon->query($q);
		$result = $myCon->affected_rows;
		if($result==1){
			return TRUE;
		}
	}
}
?>