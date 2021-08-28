<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');

	}
	public function __destruct(){
	}
	public function index()
	{
		
	}
	public function login()
	{
		$data['data_index'] = $this->get_index();
		if($this->CI_auth->check_logged() === true){
			redirect(base_url().'otadmin/dashboard');
		}else{
			$data['title'] = 'Đăng nhập';
			$data['data'] = $this->get_index();
			if($this->input->post()){
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$login_array = array($username, $password);
				if($this->CI_auth->process_login($login_array))
				{
					//Check active
					$user = $this->CI_auth->logged_info();
					redirect(base_url().'otadmin/dashboard');
				}
			}
			$this->load->view('backend/auth/login', isset($data)?$data:NULL);
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'otadmin/login.html');
	}
	public function notpermission()
	{
		$data['data_index'] = $this->get_index();
		//Config module
		$data['title'] = 'Notifi';
		$data['template'] = 'backend/home/notpermission';
		$this->load->view('backend/index', isset($data)?$data:NULL);
	}
}
