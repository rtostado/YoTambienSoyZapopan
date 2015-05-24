<?php

class ManzanaCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/ManzanaMdl.php';

		$this->modelo = new ManzanaMdl();
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
		
		$num_manzana = $this->valida->validaTexto($_POST['num_manzana']);
		$resultado	 = $this->modelo->Insertar($num_manzana);
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
		$manzana_id = $this->valida->ValidaID($_POST['manzana_id']);
		$resultado	= $this->modelo->Eliminar($manzana_id);
		if($resultado){
			echo "Se ha eliminado el registro: $manzana_id";
		}
	}

	public function Modificar()
	{
		
		$manzana_id		= $this->valida->validaID($_POST['manzana_id']);
		$num_manzana	= $this->valida->validaTexto($_POST['manzana']);
		$resultado		= $this->modelo->Modificar($manzana_id,$num_manzana);
		if($resultado){
			echo "Registro actualizado";
			$this->modelo->mostrar();
		}
	}


}

?>