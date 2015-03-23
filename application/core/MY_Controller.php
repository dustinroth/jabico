<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(empty($this->data))
			$this->data = new stdClass();

		$this->load->database();
		$this->load->library('auth');
		$this->data->app_title = "Jabico 2015 Coding Test";
	}

	protected function _output_view($data, $template)
	{
		$this->load->view('inc/header.inc.php', $data);
		$this->load->view($template, $data);
		$this->load->view('inc/footer.inc.php', $data);
	}
}
