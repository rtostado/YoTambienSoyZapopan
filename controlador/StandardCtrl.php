<?php 
define("FECHA_PATRON","/(([0-9]{2})\/([0-9]{2})\/([0-9]{4})){0,1}/");
define("NOMBRE_PATRON", "/(()[a-z]+)(\s?)([a-z]+))*/");
	class StandardCtrl{			
		protected $modelo;
		
		public function ValidaCorreo($correo){
		$ER = '/^[a-z|A-Z]([\w|.|-])*@([a-z|A-Z])+(.([a-z|A-Z]))+/';
		
		if(preg_match($ER, $correo)){
			return $correo;
		}
		else {
			die("Correo invalido...");	
		}	
	}
	
	public function ValidaID($ID){
		$ER = '/([0-9])+/';
		
		if(preg_match($ER, $ID)){
			return $ID;
		}
		else {
			die("ID invalido...");
		}
	}
	
	public function ValidaTexto($texto){
		$ER = '/(\w|\s|.|-|\d)+/';
		
		if (preg_match($ER, $texto)) {
			return $texto;
		} 
		else {
			die("texto invalido...");
		}
	}
	
	public function ValidaTelefono($telefono){
		$ER = '/^([0-9]){2}(([-|-|\s])([0-9]){2,3}){2,4}/';
		
		if (preg_match($ER, $telefono)) {
			return $telefono;
		}
		else {
			die("telefono invalido...");
		}
	}public function ValidaNombre($nombre){
		if(preg_match(NOMBRE_PATRON, $nombre)){
			return $nombre;
		}else{
			die("Nombre no valido");
		}
	}public function ValidaFecha($fecha){
		if(preg_match(FECHA_PATRON, $fecha)){
			return $fecha;
		}else{
			die("Fecha no valida");
		}
	}
		
		
		
		
		
		public static function logIn(){
			$id_usuario = htmlentities($_POST['usuario']);
			$password = htmlentities($_POST['password']);
			if(StandardCtrl::isLogged()){
				echo "estas loggeado";
				//StandardCtrl::logOut();
			}else{
				require_once 'Modelo/SesionMdl.php';
				$modelo = new SesionMdl();
				$resultado=$modelo->logIn($id_usuario, $password);
				if($resultado){
				require 'index.html';
				}
				
			}
			/*$_SESSION['nivel']=$nivel;
			$_SESSION['nombre_usuario']=$nombre;*/
		}
		
		public static function isLogged(){
			return isset($_SESSION['usuario']);
		}
		
		public static function logOut(){
			session_unset();
			session_destroy();
	
			setcookie(session_name(), '', time()-3600);
		}
		
		public static function esAdmin(){
			if(isset($_SESSION['status'])&& $_SESSION['status'] == 'administrador')
				return true;
			return false;
		}
		
		public static function esCabeza(){
			if(isset($_SESSION['status'])&& $_SESSION['status']== 'cabeza')
				return true;
			return false;
		}
		
		public static function crearLista(){
			$cabecera = file_get_contents('./Vista/cabecera.html');
			$pie = file_get_contents('./Vista/pie.html');
			$vista = $cabecera.$data['contenido'].$pie;
			echo $vista;
		}
		
		
}
	

?>