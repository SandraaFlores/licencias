<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SolicitudModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function save($data){
		$this->db->insert('requests', $data);
	}

}

?>

