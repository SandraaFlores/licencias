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
