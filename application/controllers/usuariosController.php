<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuariosController extends CI_Controller {
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
				$this->input->post('name'),
				$this->input->post('first_name'),
				$this->input->post('last_name'),
				$this->input->post('user'),
				$this->input->post('password'),
				$this->input->post('departments'),
				$this->input->post('role')
			);
		}
		if ($insert == true) {
			$this->session->set_flashdata('correcto', 'Registro añadido correctamente');
		} else {
			$this->session->set_flashdata('incorrecto', 'Registro añadido correctamente');
		}
		redirect(base_url());
	}

	public function listar(){
		$this->load->view('usuarios/listar');
		$this->load->view('templates/footer');
	}

	public function inseert($id = null)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'user' => $this->input->post('user'),
			'password' => $this->input->post('password'),
			'departments' => $this->input->post('departments'),
			'role' => $this->input->post('role'),
			'create_time' => date('d-m-Y')
		);
		$this->solicitudModel->save($data);
		redirect('usuariosController/index');
	}



}
?>
