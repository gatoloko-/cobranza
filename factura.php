<?php
class factura{
	private $numero;
	private $tipo;
	private $cliente;
	private $monto;
	private $emision;
	
	
	public function setNumero($numero){
		$this->numero = $numero;
	}
	public function getNumero(){
		return $this->numero;
	}
	
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function getTipo(){
		return $this->tipo;
	}
	
	public function setCliente($cliente){
		$this->cliente = $cliente;
	}
	public function getCliente(){
		return $this->cliente;
	}
	
	public function setMonto($monto){
		$this->monto = $monto;
	}
	public function getMonto(){
		return $this->monto;
	}
	
	public function setEmision($emision){
		$this->emision = $emision;
	}
	public function getEmision(){
		return $this->emision;
	}
	
	private function con(){
		include 'link/link.php';
		return $con;
	}
	
	public function newFactura($numero, $tipo, $cliente, $monto, $emision, $user){
		$myCon = $this->con();
		$q = "CALL newFactura(".$numero.", ".$tipo.", '".$cliente."', ".$monto.", '".$emision."', '".$user."')";
		$myCon->query($q);
		$result = $myCon->affected_rows;
		if($result==1){
			return TRUE;
		}
	}
	
	public function getData($numero, $tipo){
		$myCon = $this->con();
		$q = "CALL getDataFactura(".$numero.", ".$tipo.")";
		$resultado = $myCon->query($q);
		$result = $resultado->num_rows;
		if($result>0){
			$data = $resultado->fetch_array(MYSQLI_ASSOC);
			$this->numero = $data['numero'];
			$this->tipo = $data['tipo'];
			$this->cliente = $data['cliente'];
			$this->monto = $data['monto'];
			$this->emision = $data['fecha'];
			return $data;
		}else{
			return FALSE;
		}
		
	}
	public function edit($numero, $tipo, $cliente, $monto, $emision, $user){
		$myCon= $this->con();
		$q = "CALL editFactura(".$numero.", ".$tipo.", '".$cliente."', ".$monto.", '".$emision."', '".$user."')";
		if($myCon->query($q)){
			return TRUE;
		}
	}
	public function dueBillsPlazo($v=30){
		$data = array();
		$myCon = $this->con();
		$q = "CALL getDueBillsPlazo(".$v.")";
		$resultado = $myCon->query($q);
		$result = $resultado->num_rows;
		if($result>=1){
			while($row = $resultado->fetch_array(MYSQLI_ASSOC)){
				$data[] = $row;
			}
			return $data;
		}
	}
}

?>