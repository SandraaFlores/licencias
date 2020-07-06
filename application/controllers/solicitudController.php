<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SolicitudController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("solicitudModel");
		$this->load->library(array('form_validation','email','pagination'));

	}

	public function cargarVistas(){
		$this->load->view('templates/header');
		$this->load->view('solicitud/crear');
		$this->load->view('templates/footer');

	}

	public function insertar($id = null)
	{
		$data = array(
			'create_time' => date('d-m-Y'),
			'justification' => $this->input->post('justification'),
			'observation' => $this->input->post('observation'),
			'status' => 0,
			'user_copy' => $this->input->post('user_copy'),
			'authorization' => $this->input->post('authorization'),
			'users_id' => $this->input->post(''),
			'types_of_user_id' => $this->input->post('types_of_user'),
			'systems_id' => $this->input->post('system'),
			'approvals_id' => 0
		);
		if(empty($data)){
			$this->output->set_status_header(400);
		}else{
			$this->SolicitudModel->save($data);
			redirect('SolicitudController/cargarVistas');
		}
	}
}
?>
