<?php
	/**
	 * 
	 */
	class SesionMdl{
		private $usuario;
		private $pass;
		private $bd_driver;
		private $nombre;
		private $status;
		
		function __construct(){
			require("database_config.inc");
			$this->bd_driver = new mysqli($host,$user,$pass,$bd);
			if($this->bd_driver->connect_error){
				die("No se pudo realizar la conexion");
			}else{
				echo "Conexion exitosa...";
			}
		}
		
		function logIn($usuario, $pass){
			
			$query = "SELECT usuario_id FROM `Usuario` WHERE correo = '".$usuario."';";
			$result = $this->bd_driver->query($query);
			$num_usuario = mysqli_num_rows($result);
			if($num_usuario!=0){
				$query = "SELECT * FROM `Usuario` WHERE correo='".$usuario."';";
				$result = $this->bd_driver->query($query);
				$num_clave = mysqli_num_rows($result);
				
				if($num_clave!=0){
					$registro = mysqli_fetch_array($result);
					$this->usuario=$usuario;
					$this->pass=$pass;
					$this->nombre=$registro['nombre'];
					//$this->status=$registro['status'];
					$_SESSION['usuario']=$usuario;
					$_SESSION['password']=$pass;
					$_SESSION['nombre']=$this->nombre;
					//$_SESSION['status']=$this->status;
					/*echo $this->usuario;
					echo $this->pass;
					echo $this->status;*/
					return TRUE;
				//	$_SESSION['nombre_usuario']=$nombre;
				}else{
					//echo "<script>alert('La contrase\u00f1a del usuario no es correcta.'); window.location.href=\"..\Vista\Login.php\"</script>";
					echo "Nombre de usuario o contraseña no valido";
					require 'Vistas/login.html';
				}
			}else{
				 //echo"<script>alert('El usuario no existe.'); window.location.href=\"Vista\Login.php\"</script>";
				 echo "Nombre de usuario o contraseña no valido";
				 require 'Vistas/login.html';
			}
			
		}
		
	}
	
	

?>