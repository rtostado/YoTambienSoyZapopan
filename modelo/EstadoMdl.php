<?php
/**
 *
 */
class EstadoMdl{
	public $estado_id;
	public $nombre;
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
	function Insertar($nombre){
		$this->estado_id	= $estado_id;
		$this->nombre		= $nombre;
		$query = "INSERT INTO `Estado`(nombre)
				VALUES('".$nombre."');";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
	}
		return TRUE;
	}
	public function mostrar(){
		print "estado: $this->nombre<br/>";
		
	}
	public function Eliminar($estado_id){
		$this->estado_id = $estado_id;
		$query 	= "DELETE FROM `Estado` WHERE estado_id= ".$estado_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	public function Modificar($estado_id, $nombre){
		$this->estado_id	= $estado_id;
		$this->nombre		= $nombre;
		
		$query = "UPDATE `Estado` SET nombre = '".$nombre."' WHERE estado_id = ".$estado_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
}
?>