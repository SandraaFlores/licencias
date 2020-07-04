<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("UsuariosModel");
		$this->load->library(array('form_validation','email','pagination', 'session'));
		$this->load->helper("users/users_validation");
	}

	public function nuevo()
	{
		$this->load->view('usuarios/crear');
		$this->load->view('templates/footer');
	}

	public function listar()
	{
		$data = array('usuarios' => $this->UsuariosModel->ver());
		$this->load->view('usuarios/listar', $data);
		$this->load->view('templates/footer');
	}

	public function insertar()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'user' => $this->input->post('user'),
			'password' => $this->input->post('password'),
			'departments_id' => $this->input->post('departments'),
			'role' => $this->input->post('role'),
			'create_time' => date('Y-m-d H:i:s')
		);
		if(empty($data)){
			$this->output->set_status_header(400);
		}else{
			$this->UsuariosModel->save($data);
			redirect('UsuariosController/nuevo');
		}
	}

	public function delete(){
		$idUsuario = $this->input->post('id', true);
		if(empty($idUsuario)){
			$this->output
				->set_status_header(400)
				->set_output(json_encode(array('msg'=>'El id no puede estar vació')));
		}else{
			$this->UsuariosModel->delete($idUsuario);
			$this->output
				->set_status_header(200);
		}
	}
}

?>

