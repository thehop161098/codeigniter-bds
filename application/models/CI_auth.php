<?php
class CI_auth extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	//Login admin
	function process_login($login_array_input = NULL){
		if(!isset($login_array_input) OR count($login_array_input) != 2)
			return false;
		$username = $login_array_input[0];
		$password = $login_array_input[1];
		$query = $this->db->query("SELECT * FROM tbl_admin WHERE username= '".$username."' and active = 1 LIMIT 1");
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			$user_id = $row->id;
			$user_pass = $row->password;
			$user_salt = $row->salt;
			if($this->CI_encrypts->encryptUserPwd($password,$user_salt) === $user_pass){
				$this->session->set_userdata('logged_user', $user_id);
				return true;
			}
			return false;
		}
		return false;
	}
	
	function check_logged(){
		return ($this->session->userdata('logged_user'))?TRUE:FALSE;
	}
	function logged_id(){
		return ($this->check_logged())?$this->session->userdata('logged_user'):'';
	}
	function logged_info(){
		return $this->query_sql->select_row('tbl_admin', '*', array('id' => $this->session->userdata('logged_user')));
	}


	//Login user
	function signUser($login_array_input = NULL){
		if(!isset($login_array_input) OR count($login_array_input) != 2)
			return false;
		$useraccount = $login_array_input[0];
		$password = $login_array_input[1];
		$result = $this->db->select('id,password,salt,active')->from('tbl_admin')->where(['email' => $useraccount, 'role_id' => ROLE_USER])->get()->row_array();
		if ($result != NULL)
		{
			$user_id = $result['id'];
			$user_pass = $result['password'];
			$user_salt = $result['salt'];
			if($this->CI_encrypts->encryptUserPwd($password,$user_salt) === $user_pass){
				if($result['active'] == 1)
				{
					$this->session->set_userdata('userID', $user_id);
					return 1;
				}
				return 2;
			}
		}
		return 3;
	}
	function checkSignin(){
		return ($this->session->userdata('userID'))?TRUE:FALSE;
	}
	function userID(){
		return ($this->checkSignin())?$this->session->userdata('userID'):'';
	}
	function getInfoUser(){
		return $this->query_sql->select_row('tbl_admin', '*', array('id' => $this->session->userdata('userID')));
	}
}
