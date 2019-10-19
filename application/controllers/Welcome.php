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
		
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{
		$usuario = $this->input->post('usuario');
		$pass = $this->input->post('pass');

		$acceso = $this->Login_Model->iniciar_sesion($usuario, $pass);
		if (empty($acceso)) {
			$msj = 'Datos incorrectos';
			$response = array('datos' => $msj);
			Utilerias::enviaDataJson(200, $response, $this);
			exit;
		}else{
			$this->get_tabla($acceso);
		}
		// Utilerias::imprimeConsola($tabla);
		
	}//login

	public function get_tabla($acceso)
	{
		$tabla = $this->Ticket_model->get_tickets();
		$msj = '';
		$data['datos_usuario'] = $acceso;
		$data['tabla'] = $tabla;
		$str_view = $this->load->view("tickets/index", $data, TRUE);

		$response = array('datos' => $msj, 'str_view' => $str_view, 'tabla'=>$tabla);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;

	}

	public function set_tabla()
	{
		$desarrollador = $this->input->post('desarrollador');
		$detalle = $this->input->post('detalle');
		$solicitante = $this->input->post('solicitante');
		$ruta_anexo = 'nada aún jejeje';
		$fechaPeticion = date("Y-m-d H:i:s");  
		$llenaTabla = $this->Ticket_model->set_tabla($solicitante, $detalle, $desarrollador, $fechaPeticion, $ruta_anexo);
		// Utilerias::imprimeConsola($llenaTabla);
		$datos[0] = ['idusuario' => $solicitante];
		$data['datos_usuario'] = $datos;
		$data['tabla'] = $llenaTabla;
		$str_view = $this->load->view("tickets/index", $data, TRUE);

		$response = array('str_view' => $str_view, 'tabla'=>$llenaTabla);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;

	}
}
