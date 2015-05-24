<?php

class EstadoCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/EstadoMdl.php';

		$this->modelo = new EstadoMdl();
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
		
		$estado		= $this->valida->validaNombre($_POST['estado']);
		$resultado	= $this->modelo->Insertar($estado);
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
		$estado_id = $this->valida->ValidaID($_POST['estado_id']);
		$resultado = $this->modelo->Eliminar($estado_id);
		if($resultado){
			echo "Se ha eliminado el registro: $estado_id";
		}
	}

	public function Modificar()
	{
		
		$estado_id		= $this->valida->validaID($_POST['estado_id']);
		$estado		= $this->valida->validaNombre($_POST['estado']);
		$resultado	= $this->modelo->Modificar($estado_id,$estado);
		if($resultado){
			echo "Registro actualizado";
			$this->modelo->mostrar();
		}
	}


}

?>