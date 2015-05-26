<?php
/**
 *
 */
class PersonaMdl{

	public $persona_id;
	public $nombre;
	public $apellidop;
	public $apellidom;
	public $correo;
	public $telefono;
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
	function Insertar($nombre,$apellidop,$apellidom,$correo,$telefono){
		//$this->persona_id	= $persona_id;
		$this->nombre		= $nombre;
		$this->apellidop	= $apellidop;
		$this->apellidom 	= $apellidom;
		$this->correo 		= $correo;
		$this->telefono 	= $telefono;

		$query = "INSERT INTO `Persona`(nombre,apellidop,apellidom,telefono,correo)
				VALUES('".$nombre."','".$apellidop."','".$apellidom."','".$telefono."','".$correo."');";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
		}
		return TRUE;
	}
	public function mostrar(){
		print "ID: $this->persona_id<br/>";
		print "Nombre: $this->nombre<br/>";
		print "Asociacion colonos: $this->apellidop<br/>";
		print "Presidente colonos: $this->apellidom<br/>";
	}
	public function Eliminar($persona_id){
		$this->persona_id = $persona_id;
		echo "$this->persona_id";
		$query 	= "DELETE FROM `Persona` WHERE persona_id= ".$this->persona_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	public function Modificar($persona_id, $nombre, $apellidop, $apellidom,$correo,$telefono){
		$this->persona_id	= $persona_id;
		$this->nombre		= $nombre;
		$this->apellidop	= $apellidop;
		$this->apellidom 	= $apellidom;
		$this->correo 		= $correo;
		$this->telefono 	= $telefono;

		$query = "UPDATE `Persona` SET nombre = '".$nombre."',apellidop = '".$apellidop."',
					apellidom = '".$apellidom."', telefono = '".$telefono."', correo = '".$correo."' WHERE persona_id = ".$persona_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
}
?>