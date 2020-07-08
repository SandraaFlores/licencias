<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SolicitudModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function save($data)
	{
		$this->db->insert('requests', $data);
	}

	public function ver()
	{
		$consulta = $this->db->query("SELECT r.id, u.name, u.first_name, u.last_name, r.create_time FROM requests r INNER JOIN users u ON (r.USERS_id = u.id);");
		return $consulta->result();
	}

	public function getUser($id){
		$consulta = $this->db->query("SELECT * FROM requests WHERE id = $id ");
		return $consulta->result();

	}

}


