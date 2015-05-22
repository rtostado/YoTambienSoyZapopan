<?php

class DistritoFederalCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/DistritoFederalMdl.php';

		$this->modelo = new DistritoFederalMdl();
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
		
		$distrito		= $this->valida->validaNombre($_POST['distrito']);
		$municipio_id 	= $_POST['municipio_id'];
		$resultado		= $this->modelo->Insertar($distrito, $municipio_id);
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
		$distrito_federal_id = $this->valida->ValidaID($_POST['distrito_federal_id']);
		$resultado = $this->modelo->Eliminar($distrito_federal_id);
		if($resultado){
			echo "Se ha eliminado el registro: $distrito_federal_id";
		}
	}

	public function Modificar()
	{
		
		$distrito_federal_id		= $this->valida->validaID($_POST['distrito_federal_id']);
		$distrito		= $this->valida->validaNombre($_POST['distrito']);
		$resultado	= $this->modelo->Modificar($distrito_federal_id,$distrito);
		if($resultado){
			echo "Registro actualizado";
			$this->modelo->mostrar();
		}
	}


}

?>