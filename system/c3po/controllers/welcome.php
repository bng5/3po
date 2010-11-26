<?php

class Welcome extends Controller {

	/*function Welcome() {
		parent::Controller();
	}*/

	function index() {
		$data = array('vista' => 'index');
		$this->load->view('template', $data);
	}
}
