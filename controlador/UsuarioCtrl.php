<?php

class UsuarioCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/UsuarioMdl.php';

		$this->modelo = new UsuarioMdl();
		$this->valida = new Validar();
	}

	function run(){
		switch ($_POST['act']) {
			case 'Insertar':
				$this->Insertar();
				break;
			case 'Eliminar':
				$this->Eliminar();
				break;
			case 'Modificar':
				$this->Modificar();
				break;
			default:
			break;
		}
	}

	private function Insertar()
	{
		$apellidop  = null;
		$apellidom  = null;
		$correo 	= null;
		$password	= null;

		if(isset($_POST['apellidop']))
			$apellidop = $this->valida->ValidaNombre($_POST['apellidop']);
		if(isset($_POST['apellidom']))
			$apellidom = $this->valida->ValidaNombre($_POST['apellidom']);
		if(isset($_POST['correo']))
			$correo = $this->valida->ValidaCorreo($_POST['correo']);
		if(isset($_POST['password']))
			$password = $this->valida->ValidaTexto($_POST['password']);
		//$usuario_id		= $this->valida->validaID($_POST['usuario_id']);
		$nombre		= $this->valida->validaNombre($_POST['nombre']);
		$resultado	= $this->modelo->Insertar($nombre, $apellidop, $apellidom, $correo, $password);
		if($resultado){
			//require 'Vista/InsercionCorrecta.php';
			require 'correo.php';
			$this->modelo->mostrar();
		}
		else {
			//require 'Vista/Error.html';
			echo "no se pudo";
		}
	}

	public function Eliminar()
	{
		$usuario_id = $this->valida->ValidaID($_POST['usuario_id']);
		$resultado = $this->modelo->Eliminar($usuario_id);
		if($resultado){
			echo "Se ha eliminado el registro: $usuario_id";
		}
	}

	public function Modificar()
	{
		$apellidop 	= null;
		$apellidom 	= null;
		$correo 	= null;
		$password	= null;

		if(isset($_POST['apellidop']))
			$apellidop = $this->valida->ValidaNombre($_POST['apellidop']);
		if(isset($_POST['apellidom']))
			$apellidom = $this->valida->ValidaNombre($_POST['apellidom']);
		if(isset($_POST['correo']))
			$apellidop = $this->valida->ValidaCorreo($_POST['correo']);
		if(isset($_POST['password']))
			$password = $this->valida->ValidaTexto($_POST['password']);
		$usuario_id		= $this->valida->validaID($_POST['usuario_id']);
		$nombre		= $this->valida->validaNombre($_POST['nombre']);
		$resultado	= $this->modelo->Modificar($usuario_id, $nombre, $apellidop, $apellidom, $correo, $password);
		if($resultado){
			echo "Registro actualizado";
			$this->modelo->mostrar();
		}
	}


}

?>