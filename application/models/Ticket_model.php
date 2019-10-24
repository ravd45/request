<?php

class Ticket_model extends CI_Model
{
	function __construct(){
		parent::__construct();
  }// Constructor()

  public function get_tickets($idticket)
  {

  	if ($idticket != 0) {
  		$where = " WHERE t.idticket = {$idticket}";
  	}else {
  		$where = "";
  	}

  	$str_query = "SELECT 
  	t.idticket, t.solicitante, t.detalle, a.nombre, t.fechaPeticion, t.fechaInicio,  t.fechaTermino, t.estado
  	FROM
  	(SELECT 
  	concat(u.nombre,' ', u.paterno,' ', u.materno) as solicitante, t.detalle, t.fechaPeticion,t.fechaInicio,  t.fechaTermino, t.estado, t.idticket
  	FROM
  	ticket t
  	INNER JOIN usuario u ON u.idusuario = t.solicitante) AS t
  	INNER JOIN
  	(SELECT 
  	a.idasignacion,  concat(u.nombre,' ', u.paterno,' ', u.materno) as nombre, a.idticket
  	FROM
  	asignacion a
  	INNER JOIN usuario u ON a.idusuario = u.idusuario) AS a ON t.idticket = a.idticket
  	{$where};
  	";
  	return $this->db->query($str_query)->result_array();
  }//get_tickets()

  public function set_tabla($solicitante, $detalle, $desarrollador, $fechaPeticion, $ruta_anexo)
  {
  	$str_query = "call proye7nb_tickets.set_tabla({$solicitante}, '{$detalle}', {$desarrollador}, '{$fechaPeticion}', '{$ruta_anexo}')";
  	return $this->db->query($str_query)->result_array();
  }// set_tabla()

  public function get_observacion($idticket)
  {
  	$str_query = "SELECT 
  	u.idusuario,
  	CONCAT(u.nombre, ' ', u.paterno, ' ', u.materno) AS observador,
  	o.observacion,
  	o.fecha
  	FROM
  	observaciones o
  	INNER JOIN
  	usuario u ON u.idusuario = o.idusuario
  	WHERE
  	o.idticket = {$idticket};";

  	return $this->db->query($str_query)->result_array();
  }//detalles_ticket

  public function grabar_observacion($idticket, $observacion, $fechaPeticion,$idusuario)
  {
  	$data = array (
  		array('idticket' => $idticket, 'observacion' => $observacion, 'fecha' => $fechaPeticion, 'idusuario'=>$idusuario)
  	);
  // echo "<pre>";print_r($data); 
  	$this->db->insert_batch('observaciones',$data);
  }//grabar_observacion
  public function actualizar_estado($estado, $id, $fecha)
  {

  	$this->db->trans_start();
  	if ($estado == 1 || $estado == 0) {
  		$data = array(
  			'fechaInicio' => $fecha,
  			'estado' => $estado
  		);
  	}else{
  		$data = array(
  			'fechaTermino' => $fecha,
  			'estado' => $estado
  		);
  	}

  	$this->db->where('idticket', $id);
  	$this->db->update('ticket', $data);
  	$this->db->trans_complete();
  	if ($this->db->trans_status() === FALSE)
  	{
  		return false;
  	}else{
  		return true;
  	}
  }//actualizar_estado

  public function get_usuarios()
  {
  	$str_query = "SELECT * FROM usuario";
  		return $this->db->query($str_query)->result_array();
  }//get_usuarios
} //Class {}