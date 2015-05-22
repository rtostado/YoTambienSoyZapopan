<?php
/**
 *
 */
class CalleMdl{
	public $calle_id;
	public $calle;
	public $bd_driver;

	function __construct(){
		require("database_config.inc");
		$this->bd_driver = new mysqli($host,$user,$pass,$bd);
		if($this->bd_driver->connect_error){
			die("No se pudo realizar la conexion");
		}else{
			echo "Conexion exitosa...";
		}
	}
	function Insertar($calle){
		$this->calle_id	 	= $calle_id;
		$this->calle		= $calle;
		$query = "INSERT INTO `Calle`(calle)
				VALUES('".$calle."');";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
	}
		return TRUE;
	}
	public function mostrar(){
		print "calle: $this->calle<br/>";
		
	}
	public function Eliminar($calle_id){
		$this->calle_id = $calle_id;
		$query 	= "DELETE FROM `Calle` WHERE calle_id= ".$calle_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	public function Modificar($calle_id, $calle){
		$this->calle_id	= $calle_id;
		$this->calle		= $calle;
		
		$query = "UPDATE `Calle` SET calle = '".$calle."' WHERE calle_id = ".$calle_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
}
?>