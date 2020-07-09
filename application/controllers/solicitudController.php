<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SolicitudController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("SolicitudModel");
		$this->load->library(array('form_validation', 'email', 'pagination'));

	}

	public function cargarVistas()
	{
		$this->load->view('templates/header');
		$this->load->view('solicitud/crear');
		$success = $this->session->flashdata("success");
		$this->load->view('templates/footer', array('success' => $success));
	}

	public function correo(){
		$this->load->view('solicitud/correo');
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
		if (empty($data)) {
			$this->output->set_status_header(400);
		} else {
			$this->SolicitudModel->save($data);
			$this->session->set_flashdata("success", true);
			$this->sendEmail();
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

	public function show($id = 0)
	{
		$data = array('vista' => $this->SolicitudModel->getUser($id)[0]);
		$this->load->view('solicitud/show', $data);
	}

	public function sendEmails()
	{
		mail('sandraa.flores.c@gmail.com', 'Email Test', 'Testing the email class.');
		/*$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_port' => 465,
			'mailtype' => 'text',
			'smtp_user' => 'sandraa.flores.c@gmail.com',
			'smtp_pass' => 'Ellie8181',
			'charset' => 'utf-8',
			'wordwrap' => true,
			'priority' => 1

		);

		$this->email->initialize($config);

		$this->email->from('sandraa.flores.c@gmail.com', 'Sandra Flores');
		$this->email->to('leojfl999@gmail.com');
		$this->email->cc('san.florees@gmail.com');
		$this->email->bcc('san.florees@gmail.com');
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		if($this->email->send()){
			 echo 'Email enviado correctamente';
		}else{
			echo 'No se ha enviado el email';
		}*/

	}

	public function sendEmail(){
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_user' => 'sandraa.flores.c@gmail.com', //Su Correo de Gmail Aqui
			'smtp_pass' => 'Ellie8181', // Su Password de Gmail aqui
			'smtp_port' => 587,
			'smtp_crypto' => 'tls',
			'mailtype' => 'html',
			'wordwrap' => TRUE,
			'charset' => 'utf-8'
		);
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from('sandraa.flores.c@gmail.com', 'Sandra Flores');
		$this->email->subject('Email Test');
		$vista = $this->load->view('solicitud/correo', '', true);
		$this->email->message($vista);
		$this->email->to('san.florees@gmail.com');
		$this->email->cc('leojfl999@gmail.com');

		if($this->email->send()){
			echo "enviado<br/>";
			echo $this->email->print_debugger(array('headers'));
		}else {
			echo "fallo <br/>";
			echo "error: ".$this->email->print_debugger(array('headers'));
		}
	}
}

