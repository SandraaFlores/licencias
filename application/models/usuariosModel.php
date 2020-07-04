<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function save($data)
	{
		$this->db->insert('users', $data);
	}

	public function getUsers()
	{
		$sql = $this->db->get('users');
		return $sql->result();
	}

	public function ver()
	{
		$consulta = $this->db->query("SELECT u.id, u.name, u.first_name, u.last_name, d.name as departamento, u.role FROM users u INNER JOIN departments d ON (u.DEPARTMENTS_id = d.id);");
		return $consulta->result();
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
	}

	public function login($nombre, $password)
    {
			$this->db->join('roles r', 'r.id = users.roles_id');
		 $query = $this->db->get_where('users', array('user' => $nombre));
		 if($query->num_rows() == 1)
		 {
				 $row=$query->row();
				 if(password_verify($password, $row->password))
				 {
						 $data=array('user_data'=>array(
								 'user'=>$row->user,
								 'r.name'=>$row->nombre
								 )
						 );
						 $this->session->set_userdata($data);
						 return true;
				 }
		 }
		 $this->session->unset_userdata('user_data');
		 return false;
    }

}

?>
