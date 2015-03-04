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
	
	
	public function getComentarios($factura, $tipo){
		$data = array();
		$myCon = $this->con();
		$q = "CALL getComentarios(".$factura.", ".$tipo.")";
		$resultado = $myCon->query($q);
		try {
		    $result = $resultado->num_rows;
		} catch (Exception $e) {
		    return NULL;
		}
		if($result>=1){
			while($row = $resultado->fetch_array(MYSQLI_ASSOC)){
				$data[] = $row;
			}
			return $data;
		}
	}
	public function getSingleComentario($id){
		$data = array();
		$myCon = $this->con();
		$q = "CALL getSingleComment(".$id.")";
		$resultado = $myCon->query($q);
		$result = $resultado->num_rows;

		if($result>=1){
			$data = $resultado->fetch_array(MYSQLI_ASSOC);
			return $data;
		}
	}
	public function newComentario($comentario, $factura, $tipo, $user){
		$myCon =$this->con();
		$q = "INSERT INTO comentarios(fecha, comentario, factura, tipo, usuario) VALUES(NOW(), '".$comentario."', '".$factura."', ".$tipo.", '".$user."')";
		$myCon->query($q);
		$newCommentId = $myCon->insert_id;
		$result = $myCon->affected_rows;

		if($result==1){
			$comment = $this->getSingleComentario($newCommentId);
			return $comment;
		}
	}
}
?>