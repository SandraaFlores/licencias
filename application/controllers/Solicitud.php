<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view('solicitud/crear');
	}

	public function cargarVistas(){
		$this->load->view('templates/header');
		$this->load->view('templates/footer');

	}

}
?>
