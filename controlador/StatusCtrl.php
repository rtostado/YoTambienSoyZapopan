<?php

class StatusCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/StatusMdl.php';

		$this->modelo = new StatusMdl();
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
		
		$status = $this->valida->validaTexto($_POST['status']);
		$resultado	 = $this->modelo->Insertar($status);
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
		$status_id = $this->valida->ValidaID($_POST['status_id']);
		$resultado	= $this->modelo->Eliminar($status_id);
		if($resultado){
			echo "Se ha eliminado el registro: $status_id";
		}
	}

	public function Modificar()
	{
		
		$status_id		= $this->valida->validaID($_POST['status_id']);
		$status	= $this->valida->validaTexto($_POST['status']);
		$resultado		= $this->modelo->Modificar($status_id,$status);
		if($resultado){
			echo "Registro actualizado";
			$this->modelo->mostrar();
		}
	}


}

?>