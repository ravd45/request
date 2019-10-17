<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('Utilerias');
		$this->load->model('Login_Model');
		$this->load->model('Ticket_model');
		
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
			$str_view = '';
		}else{
			$tabla = $this->Ticket_model->get_tickets();
			$msj = '';
			$data['datos_usuario'] = $acceso;
			$data['tabla'] = $tabla;
			$str_view = $this->load->view("tickets/index", $data, TRUE);
		 
		}
		// Utilerias::imprimeConsola($tabla);
		$response = array('datos' => $msj, 'str_view' => $str_view, 'tabla'=>$tabla);
		Utilerias::enviaDataJson(200, $response, $this);
		exit;
	}
}
