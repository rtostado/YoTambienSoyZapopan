<?php
/**
 *
 */
class RecuperaMdl{

	public $usuario;
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

	public function enviaCorreo(){
		$mensaje = "Estimado  Usuario:\n
Su contraseña ha sido recuperada con exito:\n\n
 usuario: $this->usuario\n
password: $this->password\n\n
quedamos a sus ordenes para cualquier duda o aclaracion\n\n
\t\tATTE.\n
\tYo Tambien Soy Zapopan A.C.";
		mail($this->usuario,'Recuperacion de Contraseña',$mensaje);
	}

	function recuperar($usuario){
		//$this->usuario_id	= $usuario_id;
		$this->usuario		= $usuario;
		//$this->password 	= $password;

		$query = "SELECT password FROM `Usuario` WHERE correo = '".$usuario."';";

		$result = $this->bd_driver->query($query);

		if($this->bd_driver->error){
			die("<br/>Pelas puto...");
		}
		else{
			$password 		= mysqli_fetch_array($result);
			$this->password = $password['password'];
			$this->enviaCorreo();

		}
		return TRUE;
	}
}
?>