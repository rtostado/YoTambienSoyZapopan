<?php
/**
 *
 */
class PreferenciaMdl{
	public $preferencia_id;
	public $preferencia;
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
	function Insertar($preferencia){
		$this->preferencia_id	= $preferencia_id;
		$this->preferencia		= $preferencia;
		$query = "INSERT INTO `Preferencia`(preferencia)
				VALUES('".$preferencia."');";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
	}
		return TRUE;
	}
	public function mostrar(){
		print "Preferencia: $this->preferencia<br/>";
		
	}
	public function Eliminar($preferencia_id){
		$this->preferencia_id = $preferencia_id;
		$query 	= "DELETE FROM `Preferencia` WHERE preferencia_id= ".$preferencia_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	public function Modificar($preferencia_id, $preferencia){
		$this->preferencia_id	= $preferencia_id;
		$this->preferencia		= $preferencia;
		
		$query = "UPDATE `Preferencia` SET preferencia = '".$preferencia."' WHERE preferencia_id = ".$preferencia_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
}
?>