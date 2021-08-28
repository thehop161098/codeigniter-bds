<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MapShowroom extends Admin_Controller {
	//Config Module
	var $title = 'Map showroom';
	var	$path_url = ADMIN_URL.'mapShowroom/';
	var	$table = 'tbl_map_showroom';
	var	$template = 'backend/mapShowroom/';
	var	$control = 'mapShowroom';
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
		$data['data_index'] = $this->get_index();
		$data['id'] = $id;
		$data['datas'] = $this->query_sql->select_array($this->table,'*',array('showroomID'=>$id),'sort desc');
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function add($id)
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$data['title'] = 'Thêm mới dữ liệu';
		$data['template'] = $this->template.'add';
		$data['path_url'] = $this->path_url.'index/'.$id;
		$data['data_index'] = $this->get_index();
		//add
		if($this->input->post()){
			$sort_max = $this->query_sql->select_row_max($this->table, 'sort');
			$data_insert = array(
				'name' 			=> 	trim($this->input->post('name')),
				'des' 			=> 	trim($this->input->post('des')),
				'phone' 			=> 	trim($this->input->post('phone')),
				'link' 			=> 	trim($this->input->post('link')),
				'showroomID' 			=> 	$id,
				'sort' 			=> 	$sort_max['sort'] + 1,
				'publish'		=>	$this->input->post('publish'),
				'created_at'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
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
		$idShowroom = $data['datas']['showroomID'];
		$data['title'] = 'Cập nhật dữ liệu';
		$data['template'] = $this->template.'edit';
		$data['path_url'] = $this->path_url.'index/'.$idShowroom;
		$data['data_index'] = $this->get_index();
		//edit
		if($this->input->post()){
			$data_update = array(
				'name' 			=> 	trim($this->input->post('name')),
				'des' 			=> 	trim($this->input->post('des')),
				'phone' 			=> 	trim($this->input->post('phone')),
				'link' 			=> 	trim($this->input->post('link')),
				'showroomID' 			=> 	$idShowroom,
				'publish'		=>	$this->input->post('publish'),
				'created_at'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$result = $this->query_sql->edit($this->table, $data_update, array('id' => $id));
			if($result>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Cập nhật dữ liệu thành công!!',
				));
				redirect(''.$this->path_url.'index/'.$idShowroom,$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Cập nhật dữ liệu thất bại',
				));
				redirect(''.$this->path_url.'index/'.$idShowroom,$data);
			}
		}
		$this->load->view('backend/default/index', isset($data)?$data:'');
	}
	public function sort()
    {
  		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
    	$id = $_POST['id'];
    	$sort = $_POST['sort'];
		$data_update['sort'] = $sort;
		$result = $this->query_sql->edit($this->table, $data_update, array('id' => $id));
		if($result > 0){
			echo json_encode(array('rs' => 1));
		}
    }
    public function showGlobals()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$id = $_POST['id'];
		$globals = $_POST['globals'];
		$properties = $_POST['properties'];
		$data_update[$properties] = $globals;
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
