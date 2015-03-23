<?
class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function createUser($data)
	{
		unset($data['verify_password']);
		$data['password'] = sha1($data['password']);

		$user_exists = $this->db->query("SELECT username FROM user WHERE username = '".$data['username']."'");

		if($user_exists->num_rows() > 0)
			return false;

		if($this->db->insert('user', $data))
			return true;
		
		return false;
	}
}