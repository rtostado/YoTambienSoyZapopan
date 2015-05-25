<?php
/**
 *
 */
class StatusMdl{
	public $status_id;
	public $status;
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
	function Insertar($status){
		$this->status_id	= $status_id;
		$this->status		= $status;
		$query = "INSERT INTO `Status`(status)
				VALUES('".$status."');";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
	}
		return TRUE;
	}
	public function mostrar(){
		print "status: $this->status<br/>";
		
	}
	public function Eliminar($status_id){
		$this->status_id = $status_id;
		$query 	= "DELETE FROM `Status` WHERE status_id= ".$status_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	public function Modificar($status_id, $status){
		$this->status_id	= $status_id;
		$this->status		= $status;
		
		$query = "UPDATE `Status` SET status = '".$status."' WHERE status_id = ".$status_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
}
?>