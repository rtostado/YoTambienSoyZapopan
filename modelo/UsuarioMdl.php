<?php
/**
 *
 */
class UsuarioMdl{
	public $usuario_id;
	public $nombre;
	public $apellidop;
	public $apellidom;
	public $correo;
	public $password;
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
	function Insertar($nombre,$apellidop,$apellidom,$correo,$password){
		//$this->usuario_id	= $usuario_id;
		$this->nombre		= $nombre;
		$this->apellidop	= $apellidop;
		$this->apellidom 	= $apellidom;
		$this->correo 		= $correo;
		$this->password 	= $password;

		$query = "INSERT INTO `Usuario`(nombre,apellidop,apellidom,correo,password)
				VALUES('".$nombre."','".$apellidop."','".$apellidom."','".$correo."','".$password."');";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
	}
		return TRUE;
	}
	public function mostrar(){
		print "ID: $this->usuario_id<br/>";
		print "Nombre: $this->nombre<br/>";
		print "Asociacion colonos: $this->apellidop<br/>";
		print "Presidente colonos: $this->apellidom<br/>";
	}
	public function Eliminar($usuario_id){
		$this->usuario_id = $usuario_id;
		echo "$this->usuario_id";
		$query 	= "DELETE FROM `Usuario` WHERE usuario_id= ".$this->usuario_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	public function Modificar($usuario_id, $nombre, $apellidop, $apellidom,$correo,$password){
		$this->usuario_id	= $usuario_id;
		$this->nombre		= $nombre;
		$this->apellidop	= $apellidop;
		$this->apellidom 	= $apellidom;
		$this->correo 		= $correo;
		$this->password 	= $password;

		$query = "UPDATE `Candidato` SET nombre = '".$nombre."',apellidop = '".$apellidop."',
					apellidom = '".$apellidom."', correo = '".$correo."', password = '".$password."' WHERE usuario_id = ".$usuario_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
}
?>