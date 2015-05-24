<?php

class MunicipioCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/MunicipioMdl.php';

		$this->modelo = new MunicipioMdl();
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
		
		$nombre			= $this->valida->validaNombre($_POST['nombre']);
		$estado_id 		= $_POST['estado_id'];
		$resultado		= $this->modelo->Insertar($nombre, $estado_id);
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
		$municipio_id = $this->valida->ValidaID($_POST['municipio_id']);
		$resultado = $this->modelo->Eliminar($municipio_id);
		if($resultado){
			echo "Se ha eliminado el registro: $municipio_id";
		}
	}

	public function Modificar()
	{
		
		$municipio_id		= $this->valida->validaID($_POST['municipio_id']);
		$nombre		= $this->valida->validaNombre($_POST['nombre']);
		$resultado	= $this->modelo->Modificar($municipio_id,$nombre);
		if($resultado){
			echo "Registro actualizado";
			$this->modelo->mostrar();
		}
	}


}

?>