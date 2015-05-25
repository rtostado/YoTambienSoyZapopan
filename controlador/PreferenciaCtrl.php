<?php

class PreferenciaCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/PreferenciaMdl.php';

		$this->modelo = new PreferenciaMdl();
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
		
		$preferencia = $this->valida->validaTexto($_POST['preferencia']);
		$resultado	 = $this->modelo->Insertar($preferencia);
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
		$preferencia_id = $this->valida->ValidaID($_POST['preferencia_id']);
		$resultado	= $this->modelo->Eliminar($preferencia_id);
		if($resultado){
			echo "Se ha eliminado el registro: $preferencia_id";
		}
	}

	public function Modificar()
	{
		
		$preferencia_id		= $this->valida->validaID($_POST['preferencia_id']);
		$preferencia	= $this->valida->validaTexto($_POST['manzana']);
		$resultado		= $this->modelo->Modificar($preferencia_id,$preferencia);
		if($resultado){
			echo "Registro actualizado";
			$this->modelo->mostrar();
		}
	}


}

?>