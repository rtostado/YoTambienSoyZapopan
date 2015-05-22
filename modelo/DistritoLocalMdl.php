<?php
/**
 *
 */
class DistritoLocalMdl{
	public $distrito_local_id;
	public $distrito;
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
	function Insertar($distrito,$municipio_id){
		$this->distrito_local_id	= $distrito_local_id;
		$this->distrito		= $distrito;
		$this->municipio_id	= $municipio_id;
		$query = "INSERT INTO `Distrito_Local`(distrito)
				VALUES('".$distrito."');";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
	}
		return TRUE;
	}
	public function mostrar(){
		print "distrito: $this->distrito<br/>";
		
	}
	public function Eliminar($distrito_local_id){
		$this->distrito_local_id = $distrito_local_id;
		$query 	= "DELETE FROM `Distrito_Local` WHERE distrito_local_id= ".$distrito_local_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	public function Modificar($distrito_local_id, $distrito, $municipio_id){
		$this->distrito_local_id	= $distrito_local_id;
		$this->distrito		= $distrito;
		$this->municipio_id	= $municipio_id;

		$query = "UPDATE `Distrito_Local` SET distrito = '".$distrito."', municipio_id = ".$municipio_id." WHERE distrito_local_id = ".$distrito_local_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
}
?>