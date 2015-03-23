<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login', $this->data);
	}

	public function sign_in()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->auth->check_login($username, $password);
		if($user)
		{
			$this->session->set_userdata('username', $user->username);
			$this->session->set_userdata('user_id',  $user->id);
			redirect('home');
		}
		else
		{
			$this->data->message = "Username/Password combination<br>was not found in the database.";
			$this->index();
		}
			
	}

	public function logout()
	{
		$this->auth->logout();
		redirect('home');
	}
}
