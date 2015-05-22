<?php

class CalleCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/CalleMdl.php';

		$this->modelo = new CalleMdl();
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
		
		$calle		= $this->valida->validaNombre($_POST['calle']);
		$resultado	= $this->modelo->Insertar($calle);
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
		$calle_id = $this->valida->ValidaID($_POST['calle_id']);
		$resultado = $this->modelo->Eliminar($calle_id);
		if($resultado){
			echo "Se ha eliminado el registro: $calle_id";
		}
	}

	public function Modificar()
	{
		
		$calle_id		= $this->valida->validaID($_POST['calle_id']);
		$calle		= $this->valida->validaNombre($_POST['calle']);
		$resultado	= $this->modelo->Modificar($calle_id,$calle);
		if($resultado){
			echo "Registro actualizado";
			$this->modelo->mostrar();
		}
	}


}

?>