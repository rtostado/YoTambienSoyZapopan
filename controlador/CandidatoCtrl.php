<?php

class CandidatoCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/CandidatoMdl.php';

		$this->modelo = new CandidatoMdl();
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
		$apellidop =null;
		$apellidom =null;
		if(isset($_POST['apellidop']))
			$apellidop = $this->valida->ValidaNombre($_POST['apellidop']);
		if(isset($_POST['apellidom']))
			$apellidom = $this->valida->ValidaNombre($_POST['apellidom']);
		//$candidato_id		= $this->valida->validaID($_POST['candidato_id']);
		$nombre		= $this->valida->validaNombre($_POST['nombre']);
		$resultado	= $this->modelo->Insertar($candidato_id,$nombre,$apellidop, $apellidom);
		if($resultado){
			//require 'Vista/InsercionCorrecta.php';
			//require 'correo.php';
			$this->modelo->mostrar();
		}
		else {
			//require 'Vista/Error.html';
			echo "no se pudo";
		}
	}

	public function Eliminar()
	{
		$candidato_id = $this->valida->ValidaID($_POST['candidato_id']);
		$resultado = $this->modelo->Eliminar($ciudadano_id);
		if($resultado){
			echo "Se ha eliminado el registro: $candidato_id";
		}
	}

	public function Modificar()
	{
		$apellidop =null;
		$apellidom =null;
		if(isset($_POST['apellidop']))
			$apellidop = $this->valida->ValidaNombre($_POST['apellidop']);
		if(isset($_POST['apellidom']))
			$apellidom = $this->valida->ValidaNombre($_POST['apellidom']);
		$candidato_id		= $this->valida->validaID($_POST['candidato_id']);
		$nombre		= $this->valida->validaNombre($_POST['nombre']);
		$resultado	= $this->modelo->Modificar($candidato_id,$nombre,$apellidop, $apellidom);
		if($resultado){
			echo "Registro actualizado";
			$this->modelo->mostrar();
		}
	}


}

?>