<?php
/**
 *
 */
class SeccionMdl{
	public $seccion_id;
	public $seccion;
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
	function Insertar($seccion,$municipio_id){
		$this->seccion_id	= $seccion_id;
		$this->seccion		= $seccion;
		$this->municipio_id	= $municipio_id;
		$query = "INSERT INTO `Seccion`(seccion)
				VALUES('".$seccion."');";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
	}
		return TRUE;
	}
	public function mostrar(){
		print "seccion: $this->seccion<br/>";
		
	}
	public function Eliminar($seccion_id){
		$this->seccion_id = $seccion_id;
		$query 	= "DELETE FROM `Seccion` WHERE seccion_id= ".$seccion_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	public function Modificar($seccion_id, $seccion, $municipio_id){
		$this->seccion_id	= $seccion_id;
		$this->seccion		= $seccion;
		$this->municipio_id	= $municipio_id;

		$query = "UPDATE `Seccion` SET seccion = '".$seccion."', municipio_id = ".$municipio_id." WHERE seccion_id = ".$seccion_id.";";
		$result = $this->bd_driver->query($query);
		if($this->bd_driver->error){
			die("Pelas");
		}
		return TRUE;
	}
	/*function listar(){
		$colonias = FALSE;
		$result = $this->bd_driver->query("SELECT * FROM seccion");
		if($result!=FALSE){
			$colonias=array();
			while($row!=$result->fetch_assoc()){
				$colonias[]=$row;
				echo json_encode($alumnos);
				//$row=$result->fetch_assoc();
			}
		}
		return $secciones;
	}*/
	public function consulta(){
		
		$consulta = "SELECT `seccion`,`municipio_id` FROM `Seccion`";
		$resultado = $this->bd_driver->query($consulta);
		
		while ($row = $resultado->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
		//echo json_encode($alumnos);
		
	}
}
?>