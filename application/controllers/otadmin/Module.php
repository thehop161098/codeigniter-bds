<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends Admin_Controller {
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
		$data['data_index'] = $this->get_index();

		//Config module
		$data['title'] = 'Quản lý module';
		$data['template'] = 'backend/module/index';
		$data['data_index'] = $this->get_index();
		$module = $this->query_sql->select_array('tbl_module','*',array('parentid' => 0),'id desc');
		if($module != NULL){
			foreach ($module as $key => $val) {
				$child = $this->query_sql->select_array('tbl_module','*',array('parentid' => $val['id']),'id desc');
				$module[$key]['child'] = $child;
			}
		}
		//var_dump($module);die;
		$data['module'] = $module;
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function add()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'otadmin/login.html');
		}
		$data['data_index'] = $this->get_index();
		//add
		if($this->input->post()){
			$sort_max = $this->query_sql->select_row_max('tbl_module', 'sort');
			$data_insert = array(
				'name' 			=> 	trim($this->input->post('name')),
				'parentid' 			=> 	trim($this->input->post('parentid')),
				'icon' 			=> 	trim($this->input->post('icon')),
				'keys' 			=> 	trim($this->input->post('keys')),
				'ctr' 			=> 	trim($this->input->post('ctr')),
				'act' 			=> 	trim($this->input->post('act')),
				'link' 			=> 	trim($this->input->post('link')),
				'sort' 			=> 	$sort_max['sort'] + 1,
				'publish'		=>	$this->input->post('publish'),
				'created_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->add('tbl_module', $data_insert);
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thêm mới dữ liệu thành công',
				));
				redirect('otadmin/module/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thêm mới thành công!',
				));
				redirect('otadmin/module/index',$data);
			}
		}
		//Config module
		$data['modules'] = $this->query_sql->select_array('tbl_module','id, name, created_at, publish, sort',array('publish' => 1,'parentid' => 0),'id desc');
		$data['title'] = 'Thêm module';
		$data['template'] = 'backend/module/add';
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function edit($id=0)
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'otadmin/login.html');
		}
		$data['data_index'] = $this->get_index();
		//edit
		if($this->input->post()){

			$data_update = array(
				'name' 			=> 	trim($this->input->post('name')),
				'parentid' 			=> 	trim($this->input->post('parentid')),
				'icon' 			=> 	trim($this->input->post('icon')),
				'keys' 			=> 	trim($this->input->post('keys')),
				'ctr' 			=> 	trim($this->input->post('ctr')),
				'act' 			=> 	trim($this->input->post('act')),
				'link' 			=> 	trim($this->input->post('link')),
				'publish'		=>	$this->input->post('publish'),
				'updated_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->edit('tbl_module', $data_update, array('id' => $id));
			if($flag>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Cập nhật dữ liệu thành công',
				));
				redirect('otadmin/module/index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Cập nhật thành công!',
				));
				redirect('otadmin/module/index',$data);
			}
		}
		//Config module
		$data['module'] = $this->query_sql->select_row('tbl_module', '*', array('id' => $id));
		$data['modules'] = $this->query_sql->select_array('tbl_module','id, name, created_at, publish, sort',array('publish' => 1,'parentid' => 0),'id desc');
		$data['title'] = 'Cập nhật module';
		$data['template'] = 'backend/module/edit';
		$this->load->view('backend/default/index', isset($data)?$data:'');
	}
	public function sort()
    {
    	if($this->CI_auth->check_logged() === false){
			redirect(base_url().'otadmin/login.html');
		}
    	$id = $_POST['id'];
    	$sort = $_POST['sort'];
		$data_update['sort'] = $sort;
		$result = $this->query_sql->edit('tbl_module', $data_update, array('id' => $id));
		if($result > 0){
			echo json_encode(array('rs' => 1));
		}
    }
	public function delete()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'otadmin/login.html');
		}
		$id = $_POST['id'];
		$this->query_sql->del('tbl_module',array('id' => $id));
	}
	public function showGlobals()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$id = $_POST['id'];
		$globals = $_POST['globals'];
		$properties = $_POST['properties'];
		$data_update[$properties] = $globals;
		$this->query_sql->edit('tbl_module', $data_update, array('id' => $id));
	}
	public function deleteall()
	{
		if($this->CI_auth->check_logged() === false){
			redirect(base_url().'otadmin/login.html');
		}
		$listid = $_POST['listid'];
        $list_id = explode(',', $listid);
        foreach ($list_id as $key => $value) {
        	$this->query_sql->del('tbl_module',array('id' => $value));
        }
	}
}
