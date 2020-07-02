<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class solicitudController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("solicitudModel");
		$this->load->library("session");

	}

	public function index(){
		$this->load->view('solicitud/crear');
	}

	public function cargarVistas(){
		$this->load->view('templates/header');
		$this->load->view('solicitud/crear');
		$this->load->view('templates/footer');

	}

	public function insert()
	{
		if ($this->input->post("submit")) {
			$insert = $this->solicitudModel->insert(
				$this->input->post('name'),
				$this->input->post('first_name'),
				$this->input->post('last_name'),
				$this->input->post('departments'),
				$this->input->post('system'),
				$this->input->post('role'),
				$this->input->post('justification'),
				$this->input->post('authorization'),
				$this->input->post('user_copy'),
				$this->input->post('types_of_user'),
				$this->input->post('observation')
			);
		}
		if ($insert == true) {
			$this->session->set_flashdata('correcto', 'Registro añadido correctamente');
		} else {
			$this->session->set_flashdata('incorrecto', 'Registro añadido correctamente');
		}
		redirect(base_url());
	}

	public function isert($id = null)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'departments' => $this->input->post('departments'),
			'system' => $this->input->post('system'),
			'role' => $this->input->post('role'),
			'authorization' => $this->input->post('authorization'),
			'justification' => $this->input->post('justification'),
			'observation' => $this->input->post('observation'),
			'status' => 0,
			'user_copy' => $this->input->post('user_copy'),
			'types_of_user' => $this->input->post('types_of_user'),
			'create_time' => date('d-m-Y')
		);
		if ($id) {
			$this->db->where('id', $id);
			$this->db->update('licencias', $data);
		} else {
			$this->db->insert('licencias', $data);

		}
		$this->solicitudModel->save($data);
		redirect('solicitudController/index');
	}



}
?>
