<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends Admin_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');

	}
	public function __destruct(){
	}
	public function index()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'otadmin/login.html');
		}
		$user = $this->CI_auth->logged_info();
		$data['data_index'] = $this->get_index();

		//Config module
		$data['title'] = 'Phân quyền hệ thống';
		$data['template'] = 'backend/permission/index';
		$role = $this->query_sql->select_array('tbl_role','id,name',array('publish' => 1),'id desc');
		$module = $this->query_sql->select_array('tbl_module','id,name',array('publish' => 1,'parentid' => 0),'sort asc');
		if($module != NULL){
			foreach ($module as $key => $val) {
				if($role != NULL){
					foreach ($role as $key_role => $val_role) {
						$permission = $this->query_sql->select_row('tbl_permission', 'id,active', array('moduleid' => $val['id'],'roleid' => $val_role['id']));
						if($permission != NULL){
							$data['permission'][$val['id'].$val_role['id']] = $permission['active'];
						}else{
							$data['permission'][$val['id'].$val_role['id']] = 0;
						}
					}
				}
				$child = $this->query_sql->select_array('tbl_module','id,name',array('publish' => 1,'parentid' => $val['id']),'sort asc');
				if($child != NULL){
					foreach ($child as $key_child => $val_child) {
						if($role != NULL){
							foreach ($role as $key_role => $val_role) {
								$permission = $this->query_sql->select_row('tbl_permission', 'id,active', array('moduleid' => $val_child['id'],'roleid' => $val_role['id']));
								if($permission != NULL){
									$data['permission'][$val_child['id'].$val_role['id']] = $permission['active'];
								}else{
									$data['permission'][$val_child['id'].$val_role['id']] = 0;
								}
							}
						}
					}
				}
				$module[$key]['child'] = $child;
			}
		}
		$data['module'] = $module;
		$data['role'] = $role;
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function permission()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'otadmin/login.html');
		}
		$moduleid = $_POST['moduleid'];
		$roleid = $_POST['roleid'];
		$active = $_POST['active'];
		$permission = $this->query_sql->select_row('tbl_permission', 'id,active', array('moduleid' => $moduleid,'roleid' => $roleid));
		if($permission == NULL){
			$data_insert = array(
				'moduleid' 			=> 	$moduleid,
				'roleid' 			=> 	$roleid,
				'active' 			=> 	$active,
				'created_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->add('tbl_permission', $data_insert);
		}else{
			$data_update = array(
				'active' 			=> 	$active,
			);
			$flag = $this->query_sql->edit('tbl_permission', $data_update, array('id' => $permission['id']));
		}
	}
}
