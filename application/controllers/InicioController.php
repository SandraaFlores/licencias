  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class InicioController extends CI_Controller {
  	public function __construct()
  	{
      parent::__construct();

        //Función para validar si ya inicio sesión
        if(!is_logged_in()){
  			     redirect('/');
  		  }
    }

    public function index(){

      //Aquí se debe retornar la página principal cuando el usuario ya esté loggueado
      echo "Ya estoy loggueado";
    }

  }
