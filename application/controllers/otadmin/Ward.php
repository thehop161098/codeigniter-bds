<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ward extends Admin_Controller {
	//Config Module
	var $title = 'Phường xã';
	var	$path_url = ADMIN_URL.'ward/';
	var	$table = 'tbl_ward';
	var	$template = 'backend/ward/';
	var	$control = 'ward';
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}
	public function __destruct(){
	}
	public function index($id)
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$data['title'] = 'Quản lý '.$this->title;
		$data['template'] = $this->template.'index';
		$data['control'] = $this->control;
		$data['path_url'] = $this->path_url;
		$data['id'] = $id;
		$data['data_index'] = $this->get_index();
		$data['idDistrict'] = $this->query_sql->select_row('tbl_district','city_id',array('id'=>$id),'id desc');
		////
		$data['datas'] = $this->query_sql->select_array($this->table,'*',array('district_id'=>$id),'id desc');
		if($data['datas'] !=NULL)
		{
			foreach ($data['datas'] as $key_datas => $val_datas) {
				$hamlet = $this->query_sql->select_array('tbl_street','name',array('ward_id'=>$val_datas['id']),'id desc');
				$data['datas'][$key_datas]['street'] = $hamlet;
			}
		}
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function add($id)
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$data['title'] = 'Thêm mới dữ liệu';
		$data['template'] = $this->template.'add';
		$data['path_url'] = $this->path_url.'index/'.$id;
		$data['data_index'] = $this->get_index();
		$data['control'] = $this->control;
		//add
		if($this->input->post()){
			//Create Alias
			$alias = trim($this->input->post('alias'));
			$type = 7;
			if($type > 0){
				$alias = $this->CI_function->createdAlias($alias,$type);
			}
			// title
			$title = trim($this->input->post('title'));
			if($title == ''){
				$title = trim($this->input->post('name'));
			}
			$data_insert = array(
				'name' 			=> 	trim($this->input->post('name')),
				'district_id' 			=> 	$id,
				'alias' 		=> 	$alias,
				'title' 			=> 	$title,
				'meta_keyword' 		=> 	trim($this->input->post('meta_keyword')),
				'meta_description' 	=> 	trim($this->input->post('meta_description')),
			);
			$result = $this->query_sql->add($this->table, $data_insert);
			if($result>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thêm mới thành công!!',
				));
				redirect(''.$this->path_url.'index/'.$id,$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thêm mới lỗi!!',
				));
				redirect(''.$this->path_url.'index/'.$id,$data);
			}
		}
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function edit($id=0)
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$data['datas'] = $this->query_sql->select_row($this->table, '*', array('id' => $id));
		$idWard = $data['datas']['district_id'];
		$data['title'] = 'Cập nhật dữ liệu';
		$data['template'] = $this->template.'edit';
		$data['path_url'] = $this->path_url.'index/'.$idWard;
		$data['data_index'] = $this->get_index();
		$data['control'] = $this->control;
		//edit
		if($this->input->post()){
			//Creat alias
			$alias = trim($this->input->post('alias'));
			$type = 7;
			if($type > 0){
				$alias = $this->CI_function->createdAlias($alias,$type,$data['datas']['alias']);
			}
			// title
			$title = trim($this->input->post('title'));
			if($title == ''){
				$title = trim($this->input->post('name'));
			}
			$data_update = array(
				'name' 			=> 	trim($this->input->post('name')),
				'district_id' 			=> 	$idWard,
				'alias' 		=> 	$alias,
				'title' 			=> 	$title,
				'meta_keyword' 		=> 	trim($this->input->post('meta_keyword')),
				'meta_description' 	=> 	trim($this->input->post('meta_description')),
			);
			$result = $this->query_sql->edit($this->table, $data_update, array('id' => $id));
			if($result>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Cập nhật dữ liệu thành công!!',
				));
				redirect(''.$this->path_url.'index/'.$idWard,$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Cập nhật dữ liệu thất bại',
				));
				redirect(''.$this->path_url.'index/'.$idWard,$data);
			}
		}
		$this->load->view('backend/default/index', isset($data)?$data:'');
	}
	public function createSlug()
    {
  		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
    	$slug = $this->CI_function->create_alias($_POST['slug']);
		echo json_encode(array('slug' => $slug));
    }
	public function delete()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$id = $_POST['id'];
		$street = $this->query_sql->select_row('tbl_street','ward_id',array('ward_id'=>$id),'id desc');
		$data = $this->query_sql->select_row($this->table,'id,alias',array('id' => $id),'id desc');
		if($id != $street['ward_id'])
		{
			$this->query_sql->del($this->table,array('id' => $id));
			$this->query_sql->del('tbl_alias',array('alias' => $data['alias']));
		}
	}
	public function deleteall()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$listid = $_POST['listid'];
		$list_id = explode(',', $listid);
		foreach ($list_id as $key => $val) {
			$street = $this->query_sql->select_row('tbl_street','ward_id',array('ward_id'=>$val));
			$data = $this->query_sql->select_row($this->table,'id,alias',array('id'=>$val),'id desc');
			if($val != $street['ward_id'])
			{
				$this->query_sql->del($this->table,array('id' => $val));
				$this->query_sql->del('tbl_alias',array('alias' => $data['alias']));
			}
		}
	}
}
