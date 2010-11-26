<?php

class Usuario extends Controller {

	public function index() {
		$this->load->view('template', array('vista' => 'sesion'));
	}

	public function acceder() {

		$this->load->library('session');
		$this->session->set_userdata('some_name', 'some_value');


switch($this->router->format) {
	case 'json':
		echo "JSON";
		break;
}



		$this->load->model('Usuarios', '', true);
		var_dump($this->Usuarios->obtenerPorNombreusuario('pablo'));
		//obtenerPorNombreusuario()
		$this->load->view('template', array('vista' => 'sesion'));
	}

	public function salir() {

	}

	public function comprobarCookie() {

	}
}

?>