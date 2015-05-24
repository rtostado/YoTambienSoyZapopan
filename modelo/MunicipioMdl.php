<?php
/**
 *
 */
class MunicipioMdl{
	public $municipio_id;
	public $nombre;
	public $estado_id;
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
	function Insertar($nombre,$estado_id){
		$this->municipio_id	= $municipio_id;
		$this->nombre		= $nombre;
		$this->estado_id	= $estado_id;
		$query = "INSERT INTO `Municipio`(nombre)
				VALUES('".$nombre."');";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
	}
		return TRUE;
	}
	public function mostrar(){
		print "nombre: $this->nombre<br/>";
		
	}
	public function Eliminar($municipio_id){
		$this->municipio_id = $municipio_id;
		$query 	= "DELETE FROM `Municipio` WHERE municipio_id= ".$municipio_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	public function Modificar($municipio_id, $nombre, $estado_id){
		$this->municipio_id	= $municipio_id;
		$this->nombre		= $nombre;
		$this->estado_id	= $estado_id;

		$query = "UPDATE `Municipio` SET nombre = '".$nombre."', estado_id = ".$estado_id." WHERE municipio_id = ".$municipio_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
}
?>