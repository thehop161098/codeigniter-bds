<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCustomer extends Admin_Controller {
	//Config Module
	var $title = 'User Khách hàng';
	var	$path_url = 'otadmin/userCustomer/';
	var	$table = 'tbl_admin';
	var	$template = 'backend/userCustomer/';
	var	$control = 'userCustomer';
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

		$datas = $this->query_sql->select_array($this->table,'*',array('role_id' => ROLE_USER),'id desc');
		if($datas != NULL){
			foreach ($datas as $key => $val) {
				$listNewsLand = $this->query_sql->select_array('tbl_news_land','id,name,cateid,thumb,price,publish',array('id_user' => $val['id']),'id desc');
				if(! empty($listNewsLand)){
					foreach ($listNewsLand as $key_listNewsLand => $val_listNewsLand) {
						$cate_name = $this->query_sql->select_row('tbl_category','name',array('id' => $val_listNewsLand['cateid']),'id desc');
						$listNewsLand[$key_listNewsLand]['cate_name'] = $cate_name['name'];
					}
				}
				$datas[$key]['listNewsLand'] = $listNewsLand;
			}
		}
		$data['datas'] = $datas;
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function active()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$id = $_POST['id'];
		$active = $_POST['active'];
		$data_update['active'] = $active;
		$this->query_sql->edit($this->table, $data_update, array('id' => $id));
	}
	public function delete()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$id = $_POST['id'];
		$this->query_sql->del($this->table,array('id' => $id));
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
