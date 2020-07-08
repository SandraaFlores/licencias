<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SolicitudController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("SolicitudModel");
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
			'create_time' => date('Y-m-d H:i:s'),
			'justification' => $this->input->post('justification'),
			'observation' => $this->input->post('observation'),
			'status' => 0,
			'user_copy' => $this->input->post('user_copy'),
			'authorization' => $this->input->post('authorizations'),
			'users_id' => intval(getId()),
			'types_of_users_id' => $this->input->post('types_of_user'),
			'systems_id' => $this->input->post('system'),
			'approvals_id' => 1
		);
		if(empty($data)){
			$this->output->set_status_header(400);
		}else{
			$this->SolicitudModel->save($data);
			redirect('SolicitudController/cargarVistas');
		}
	}

	public function listar()
	{
		$this->load->view('templates/header');
		$data = array('solicitudes' => $this->SolicitudModel->ver());
		$this->load->view('solicitud/listar', $data);
		$this->load->view('templates/footer');
	}

	public function show($id = 0){
		$data = array('vista'=> $this->SolicitudModel->getUser($id)[0]);
		$this->load->view('solicitud/show', $data);
	}
}

