<?php
/**
 *
 */
class CandidatoMdl{
	public $candidato_id;
	public $nombre;
	public $apellidop;
	public $apellidom;
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
	function Insertar($candidato_id,$nombre,$apellidop,$apellidom){
		$this->candidato_id	= $candidato_id;
		$this->nombre		= $nombre;
		$this->apellidop	= $apellidop;
		$this->apellidom 	= $apellidom;
		$query = "INSERT INTO `Candidato`(nombre,apellidop,apellidom)
				VALUES('".$nombre."','".$apellidop."','".$apellidom."');";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
	}
		return TRUE;
	}
	public function mostrar(){
		print "ID: $this->candidato_id<br/>";
		print "Nombre: $this->nombre<br/>";
		print "Asociacion colonos: $this->apellidop<br/>";
		print "Presidente colonos: $this->apellidom<br/>";
	}
	public function Eliminar($candidato_id){
		$this->candidato_id = $candidato_id;
		echo "$this->candidato_id";
		$query 	= "DELETE FROM `Candidato` WHERE candidato_id= ".$this->candidato_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	public function Modificar($candidato_id, $nombre, $apellidop, $apellidom){
		$this->candidato_id	= $candidato_id;
		$this->nombre		= $nombre;
		$this->apellidop	= $apellidop;
		$this->apellidom 	= $apellidom;
		$query = "UPDATE `Candidato` SET nombre = '".$nombre."',apellidop = '".$apellidop."',
					apellidom = '".$apellidom."' WHERE candidato_id = ".$candidato_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
}
?>