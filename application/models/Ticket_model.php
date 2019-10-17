<?php

class Ticket_model extends CI_Model
{
  function __construct(){
    parent::__construct();
  }// Constructor

  public function get_tickets()
  {
  	$str_query = "SELECT 
    t.nombre as solicitante, t.detalle, a.nombre, t.fechaPeticion, t.estado
FROM
    (SELECT 
      u.nombre, t.detalle, t.fechaPeticion, t.estado, t.idticket
    FROM
        ticket t
    INNER JOIN usuario u ON u.idusuario = t.solicitante) AS t
        INNER JOIN
    (SELECT 
        a.idasignacion, u.nombre, a.idticket
    FROM
        asignacion a
    INNER JOIN usuario u ON a.idusuario = u.idusuario) AS a ON t.idticket = a.idticket;
";
  	return $this->db->query($str_query)->result_array();
  }
} //Class