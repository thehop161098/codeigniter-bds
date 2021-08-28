<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Admin_Controller {
	//Config Module
	public $title = 'Bài viết';
	public $path_dir = 'upload/news/';
	public $path_dir_thumb = 'upload/news/thumb/';
	public $path_url = ADMIN_URL.'news/';
	public $table = 'tbl_news';
	public $template = 'backend/news/';
	public $control = 'news';
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
			$type = 4;
			if($type > 0){
				$alias = $this->CI_function->createdAlias($alias,$type);
			}
			if($_FILES["image"]["name"]){
				$data_upload = $this->Image->upload_image($this->path_dir,$alias,420);
				$name_image = $data_upload['name_image'];
				$name_thumb = $data_upload['name_thumb'];
			}
			$title = trim($this->input->post('title'));
			if($title == ''){
				$title = trim($this->input->post('name'));
			}
			$tags = $this->input->post('tags');
			$cateSB = json_encode($this->input->post('cateSB'));
			$data_insert = array(
				'name' 			=> 	trim($this->input->post('name')),
				'cateid' 		=> 	trim($this->input->post('cateid')),
				'tags'			=>	$tags,
				'cateSB'			=>	$cateSB,
				'alias' 		=> 	$alias,
				'title'			=>	$title,
				'meta_keyword' 			=> 	trim($this->input->post('meta_keyword')),
				'meta_description' 			=> 	trim($this->input->post('meta_description')),
				'image' 		=>  $name_image,
				'thumb' 		=>  $name_thumb,
				'publish'		=>	$this->input->post('publish'),
				'des'			=>	$this->input->post('des'),
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
		$data['menus'] = $this->CI_function->getSelectCategory(0,'',0,1);
		// $data['menus2'] = $this->CI_function->getCheckboxMenu2(0,'',0,1);
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
			$type = 4;
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
					$data_upload = $this->Image->upload_image($this->path_dir,$alias,420);
					$name_image = $data_upload['name_image'];
					$name_thumb = $data_upload['name_thumb'];
				}
			}
			$title = trim($this->input->post('title'));
			if($title == ''){
				$title = trim($this->input->post('name'));
			}
			$tags = $this->input->post('tags');
			$cateSB = json_encode($this->input->post('cateSB'));
			$data_update = array(
				'name' 				=> 	trim($this->input->post('name')),
				'cateid' 			=> 	trim($this->input->post('cateid')),
				'tags'				=>	$tags,
				'cateSB'			=>	$cateSB,
				'alias' 			=> 	$alias,
				'title' 			=> 	$title,
				'meta_keyword' 		=> 	trim($this->input->post('meta_keyword')),
				'meta_description' 	=> 	trim($this->input->post('meta_description')),
				'image' 			=>  $name_image,
				'thumb' 			=>  $name_thumb,
				'publish'			=>	$this->input->post('publish'),
				'des'				=>	$this->input->post('des'),
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
		$arrayCateSB = json_decode($data['datas']['cateSB'],true);
		$data['menus'] = $this->CI_function->getSelectCategory(0,'',$data['datas']['cateid'],1);
		// $data['menus2'] = $this->CI_function->getCheckboxMenu2(0,'',$data['datas']['cateid'],1,$arrayCateSB);
		$this->load->view('backend/default/index', isset($data)?$data:'');
	}
	public function addTags($tags,$id){
		$arr_tags = explode(',', $tags);
			if($arr_tags != NULL){
			$data_insert_tags = NULL;
			foreach ($arr_tags as $key_arr_tags => $val_arr_tags) {
				$checkTags = $this->query_sql->select_row('tbl_tags','id,name',array('name' => $val_arr_tags));
				if($checkTags == NULL){
					$data_tags = array(
						'name'	=>	$val_arr_tags,
						'alias'	=>	$this->CI_function->create_alias($val_arr_tags),
					);
					$result = $this->query_sql->add('tbl_tags', $data_tags);
					$tagsID = $result['id_insert'];
				}else{
					$tagsID = $checkTags['id'];
				}
				$checkTagsDetail = $this->query_sql->select_row('tbl_tags_detail','id,tagsID,newsID',array('tagsID' => $checkTags['id'],'newsID' => $id));
				if($checkTagsDetail == NULL){
					$data_tags_detail = array(
						'tagsID'	=>	$tagsID,
						'newsID'	=>	$id,
						'created_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
					);
					$this->query_sql->add('tbl_tags_detail', $data_tags_detail);
				}
			}
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
		$this->query_sql->del('tbl_tags_detail',array('newsID' => $id));
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
			$this->query_sql->del('tbl_tags_detail',array('newsID' => $val));
        	$this->query_sql->del($this->table,array('id' => $val));
        }
	}
}
