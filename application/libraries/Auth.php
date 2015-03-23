<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
	
	public $user_table = 'user';
	public $login_page = 'login';
	
	private $CI;
	
	public function __construct() {
		@session_start();
		$this->CI =& get_instance();
	}
	
	public function require_login() {
		if( $this->is_logged_in() )
			return true;
		else
			redirect($this->login_page);
	}
	
	public function is_logged_in() {
		if( empty($this->CI->session->userdata('username')) )
			return false;
		return true;
	}
	
	public function is_adminUser()
	{
		if( $this->CI->session->userdata('user_id') == 1 )
			return true;
		else
			return false;
	}
	
	public function logout() {
		$this->CI->session->unset_userdata('username');
		@session_destroy();
	}
    
    public function check_login( $username, $password ) {
    	$q = $this->CI->db
    		->where('username', $username)
    		->where('password', sha1($password))
    		->limit(1)
    		->get($this->user_table);
    		
    	if( $q->num_rows() == 1 )
    		return $q->row();
		else
    		return false;
    }
}