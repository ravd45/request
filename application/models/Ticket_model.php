<?php

class Ticket_model extends CI_Model
{
  function __construct(){
    parent::__construct();
  }// Constructor()

  public function get_tickets()
  {
  	$str_query = "SELECT 
    t.solicitante, t.detalle, a.nombre, t.fechaPeticion, t.estado
FROM
    (SELECT 
      concat(u.nombre,' ', u.paterno,' ', u.materno) as solicitante, t.detalle, t.fechaPeticion, t.estado, t.idticket
    FROM
        ticket t
    INNER JOIN usuario u ON u.idusuario = t.solicitante) AS t
        INNER JOIN
    (SELECT 
        a.idasignacion,  concat(u.nombre,' ', u.paterno,' ', u.materno) as nombre, a.idticket
    FROM
        asignacion a
    INNER JOIN usuario u ON a.idusuario = u.idusuario) AS a ON t.idticket = a.idticket;
";
  	return $this->db->query($str_query)->result_array();
  }//get_tickets()

  public function set_tabla($solicitante, $detalle, $desarrollador, $fechaPeticion, $ruta_anexo)
  {
  	 $str_query = "call proye7nb_tickets.set_tabla({$solicitante}, '{$detalle}', {$desarrollador}, '{$fechaPeticion}', '{$ruta_anexo}')";
  return $this->db->query($str_query)->result_array();
  }// set_tabla()
} //Class {}