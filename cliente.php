<?php
class cliente{
	private $rut;
	private $razon;
	private $direccion;
	private $telefono;
	private $correo;
	private $contacto;
	
	public function setRut($rut){
		$this->rut = $rut;
	}
	public function getRut(){
		return $this->rut;
	}
	
	public function setRazon($razon){
		$this->razon = $razon;
	}
	public function getRazon(){
		return $this->razon;
	}
	
	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
	public function getDireccion(){
		return $this->direccion;
	}
	
	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}
	public function getTelefono(){
		return $this->telefono;
	}
	
	public function setCorreo($correo){
		$this->correo = $correo;
	}
	public function getCorreo(){
		return $this->correo;
	}
	
	public function setContacto($contacto){
		$this->contacto = $contacto;
	}
	public function getContacto(){
		return $this->contacto;
	}
	private function con(){
		include 'link/link.php';
		return $con;
	}
	
	public function newCliente($rut, $razon, $direccion="--", $telefono="--", $correo="--", $contacto="--"){
		$myCon =$this->con();
		$q = "CALL newCliente('".$rut."', '".$razon."', '".$direccion."', '".$telefono."', '".$correo."', '".$contacto."')";
		$myCon->query($q);
		$result = $myCon->affected_rows;
		if($result==1){
			return TRUE;
		}
	}
	public function getData($rut){
		$data = array();
		$myCon = $this->con();
		$q = "CALL getDataCliente('".$rut."')";
		$resultado = $myCon->query($q);
		$result = $resultado->num_rows;
		if($result>0){
			$data = $resultado->fetch_array(MYSQLI_ASSOC);
			$this->rut = $data['rut'];
			$this->razon = $data['razon'];
			$this->direccion = $data['direccion'];
			$this->telefono = $data['telefono'];
			$this->correo = $data['correo'];
			$this->contacto = $data['contacto'];
			return $data;
		}
		
	}
	public function edit($rut, $razon, $direccion, $telefono, $correo, $contacto){
		$myCon= $this->con();
		$q = "CALL editCliente('".$rut."', '".$razon."', '".$direccion."', '".$telefono."', '".$correo."', '".$contacto."')";
		if($myCon->query($q)){
			return TRUE;
		}
	}
}
?>