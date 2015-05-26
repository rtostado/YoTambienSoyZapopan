<?php

class PersonaCtrl{
	private $modelo;
	private $valida;
	private $mail;
	

	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/PersonaMdl.php';

		$this->modelo = new PersonaMdl();
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
		$telefono	= null;

		if(isset($_POST['apellidop']))
			$apellidop = $this->valida->ValidaNombre($_POST['apellidop']);
		if(isset($_POST['apellidom']))
			$apellidom = $this->valida->ValidaNombre($_POST['apellidom']);
		if(isset($_POST['correo']))
			$correo = $this->valida->ValidaCorreo($_POST['correo']);
		if(isset($_POST['telefono']))
			$telefono = $this->valida->ValidaTexto($_POST['telefono']);
		//$persona_id		= $this->valida->validaID($_POST['persona_id']);
		$nombre		= $this->valida->validaNombre($_POST['nombre']);
		$resultado	= $this->modelo->Insertar($nombre, $apellidop, $apellidom, $correo, $telefono);
		if($resultado){
			
			require 'Vistas/InsercionCorrecta.php';
			//require 'correo.php';
			//print "correo: $correo<br/>";
			//$this->modelo->mostrar();
		}
		else {
			//require 'Vista/Error.html';
			echo "no se pudo";
		}
	}

	public function Eliminar()
	{
		$persona_id = $this->valida->ValidaID($_POST['persona_id']);
		$resultado = $this->modelo->Eliminar($persona_id);
		if($resultado){
			echo "Se ha eliminado el registro: $persona_id";
		}
	}

	public function Modificar()
	{
		$apellidop 	= null;
		$apellidom 	= null;
		$correo 	= null;
		$telefono	= null;

		if(isset($_POST['apellidop']))
			$apellidop = $this->valida->ValidaNombre($_POST['apellidop']);
		if(isset($_POST['apellidom']))
			$apellidom = $this->valida->ValidaNombre($_POST['apellidom']);
		if(isset($_POST['correo']))
			$apellidop = $this->valida->ValidaCorreo($_POST['correo']);
		if(isset($_POST['telefono']))
			$telefono = $this->valida->ValidaTexto($_POST['telefono']);
		$persona_id		= $this->valida->validaID($_POST['persona_id']);
		$nombre		= $this->valida->validaNombre($_POST['nombre']);
		$resultado	= $this->modelo->Modificar($persona_id, $nombre, $apellidop, $apellidom, $telefono, $correo);
		if($resultado){
			echo "Registro actualizado";
			$this->modelo->mostrar();
		}
	}


}

?>