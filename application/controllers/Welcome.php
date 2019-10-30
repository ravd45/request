<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('Utilerias');
		$this->load->model('Login_Model');
		$this->load->model('Ticket_model');
		date_default_timezone_set('America/Mexico_City');
		session_start();
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{
			// Utilerias::imprimeConsola($_POST['x']);
		if (isset($_POST['x'])) {
			$_SESSION['nombre'] = '';
			$msj = 'Datos incorrectos';
			$response = array('datos' => $msj);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}else{

			$usuario = $this->input->post('usuario');
			$pass = $this->input->post('pass');

			$acceso = $this->Login_Model->iniciar_sesion($usuario, $pass);
			if (empty($acceso)) {
				$msj = 'Datos incorrectos';
				$response = array('datos' => $msj);
				Utilerias::enviaDataJson(200, $response, $this);
				exit;
			}else{
				$_SESSION['nombre'] =  $acceso[0]['nombre'].' '. $acceso[0]['paterno'].' '. $acceso[0]['materno'];
				$_SESSION['acceso'] = $acceso;
			// Utilerias::imprimeConsola($_SESSION['nombre']);
				$this->get_tabla($acceso);
			}
		}

	}//login

	public function get_tabla($acceso)
	{	
		
		$usuarios = $this->Ticket_model->get_usuarios();
		$_SESSION['id'] = $acceso[0]['idusuario'];
		$_SESSION['nombre'] =  $acceso[0]['nombre'].' '. $acceso[0]['paterno'].' '. $acceso[0]['materno'];
		$_SESSION['tipo_usuario'] =  $acceso[0]['tipo_usuario'];
		$tabla = $this->Ticket_model->get_tickets(0);
		$msj = '';
		$data['datos_usuario'] = $acceso;
		$data['usuarios'] = $usuarios;
		$data['tabla'] = $tabla;
		$str_view = $this->load->view("tickets/index", $data, TRUE);
		// Utilerias::imprimeConsola($_SESSION['id']);
		$response = array('datos' => $msj, 'str_view' => $str_view, 'tabla'=>$tabla);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;

	}

	public function set_tabla()
	{
		$desarrollador = $this->input->post('desarrollador');
		$detalle = $this->input->post('detalle');
		$solicitante = $this->input->post('solicitante');
		$anexo = $this->input->post('ruta_anexo');
		$idproyecto = $this->input->post('idproyecto');
		$fechaPeticion = date("Y-m-d H:i:s"); 

		$i = strlen($anexo);
		for ($j=$i; $j > 1 ; $j--) { 
			$extension = $anexo;
			$extension = substr($extension,$j);
			if (stristr($extension, '.')) {
				$extension_archivo = $extension;
				break;
			}
		} 

		$fecha = date_create();
		$idfecha = date_timestamp_get($fecha);

		$ruta_anexo = 'anexos/anexo_ticket_'.$idfecha.$extension_archivo;
		// Utilerias::imprimeConsola($ruta_anexo);
		$usuarios = $this->Ticket_model->get_usuarios();
		$llenaTabla = $this->Ticket_model->set_tabla($solicitante, $detalle, $desarrollador, $idproyecto, '', $fechaPeticion, $ruta_anexo);
		//$this->get_tabla($_SESSION['acceso']);
		$datos[0] = ['idusuario' => $solicitante];
		$data['datos_usuario'] = $datos;
		$data['usuarios'] = $usuarios;
		$data['tabla'] = $llenaTabla;
		//$data['tabla'] = $tabla;
		$str_view = $this->load->view("tickets/index", $data, TRUE);

		$response = array('str_view' => $str_view, 'tabla'=>$llenaTabla);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;

	}

	public function get_detalles()
	{
		$idticket = $this->input->post('idticket');
		$tabla = $this->Ticket_model->get_tickets($idticket);
		$observaciones = $this->Ticket_model->get_observacion($idticket);
		$data['tabla'] = $tabla;
		$data['observaciones'] = $observaciones;
		$str_view = $this->load->view("tickets/modal_detalles", $data, TRUE);
		$response = array('str_view' => $str_view);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	public function set_observacion()
	{
		$idticket = $this->input->post('id');
		$idusuario = $this->input->post('idusuario');
		$observacion = $this->input->post('observacion');
		$fechaPeticion = date("Y-m-d H:i:s");  
		$grabar_observacion = $this->Ticket_model->grabar_observacion($idticket, $observacion, $fechaPeticion,$idusuario);

		$tabla = $this->Ticket_model->get_tickets($idticket);
		$observaciones = $this->Ticket_model->get_observacion($idticket);
		$data['tabla'] = $tabla;
		$data['observaciones'] = $observaciones;
		$str_view = $this->load->view("tickets/modal_detalles", $data, TRUE);
		$response = array('str_view' => $str_view);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	public function set_proceso()
	{
		$estado = $this->input->post('estado');
		$idticket = $this->input->post('id');
		$fecha = date("Y-m-d H:i:s");  
		$actualizarEstado = $this->Ticket_model->actualizar_estado($estado, $idticket,$fecha);

		$tabla = $this->Ticket_model->get_tickets($idticket);
		$observaciones = $this->Ticket_model->get_observacion($idticket);
		$data['tabla'] = $tabla;
		$data['observaciones'] = $observaciones;
		$str_view = $this->load->view("tickets/modal_detalles", $data, TRUE);
		$response = array('str_view' => $str_view);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}

	public function get_proyectos()
	{
		$id = $this->input->post('id');

		$proyectos = $this->Ticket_model->get_proyectos($id);

		$select = '';

		foreach ($proyectos as $key => $value) {
			$select .= "<option value='{$value['idproyecto']}'>{$value['proyecto']}</option>";
		}
		$response = array('select' => $select);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;

	}
}
