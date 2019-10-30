<?php

class Login_Model extends CI_Model
{
  function __construct(){
    parent::__construct();
  }

  public function iniciar_sesion($usuario, $pass)
  {
  	$str_query = "SELECT u.*, s.tipo_usuario from seguridad s
		 INNER JOIN usuario u ON u.idusuario = s.idusuario
  	 WHERE s.usuario = '{$usuario}' and s.password = md5('{$pass}'); ";

  	return $this->db->query($str_query)->result_array();
  }
} //class
