<?php
/**
 *
 */
class ManzanaMdl{
	public $manzana_id;
	public $num_manzana;
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
	function Insertar($num_manzana){
		$this->manzana_id	= $manzana_id;
		$this->num_manzana		= $num_manzana;
		$query = "INSERT INTO `Manzana`(num_manzana)
				VALUES('".$num_manzana."');";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
	}
		return TRUE;
	}
	public function mostrar(){
		print "Manzana: $this->num_manzana<br/>";
		
	}
	public function Eliminar($manzana_id){
		$this->manzana_id = $manzana_id;
		$query 	= "DELETE FROM `Manzana` WHERE manzana_id= ".$manzana_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	public function Modificar($manzana_id, $num_manzana){
		$this->manzana_id	= $manzana_id;
		$this->num_manzana		= $num_manzana;
		
		$query = "UPDATE `Manzana` SET num_manzana = '".$num_manzana."' WHERE manzana_id = ".$manzana_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
}
?>