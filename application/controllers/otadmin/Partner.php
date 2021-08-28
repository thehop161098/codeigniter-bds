<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends Admin_Controller {
	//Config Module
	var $title = 'partner';
	var $path_dir = 'upload/partner/';
	var	$path_dir_thumb = 'upload/partner/thumb/';
	var	$path_url = 'otadmin/partner/';
	var	$table = 'tbl_photo';
	var	$template = 'backend/partner/';
	var	$control = 'partner';
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

		$data['datas'] = $this->query_sql->select_array($this->table,'*',array('type' => $this->control),'id desc');
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
				$config['width'] = 200;

				$ar_name_image = explode('.',$image_data['file_name']);
				$name_thumb = $ar_name_image[0].'_thumb.'.$ar_name_image[1];
			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();
			}else{
				$name_image = '';
				$name_thumb = '';
			}

			$sort_max = $this->query_sql->select_row_max($this->table, 'sort');
			$data_insert = array(
				'name' 			=> 	trim($this->input->post('name')),
				'link' 			=> 	trim($this->input->post('link')),
				'image' 		=>  $name_image,
				'type' 			=>  $this->control,
				'thumb' 		=>  $name_thumb,
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
				redirect(''.$this->path_url.'index',$data);
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thêm mới lỗi!!',
				));
				redirect(''.$this->path_url.'index',$data);
			}
		}
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
				$config['width'] = 200;

				$ar_name_image = explode('.',$image_data['file_name']);
				$name_thumb = $ar_name_image[0].'_thumb.'.$ar_name_image[1];

			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();
			}else{
				$name_image = $data['datas']['image'];
				$name_thumb = $data['datas']['thumb'];
			}

			$data_update = array(
				'name' 			=> 	trim($this->input->post('name')),
				'link' 			=> 	trim($this->input->post('link')),
				'image' 		=>  $name_image,
				'thumb' 		=>  $name_thumb,
				'publish'		=>	$this->input->post('publish'),
				'updated_at'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
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
		$datas = $this->query_sql->select_row($this->table, 'id,image,thumb', array('id' => $id));
		$file_image = $this->path_dir.$datas['image'];
		$file_thumb = $this->path_dir_thumb.$datas['thumb'];
		if($datas['image'] != ''){ unlink($file_image); }
		if($datas['thumb'] != ''){ unlink($file_thumb); }
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
        	$datas = $this->query_sql->select_row($this->table, 'id,image,thumb', array('id' => $val));
			$file_image = $this->path_dir.$datas['image'];
			$file_image_thumb = $this->path_dir_thumb.$datas['thumb'];
			if($datas['image'] != ''){ unlink($file_image); }
			if($datas['thumb'] != ''){ unlink($file_image_thumb); }
        	$this->query_sql->del($this->table,array('id' => $val));
        }
	}
}
