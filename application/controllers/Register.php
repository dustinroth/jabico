<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('verify_password', 'Verify Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		
		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('register');
        }
        else
        {
        	// Add email function when set up on server.
   			//$this->load->library('email');

			// $this->email->from('no-reply@dustinroth.com', 'Dustin Roth');
			// $this->email->to($this->input-post('email'));
			// $this->email->bcc('dustinroth@gmail.com');

			// $this->email->subject('Jabico Coding Test Registration');
			// $this->email->message("Thank you for registering. Please log in <a href='http://dustinroth.com?token=\"".$this->token_helper->genToken()."\">here.</a>");

			// $this->email->send();
        	if($this->user_model->createUser($this->input->post()))
        		$this->data->success = TRUE;
        	else
            	$this->data->success = FALSE;

            $this->load->view('register-success');
        }
		
	}

}
