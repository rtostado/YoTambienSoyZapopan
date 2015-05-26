<?php
	/**
	 * 
	 */
	class SesionCtrl{
		public $modelo;
		
		  function isLogged(){
			return isset($_SESSION['usuario']);
		}
		
		  function logOut(){
			session_unset();
			session_destroy();
	
			setcookie(session_name(), '', time()-3600);
			require 'index.html';
		}
		
		function run(){
		switch ($_GET['act']) {
			case 'login':
				$this->logIn();				
				break;
			case 'logout':
				$this->logOut();
			break;
			default:				
				break;
			}
		}

	
		
		 
		  function logIn(){
			$id_usuario = htmlentities($_POST['nombre']);
			$password = htmlentities($_POST['password']);
			if(SesionCtrl::isLogged()){
				echo "estas loggeado";
				//StandardCtrl::logOut();
			}else{
				require_once 'modelo/SesionMdl.php';
				$modelo = new SesionMdl();
				$resultado=$modelo->logIn($id_usuario, $password);
				if($resultado){
				require 'indexAdmin.html';
				}
				
			}
			/*$_SESSION['nivel']=$nivel;
			$_SESSION['nombre_usuario']=$nombre;*/
		}
	
	}
	
?>