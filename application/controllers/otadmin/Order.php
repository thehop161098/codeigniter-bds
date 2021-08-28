<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Admin_Controller {
	//Config Module
	var $title = 'Đơn hàng';
	var	$path_url = 'otadmin/order/';
	var	$table = 'tbl_order';
	var	$template = 'backend/order/';
	var	$control = 'order';
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
		$data['path_url'] = $this->path_url;
		$data['data_index'] = $this->get_index();

		$datas = $this->query_sql->select_array($this->table,'*',NULL,'id desc');
		if($datas != NULL){
			foreach ($datas as $key => $val) {
				$listCart = $this->query_sql->select_array('tbl_cart','*',array('orderID' => $val['id']),'id desc');
				$datas[$key]['listCart'] = $listCart;
			}
		}
		$data['datas'] = $datas;
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function delete()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$id = $_POST['id'];
		$this->query_sql->del($this->table,array('id' => $id));
	}
	public function show()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$id = $_POST['id'];
		$publish = $_POST['publish'];
		$data_update['publish'] = $publish;
		$this->query_sql->edit($this->table, $data_update, array('id' => $id));
	}
	public function updateStatus()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$id = $_POST['id'];
		$status = $_POST['status'];
		$data_update['status'] = $status;
		$this->query_sql->edit($this->table, $data_update, array('id' => $id));
	}
	public function deleteall()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$listid = $_POST['listid'];
        $list_id = explode(',', $listid);
        foreach ($list_id as $key => $val) {
        	$this->query_sql->del($this->table,array('id' => $val));
        }
	}
}
