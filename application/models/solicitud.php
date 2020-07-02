<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitud extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}

	public function guardar($titulo, $descripcion, $prioridad, $id=null){
		$data = array(
			'titulo' => $titulo,
			'descripcion' => $descripcion,
			'prioridad' => $prioridad
		);
		if($id){
			$this->db->where('id', $id);
			$this->db->update('informes', $data);
		}else{
			$this->db->insert('informes', $data);
		}
	}
}
?>

