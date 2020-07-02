<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class solicitudModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert($name, $first_name, $last_name, $departments, $system, $role,
						   $authorization, $justification, $observation, $user_copy, $types_of_user)
	{
		$consulta = $this->db->query("INSERT INTO users VALUES(NULL,'$name','$first_name','$last_name','$departments', '$role');");
		if ($consulta == true) {
			return true;
		} else {
			return false;
		}

	}

	public function save($data){
		$this->db->insert('licencias', $data);
	}

}

?>

