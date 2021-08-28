<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends Admin_Controller {
	//Config Module
	public $title = 'Dự án';
	public $path_dir = 'upload/project/';
	public $path_dir_thumb = 'upload/project/thumb/';
	public $path_url = ADMIN_URL.'project/';
	public $table = 'tbl_project';
	public $template = 'backend/project/';
	public $control = 'project';
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
		$data['path_dir_thumb'] = $this->path_dir_thumb;
		$data['data_index'] = $this->get_index();

		$data['datas'] = $this->query_sql->select_array($this->table,'*',NULL,'id desc');
		if($data['datas'] != NULL){
			foreach ($data['datas'] as $key => $val) {
				$cate_name = '(---------)';
				$infoCate = $this->query_sql->select_row('tbl_category', 'name', array('id' => $val['cateid']));
				if($infoCate != NULL){
					$cate_name = $infoCate['name'];
				}
				$data['datas'][$key]['cate_name'] = $cate_name;
			}
		}
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function add()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$data['title'] = 'Thêm mới dữ liệu';
		$data['template'] = $this->template.'add';
		$data['path_url'] = $this->path_url;
		$data['control'] = $this->control;
		$data['data_index'] = $this->get_index();
		//add
		if($this->input->post()){
			$name_image = '';
			$name_thumb = '';
			//Create Alias
			$alias = trim($this->input->post('alias'));
			$type = 9;
			if($type > 0){
				$alias = $this->CI_function->createdAlias($alias,$type);
			}
			if($_FILES["image"]["name"]){
				$data_upload = $this->Image->upload_image($this->path_dir,$alias,370);
				$name_image = $data_upload['name_image'];
				$name_thumb = $data_upload['name_thumb'];
			}
			$title = trim($this->input->post('title'));
			if($title == ''){
				$title = trim($this->input->post('name'));
			}
			$data_insert = array(
				'cateid' 		=> 	trim($this->input->post('cateid')),
				'name' 			=> 	trim($this->input->post('name')),
				'alias' 		=> 	$alias,
				'city_id' 		=> 	trim($this->input->post('city_id')),
				'district_id' 		=> 	trim($this->input->post('district_id')),
				'ward_id' 		=> 	trim($this->input->post('ward_id')),
				'street_id' 		=> 	trim($this->input->post('street_id')),
				'map_lat'				=>	$this->input->post('map_lat'),
				'map_long'				=>	$this->input->post('map_long'),
				'dia_chi' 		=> 	trim($this->input->post('dia_chi')),
				'phone'		=>	$this->input->post('phone'),
				'website'		=>	$this->input->post('website'),
				'email'		=>	$this->input->post('email'),
				'publish'		=>	$this->input->post('publish'),
				'title'			=>	$title,
				'meta_keyword' 			=> 	trim($this->input->post('meta_keyword')),
				'meta_description' 			=> 	trim($this->input->post('meta_description')),
				'image' 		=>  $name_image,
				'thumb' 		=>  $name_thumb,
				'content'		=>	$this->input->post('content'),
				'created_at'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$result = $this->query_sql->add($this->table, $data_insert);
			if($tags != ''){
				$this->addTags($tags,$result['id_insert']);
			}
			if($result>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Thêm mới thành công!!',
				));
				redirect(''.$this->path_url.'index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thêm mới lỗi!!',
				));
				redirect(''.$this->path_url.'index',$data);
			}
		}
		$data['menus'] = $this->CI_function->getSelectCategory(0,'',0,8);
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function edit($id=0)
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$data['title'] = 'Cập nhật dữ liệu';
		$data['template'] = $this->template.'edit';
		$data['control'] = $this->control;
		$data['path_url'] = $this->path_url;
		$data['path_dir_thumb'] = $this->path_dir_thumb;
		$data['data_index'] = $this->get_index();
		//edit
		$data['datas'] = $this->query_sql->select_row($this->table, '*', array('id' => $id));
		if($this->input->post()){
			//Creat alias
			$alias = trim($this->input->post('alias'));
			$type = 9;
			if($type > 0){
				$alias = $this->CI_function->createdAlias($alias,$type,$data['datas']['alias']);
			}
			//Upload image
			$name_image = $data['datas']['image'];
			$name_thumb = $data['datas']['thumb'];
			if($_FILES["image"]["name"]){
				if($_FILES["image"]["name"]){ 
					$file_image = $this->path_dir.$data['datas']['image'];
					$file_image_thumb = $this->path_dir_thumb.$data['datas']['thumb'];
					if($data['datas']['image'] != ''){ unlink($file_image); }
					if($data['datas']['thumb'] != ''){ unlink($file_image_thumb); }
					$data_upload = $this->Image->upload_image($this->path_dir,$alias,370);
					$name_image = $data_upload['name_image'];
					$name_thumb = $data_upload['name_thumb'];
				}
			}
			$title = trim($this->input->post('title'));
			if($title == ''){
				$title = trim($this->input->post('name'));
			}
			$data_update = array(
				'cateid' 			=> 	trim($this->input->post('cateid')),
				'name' 				=> 	trim($this->input->post('name')),
				'alias' 			=> 	$alias,
				'city_id' 		=> 	trim($this->input->post('city_id')),
				'district_id' 		=> 	trim($this->input->post('district_id')),
				'ward_id' 		=> 	trim($this->input->post('ward_id')),
				'street_id' 		=> 	trim($this->input->post('street_id')),
				'map_lat'				=>	$this->input->post('map_lat'),
				'map_long'				=>	$this->input->post('map_long'),
				'dia_chi' 		=> 	trim($this->input->post('dia_chi')),
				'phone'		=>	$this->input->post('phone'),
				'website'		=>	$this->input->post('website'),
				'email'		=>	$this->input->post('email'),
				'publish'			=>	$this->input->post('publish'),
				'title' 			=> 	$title,
				'meta_keyword' 		=> 	trim($this->input->post('meta_keyword')),
				'meta_description' 	=> 	trim($this->input->post('meta_description')),
				'image' 			=>  $name_image,
				'thumb' 			=>  $name_thumb,
				'content'			=>	$this->input->post('content'),
				'updated_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$result = $this->query_sql->edit($this->table, $data_update, array('id' => $id));
			if($tags != ''){
				$this->addTags($tags,$id);
			}
			if($result>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Cập nhật dữ liệu thành công!!',
				));
				redirect(''.$this->path_url.'index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Cập nhật dữ liệu thất bại',
				));
				redirect(''.$this->path_url.'index',$data);
			}
		}
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['district'] = $this->query_sql->select_array('tbl_district','id,name',array('city_id' => $data['datas']['city_id']));
		$data['ward'] = $this->query_sql->select_array('tbl_ward','id,name',array('district_id' => $data['datas']['district_id']));
		$data['street'] = $this->query_sql->select_array('tbl_street','id,name',array('ward_id' => $data['datas']['ward_id']));
		$data['menus'] = $this->CI_function->getSelectCategory(0,'',$data['datas']['cateid'],8);
		$this->load->view('backend/default/index', isset($data)?$data:'');
	}
	public function district()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$cityID = $_POST['cityID'];
		$district = $this->query_sql->select_array('tbl_district','*',array('city_id'=>$cityID),'id desc');
		echo '<option value="">---Quận/Huyện---</option>';
		foreach ($district as $val) {
			echo '<option  value="'.$val['id'].'">'.$val['name'].'</option>';
		}
	}
	public function ward()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$districtID = $_POST['districtID'];
		$ward = $this->query_sql->select_array('tbl_ward','*',array('district_id'=>$districtID),'id desc');
		echo '<option value="">---Phường/Xã---</option>';
		foreach ($ward as $val) {
			echo '<option  value="'.$val['id'].'">'.$val['name'].'</option>';
		}
	}
	public function street()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$wardID = $_POST['wardID'];
		$street = $this->query_sql->select_array('tbl_street','*',array('ward_id'=>$wardID),'id desc');
		echo '<option value="">---Đường---</option>';
		foreach ($street as $val) {
			echo '<option  value="'.$val['id'].'">'.$val['name'].'</option>';
		}
	}
	public function createSlug()
    {
  		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
    	$slug = $this->CI_function->create_alias($_POST['slug']);
		echo json_encode(array('slug' => $slug));
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
    public function delete_image(){
    	if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$image = $_POST['image'];
		$datas = $this->query_sql->select_row($this->table, 'id,image,thumb', array('thumb' => $image));
		if($datas != NULL){
			$file_image = $this->path_dir.$datas['image'];
			$file_image_thumb = $this->path_dir_thumb.$datas['thumb'];
			if($datas['image'] != ''){ unlink($file_image); }
			if($datas['thumb'] != ''){ unlink($file_image_thumb); }
			$data_update = [
				'image' => '',
				'thumb' => '',
			];
			$this->query_sql->edit($this->table, $data_update, array('id' => $datas['id']));
		}
	}
	public function delete()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$id = $_POST['id'];
		$datas = $this->query_sql->select_row($this->table, 'id,image,thumb,alias', array('id' => $id));
		$file_image = $this->path_dir.$datas['image'];
		$file_thumb = $this->path_dir_thumb.$datas['thumb'];
		if($datas['image'] != ''){ unlink($file_image); }
		if($datas['thumb'] != ''){ unlink($file_thumb); }
		$this->query_sql->del('tbl_alias',array('alias' => $datas['alias']));
		$this->query_sql->del($this->table,array('id' => $id));
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
	public function deleteall()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$listid = $_POST['listid'];
        $list_id = explode(',', $listid);
        foreach ($list_id as $key => $val) {
        	$datas = $this->query_sql->select_row($this->table, 'id,image,thumb,alias', array('id' => $val));
			$file_image = $this->path_dir.$datas['image'];
			$file_image_thumb = $this->path_dir_thumb.$datas['thumb'];
			if($datas['image'] != ''){ unlink($file_image); }
			if($datas['thumb'] != ''){ unlink($file_image_thumb); }
			$this->query_sql->del('tbl_alias',array('alias' => $datas['alias']));
        	$this->query_sql->del($this->table,array('id' => $val));
        }
	}
}
