<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('Utilerias');
		$this->load->model('Login_Model');
		date_default_timezone_set('America/Mexico_City');
		session_start();
	}
	
	public function index()
	{
		$this->load->view('Login');
	}
}