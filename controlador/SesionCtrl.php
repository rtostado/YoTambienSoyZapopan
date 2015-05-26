<?php
	/**
	 * 
	 */
	class SesionCtrl{
		protected $modelo;
		
		public static function isLogged(){
			return isset($_SESSION['usuario']);
		}
		
		public static function logOut(){
			session_unset();
			session_destroy();
	
			setcookie(session_name(), '', time()-3600);
		}
		
		function run(){
		switch ($_GET['act']) {
			case 'Login':
				$this->logIn();				
				break;
			default:				
				break;
		}
	}
		
		 
		 public static function logIn(){
			$id_usuario = htmlentities($_POST['usuario']);
			$password = htmlentities($_POST['password']);
			if(SesionCtrl::isLogged()){
				echo "estas loggeado";
				SesionCtrl::logOut();
			}else{
				require_once 'Modelo/SesionMdl.php';
				$modelo = new SesionMdl();
				$resultado=$modelo->logIn($id_usuario, $password);
				if($resultado){
				require '/MVCyoZapopan/index.php';
				}
				
			}
			/*$_SESSION['nivel']=$nivel;
			$_SESSION['nombre_usuario']=$nombre;*/
		}
	
	}
	
?>