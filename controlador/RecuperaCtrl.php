<?php

class RecuperaCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
		require 'Validar.php';
		require 'modelo/RecuperaMdl.php';

		$this->modelo = new RecuperaMdl();
		$this->valida = new Validar();
	}

	function run(){
		$this->recuperar();
	}

	private function recuperar()
	{
		$usuario  = null;

		$usuario	= $this->valida->validaNombre($_POST['usuario']);
		$resultado	= $this->modelo->recuperar($usuario);
		if($resultado){
			//require 'Vista/InsercionCorrecta.php';
			require 'recuperacionExitosa.html';
		}
		else {
			//require 'Vista/Error.html';
			echo "no se pudo";
		}
	}
}

?>