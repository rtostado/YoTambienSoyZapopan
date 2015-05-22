<?php

class ColoniaCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/ColoniaMdl.php';

		$this->modelo = new ColoniaMdl();
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
		
		$colonia		= $this->valida->validaNombre($_POST['colonia']);
		$municipio_id 	= $_POST['municipio_id'];
		$resultado		= $this->modelo->Insertar($colonia, $municipio_id);
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
		$colonia_id = $this->valida->ValidaID($_POST['colonia_id']);
		$resultado = $this->modelo->Eliminar($colonia_id);
		if($resultado){
			echo "Se ha eliminado el registro: $colonia_id";
		}
	}

	public function Modificar()
	{
		
		$colonia_id		= $this->valida->validaID($_POST['colonia_id']);
		$colonia		= $this->valida->validaNombre($_POST['colonia']);
		$resultado	= $this->modelo->Modificar($colonia_id,$colonia);
		if($resultado){
			echo "Registro actualizado";
			$this->modelo->mostrar();
		}
	}


}

?>