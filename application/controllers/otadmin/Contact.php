<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Admin_Controller {
	//Config Module
	public $title = 'liên hệ';
	public $table = 'tbl_contact';
	public $template = 'backend/contact/';
	public $control = 'contact';
	public $path_url = 'otadmin/contact/';
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	public function __destruct(){
	}
	public function index()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$data['title'] = 'Quản lý '.$this->title;
		$data['template'] = $this->template.'index';
		$data['control'] = $this->control;
		$data['data_index'] = $this->get_index();

		$data['datas'] = $this->query_sql->select_array($this->table,'*',['type'=>'contact'], 'id desc');
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function delete()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$id = $_POST['id'];
		$datas = $this->query_sql->select_row($this->table, 'id', array('id' => $id));
		$this->query_sql->del($this->table,array('id' => $id));
	}
	public function deleteall()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$listid = $_POST['listid'];
        $list_id = explode(',', $listid);
        foreach ($list_id as $key => $val) {
        	$datas = $this->query_sql->select_row($this->table, 'id', array('id' => $val));
        	$this->query_sql->del($this->table,array('id' => $val));
        }
	}
}
