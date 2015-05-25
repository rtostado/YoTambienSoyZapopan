<?php

class SeccionCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/SeccionMdl.php';

		$this->modelo = new SeccionMdl();
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
		
		$seccion		= $this->valida->validaTexto($_POST['seccion']);
		$municipio_id 	= $_POST['municipio_id'];
		$resultado		= $this->modelo->Insertar($seccion, $municipio_id);
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
		$seccion_id = $this->valida->ValidaID($_POST['seccion_id']);
		$resultado = $this->modelo->Eliminar($seccion_id);
		if($resultado){
			echo "Se ha eliminado el registro: $seccion_id";
		}
	}

	public function Modificar()
	{
		
		$seccion_id		= $this->valida->validaID($_POST['seccion_id']);
		$seccion		= $this->valida->validaNombre($_POST['seccion']);
		$resultado	= $this->modelo->Modificar($seccion_id,$seccion);
		if($resultado){
			echo "Registro actualizado";
			$this->modelo->mostrar();
		}
	}


}

?>