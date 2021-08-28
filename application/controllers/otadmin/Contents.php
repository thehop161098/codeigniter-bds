<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents extends Admin_Controller {
	//Config Module
	var $title = 'Nội dung';
	var $path_dir = 'upload/contents/';
	var	$path_dir_thumb = 'upload/contents/thumb/';
	var	$path_url = ADMIN_URL.'contents/';
	var	$table = 'tbl_contents';
	var	$template = 'backend/contents/';
	var	$control = 'contents';
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
				$infoCate = $this->query_sql->select_row('tbl_menu', 'name', array('id' => $val['cateid']));
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
		$data['data_index'] = $this->get_index();
		//add
		if($this->input->post()){
			if($_FILES["image"]["name"]){
				if (!is_dir($this->path_dir)){mkdir($this->path_dir);} 
				if (!is_dir($this->path_dir_thumb)){mkdir($this->path_dir_thumb);} 
				$config['upload_path']	= $this->path_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$config['max_size'] = 5120;
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				$image = $this->upload->do_upload("image");
				$image_data = $this->upload->data();
				$name_image = $image_data['file_name'];

				//Create thumb
				$this->load->library('image_lib');
				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= $this->path_dir.$image_data['file_name'];
				$config['new_image'] 		= $this->path_dir_thumb.$image_data['file_name'];
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] = 250;

				$ar_name_image = explode('.',$image_data['file_name']);
				$name_thumb = $ar_name_image[0].'_thumb.'.$ar_name_image[1];
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();
			}else{
				$name_image = '';
				$name_thumb = '';
			}
			$title = trim($this->input->post('title'));
			if($title == ''){
				$title = trim($this->input->post('name'));
			}
			//Create Alias
			$name = trim($this->input->post('name'));
			$alias = $this->CI_function->create_alias($name);
			$type = 4;
			if($type > 0){
				$alias = $this->CI_function->createdAlias($alias,$type);
			}
			$data_insert = array(
				'name' 			=> 	trim($this->input->post('name')),
				'image' 		=>  $name_image,
				'thumb' 		=>  $name_thumb,
				'publish'		=>	$this->input->post('publish'),
				'des'			=>	$this->input->post('des'),
				'created_at'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$result = $this->query_sql->add($this->table, $data_insert);
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
		$data['menus'] = $this->CI_function->getSelectMenu(0,'',0,1);
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function edit($id=0)
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$data['title'] = 'Cập nhật dữ liệu';
		$data['template'] = $this->template.'edit';
		$data['path_url'] = $this->path_url;
		$data['path_dir_thumb'] = $this->path_dir_thumb;
		$data['data_index'] = $this->get_index();
		//edit
		$data['datas'] = $this->query_sql->select_row($this->table, '*', array('id' => $id));
		if($this->input->post()){
			if($_FILES["image"]["name"]){
				$file_image = $this->path_dir.$data['datas']['image'];
				$file_image_thumb = $this->path_dir_thumb.$data['datas']['thumb'];
				if($data['datas']['image'] != ''){ unlink($file_image); }
				if($data['datas']['thumb'] != ''){ unlink($file_image_thumb); }
				$config['upload_path']	= $this->path_dir;
				$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
				$config['max_size'] = 5120;
				$this->load->library('upload', $config); 
				$this->upload->initialize($config); 
				$image = $this->upload->do_upload("image");
				$image_data = $this->upload->data();
				$name_image = $image_data['file_name'];

				//Create thumb
				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';
				$config['source_image'] = $this->path_dir.$image_data['file_name'];
				$config['new_image'] = $this->path_dir_thumb.$image_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 250;

				$ar_name_image = explode('.',$image_data['file_name']);
				$name_thumb = $ar_name_image[0].'_thumb.'.$ar_name_image[1];
				
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();
			}else{
				$name_image = $data['datas']['image'];
				$name_thumb = $data['datas']['thumb'];
			}
			$title = trim($this->input->post('title'));
			if($title == ''){
				$title = trim($this->input->post('name'));
			}
			//Creat alias
			$name = trim($this->input->post('name'));
			$alias = $this->CI_function->create_alias($name);
			$type = 4;
			if($type > 0){
				$alias = $this->CI_function->createdAlias($alias,$type,$data['datas']['alias']);
			}
			$data_update = array(
				'name' 				=> 	trim($this->input->post('name')),
				'image' 			=>  $name_image,
				'thumb' 			=>  $name_thumb,
				'publish'			=>	$this->input->post('publish'),
				'des'				=>	$this->input->post('des'),
				'updated_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$result = $this->query_sql->edit($this->table, $data_update, array('id' => $id));
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
		$data['menus'] = $this->CI_function->getSelectMenu(0,'',$data['datas']['cateid'],1);
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
    public function delete_image(){
    	if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$image = $_POST['image'];
		$datas = $this->query_sql->select_row($this->table, 'id,image,thumb', array('image' => $image));
		if($datas != NULL){
			$file_image = $this->path_dir.$datas['image'];
			$file_image_thumb = $this->path_dir_thumb.$datas['thumb'];
			if($datas['image'] != ''){ unlink($file_image); }
			if($datas['thumb'] != ''){ unlink($file_image_thumb); }
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
	public function show()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$id = $_POST['id'];
		$publish = $_POST['publish'];
		$data_update['publish'] = $publish;
		$this->query_sql->edit($this->table, $data_update, array('id' => $id));
	}
	public function showhot()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$id = $_POST['id'];
		$is_hot = $_POST['hot'];
		$data_update['is_hot'] = $is_hot;
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
