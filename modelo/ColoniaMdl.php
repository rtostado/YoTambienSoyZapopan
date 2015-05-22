<?php
/**
 *
 */
class ColoniaMdl{
	public $colonia_id;
	public $colonia;
	public $municipio_id;
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
	function Insertar($colonia,$municipio_id){
		$this->colonia_id	= $colonia_id;
		$this->colonia		= $colonia;
		$this->municipio_id	= $municipio_id;
		$query = "INSERT INTO `Colonia`(colonia)
				VALUES('".$colonia."');";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
	}
		return TRUE;
	}
	public function mostrar(){
		print "colonia: $this->colonia<br/>";
		
	}
	public function Eliminar($colonia_id){
		$this->colonia_id = $colonia_id;
		$query 	= "DELETE FROM `Colonia` WHERE colonia_id= ".$colonia_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	public function Modificar($colonia_id, $colonia, $municipio_id){
		$this->colonia_id	= $colonia_id;
		$this->colonia		= $colonia;
		$this->municipio_id	= $municipio_id;

		$query = "UPDATE `Colonia` SET colonia = '".$colonia."', municipio_id = ".$municipio_id." WHERE colonia_id = ".$colonia_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
}
?>