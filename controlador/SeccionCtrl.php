<?php
require_once 'Controlador/StandardCtrl.php';
class SeccionCtrl extends StandardCtrl{
	private $modelo;
	private $valida;


	//constructor
	function __construct(){
	//	require 'Validar.php';
		require 'modelo/SeccionMdl.php';

		$this->modelo = new SeccionMdl();
	//	$this->valida = new Validar();
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
	
	function listar(){
		$colonias = $this->modelo->listar();
		$vista = file_get_contents("./Vista/Seccion.html");
		$inicio_fila = strrpos($vista,'<tr>');
		$final_fila = strrpos($vista,'</tr>') + 5;
		$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);
		$filas = '';
		foreach ($secciones as $row) {
			$new_fila = $fila;
			$diccionario = array(
			'{seccion}' => $row['seccion'],
			'{municipio}' => $row['municipio']);
			$new_fila = strtr($new_fila,$diccionario);
			$filas .= $new_fila;
		}
		$vista = str_replace($fila, $filas, $vista);
		$data = array('contenido' => $vista);
		$this->crearLista($data);
		}
	}




?>