<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert($id,$name, $first_name, $last_name, $user, $password, $departments, $role)
	{
		$consulta = $this->db->query("INSERT INTO users VALUES($id,'$name','$first_name','$last_name','$user','$password','$departments','$role');");
		if ($consulta == true) {
			return true;
		} else {
			return false;
		}

	}

	public function save($data){
		$this->db->insert('users', $data);

	}

}

?>
