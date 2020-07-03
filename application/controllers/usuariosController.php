<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("usuariosModel");
		$this->load->library("session");
	}

	public function nuevo(){
		$this->load->view('usuarios/crear');
		$this->load->view('templates/footer');
	}

	public function insert()
	{
		if ($this->input->post("submit")) {
			$insert = $this->usuariosModel->insert(
				1,
				$this->input->post('name'),
				$this->input->post('first_name'),
				$this->input->post('last_name'),
				$this->input->post('user'),
				$this->input->post('password'),
				1,
				1
			);
		}
		if ($insert == true) {
			$this->session->set_flashdata('correcto', 'Registro añadido correctamente');
		} else {
			$this->session->set_flashdata('incorrecto', 'Registro añadido correctamente');
		}
		redirect(base_url());
	}

	public function insertar()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'user' => $this->input->post('user'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'departments_id' => $this->input->post('departments'),
			'roles_id' => 1,
			'create_time' => date('Y-m-d H:i:s')
		);
		$this->usuariosModel->save($data);
		redirect('UsuariosController/nuevo');
	}


	//Login
	public function verifica(){
		$user = $this->input->post('user');
		$password = $this->input->post('password');

		if($this->usuariosModel->login($user,$password))
			redirect('InicioController/');
		else{

			redirect('/');
		}
	}

}
?>
