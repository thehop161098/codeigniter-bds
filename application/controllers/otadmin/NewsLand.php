<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsLand extends Admin_Controller {
	//Config Module
	var $title = 'Tin BDS';
	var $path_dir = 'upload/newsLand/';
	var	$path_dir_thumb = 'upload/newsLand/thumb/';
	var	$path_url = ADMIN_URL.'newsLand/';
	var	$table = 'tbl_news_land';
	var	$template = 'backend/newsLand/';
	var	$control = 'newsLand';
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
				$fullname = '(---------)';
				$infoCate = $this->query_sql->select_row('tbl_category', 'name', array('id' => $val['cateid']));
				if($infoCate != NULL){
					$cate_name = $infoCate['name'];
				}
				$data['datas'][$key]['cate_name'] = $cate_name;
				/////
				$name_user = $this->query_sql->select_row('tbl_admin', 'fullname', array('id' => $val['id_user']));
				if(! empty($name_user)){
					$fullname = $name_user['fullname'];
				}
				$data['datas'][$key]['fullname'] = $fullname;
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
		$errors = [];
		//add
		$data_old = $this->input->post();
		if($data_old){
			if(empty($errors)) {
				//upload image
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
					$config['width'] = 400;

					$ar_name_image = explode('.',$image_data['file_name']);
					$name_thumb = $ar_name_image[0].'_thumb.'.$ar_name_image[1];
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}else{
					$name_image = '';
					$name_thumb = '';
				}

				//set title empty
				$title = trim($this->input->post('title'));
				if($title == ''){
					$title = trim($this->input->post('name'));
				}
				//Create Alias
				$name = trim($this->input->post('name'));
				$alias = trim($this->input->post('alias'));
				$type = 3;
				if($type > 0){
					$alias = $this->CI_function->createdAlias($alias,$type);
				}
				///format
				$price = str_replace(',', '',$this->input->post('price'));
				$price_detail = $this->CI_function->jam_read_num_forvietnamese($price);
				///
				$row_user = $this->query_sql->select_row('tbl_admin', 'id,role_id', array('id' => $this->session->userdata('logged_user')));
				///
				$data_insert = array(
					'id_user' 				=> 	$row_user['id'],
					'role_id' 				=> $row_user['role_id'],
					'name' 				=> 	trim($this->input->post('name')),
					'cateid' 				=> 	trim($this->input->post('cateid')),
					'alias' 			=> 	$alias,
					'title' 			=> 	$title,
					'meta_keyword' 		=> 	trim($this->input->post('meta_keyword')),
					'meta_description' 	=> 	trim($this->input->post('meta_description')),
					'image' 			=>  $name_image,
					'thumb' 			=>  $name_thumb,
					'price'				=>	$price,
					'price_detail'				=>	$price_detail,
					'unit'				=>	trim($this->input->post('unit')),
					'deal'				=>	trim($this->input->post('deal')),
					'unit' 		=> 	trim($this->input->post('unit')),
					'area'				=>	$this->input->post('area'),
					'city_id'				=>	$this->input->post('city_id'),
					'district_id'				=>	$this->input->post('district_id'),
					'ward_id'				=>	$this->input->post('ward_id'),
					'street_id'				=>	$this->input->post('street_id'),
					'map_lat'				=>	$this->input->post('map_lat'),
					'map_long'				=>	$this->input->post('map_long'),
					'dia_chi'				=>	$this->input->post('dia_chi'),
					'direction_id'				=>	$this->input->post('direction_id'),
					'facade'				=>	$this->input->post('facade'),
					'highway'				=>	$this->input->post('highway'),
					'number_floor'				=>	$this->input->post('number_floor'),
					'room'				=>	$this->input->post('room'),
					'toliet'				=>	$this->input->post('toliet'),
					'video'				=>	$this->input->post('video'),
					'content'			=>	$this->input->post('content'),
					'publish'			=>	$this->input->post('publish'),
					'created_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$result = $this->query_sql->add($this->table, $data_insert);
				$newsLandID = $result['id_insert'];
				//Insert Category
				$arrayCateID = $this->input->post('cateid');
				if($arrayCateID != NULL){
					$data_insertCateID = array(
						'cateID' 				=> 	$arrayCateID,
						'newsLandID' 			=> 	$newsLandID,
						'created_at'			=>	gmdate('Y-m-d H:i:s', time()+7*3600)
					);
					$this->query_sql->add('tbl_newsland_menu', $data_insertCateID);
				}
				//Update image dropzon
				$arrayPhotoID = $this->input->post('photoID');
				if($arrayPhotoID != NULL){
					foreach ($arrayPhotoID as $key_arrayPhotoID => $val_arrayPhotoID) {
						$data_update_photo = array(
							'newsLandID' => 	$newsLandID,
						);
						$result = $this->query_sql->edit('tbl_newsland_photo', $data_update_photo, array('uuid' => $val_arrayPhotoID));
					}
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
		}
		$data['menus'] = $this->CI_function->getSelectCategory(0,'',0,2);
		$data['errors'] = $errors;
		$data['data_old'] = $data_old;
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',array('publish' => 1),'sort asc');
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function edit($id=0)
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$data['title'] = 'Cập nhật dữ liệu';
		$data['template'] = $this->template.'edit';
		$data['path_url'] = $this->path_url;
		$data['path_dir_thumb'] = $this->path_dir_thumb;
		$data['control'] = $this->control;
		$data['data_index'] = $this->get_index();
		$errors = [];
		//edit
		$data['datas'] = $this->query_sql->select_row($this->table, '*', array('id' => $id));
		$data['photoList'] = $this->query_sql->select_array('tbl_newsland_photo', 'id,thumb', array('newsLandID' => $id));
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
				$config['width'] = 400;

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
			$alias = trim($this->input->post('alias'));
			$type = 3;
			if($type > 0){
				$alias = $this->CI_function->createdAlias($alias,$type,$data['datas']['alias']);
			}
			/// format
			$price = str_replace(',', '',$this->input->post('price'));
			$price_detail = $this->CI_function->jam_read_num_forvietnamese($price);
			///
			if(empty($errors)) {
				$data_update = array(
					'id_user' 				=> 	$data['datas']['id_user'],
					'role_id' 				=> $data['datas']['role_id'],
					'name' 				=> 	trim($this->input->post('name')),
					'alias' 			=> 	$alias,
					'cateid' 			=> 	trim($this->input->post('cateid')),
					'title' 			=> 	$title,
					'meta_keyword' 		=> 	trim($this->input->post('meta_keyword')),
					'meta_description' 	=> 	trim($this->input->post('meta_description')),
					'image' 			=>  $name_image,
					'thumb' 			=>  $name_thumb,
					'price'				=>	$price,
					'price_detail'				=>	$price_detail,
					'unit'				=>	trim($this->input->post('unit')),
					'deal'				=>	trim($this->input->post('deal')),
					'area'				=>	$this->input->post('area'),
					'city_id'				=>	$this->input->post('city_id'),
					'district_id'				=>	$this->input->post('district_id'),
					'ward_id'				=>	$this->input->post('ward_id'),
					'street_id'				=>	$this->input->post('street_id'),
					'map_lat'				=>	$this->input->post('map_lat'),
					'map_long'				=>	$this->input->post('map_long'),
					'dia_chi'				=>	$this->input->post('dia_chi'),
					'direction_id'				=>	$this->input->post('direction_id'),
					'facade'				=>	$this->input->post('facade'),
					'highway'				=>	$this->input->post('highway'),
					'number_floor'				=>	$this->input->post('number_floor'),
					'room'				=>	$this->input->post('room'),
					'toliet'				=>	$this->input->post('toliet'),
					'video'				=>	$this->input->post('video'),
					'content'			=>	$this->input->post('content'),
					'publish'			=>	$this->input->post('publish'),
					'updated_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$result = $this->query_sql->edit($this->table, $data_update, array('id' => $id));
				//Insert Category
				$this->query_sql->del('tbl_newsland_menu',array('newsLandID' => $id));
				$arrayCateID = $this->input->post('cateid');
				if($arrayCateID != NULL){
					$data_insertCateID = array(
						'cateID' 				=> 	$arrayCateID,
						'newsLandID' 			=> 	$id,
						'created_at'			=>	gmdate('Y-m-d H:i:s', time()+7*3600)
					);
					$this->query_sql->add('tbl_newsland_menu', $data_insertCateID);
				}
				//Update image dropzon
				$arrayPhotoID = $this->input->post('photoID');
				if($arrayPhotoID != NULL){
					foreach ($arrayPhotoID as $key_arrayPhotoID => $val_arrayPhotoID) {
						$data_update_photo = array(
							'newsLandID' => 	$id,
						);
						$result = $this->query_sql->edit('tbl_newsland_photo', $data_update_photo, array('uuid' => $val_arrayPhotoID));
					}
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
		}
		$data['menus'] = $this->CI_function->getSelectCategory(0,'',$data['datas']['cateid'],2);
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['district'] = $this->query_sql->select_array('tbl_district','id,name',array('city_id' => $data['datas']['city_id']));
		$data['ward'] = $this->query_sql->select_array('tbl_ward','id,name',array('district_id' => $data['datas']['district_id']));
		$data['street'] = $this->query_sql->select_array('tbl_street','id,name',array('ward_id' => $data['datas']['ward_id']));
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',array('publish' => 1),'sort asc');
		$data['errors'] = $errors;
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
	public function upload()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$random = rand(10,100000);
		if (!empty($_FILES)) {
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $_FILES['file']['name'];
			$new_fileName = explode('.',$fileName);
			$new_fileName = $new_fileName[0].'-'.$random.'.'.$new_fileName[1];
			$targetPath = getcwd() . '/upload/newsLand/detail/';
			$targetFile = $targetPath . $new_fileName;
			move_uploaded_file($tempFile, $targetFile);

			$this->load->library('image_lib');
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'upload/newsLand/detail/'.$new_fileName;
			$config['new_image'] = 'upload/newsLand/detail/thumb/'.$new_fileName;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 300;
			$config['height'] = 300;

			$name_img = explode('.',$new_fileName);
			$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];

			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			$data_insert = array(
				'image' 		=> 	$new_fileName,
				'thumb' 		=> 	$name_img_thumb,
				'uuid' 			=> 	$_POST['uuid'],
				'created_at'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$flag = $this->query_sql->add('tbl_newsland_photo', $data_insert);
			$arrID = array(
				'id' => $flag['id_insert']
			);
			echo json_encode($arrID);
		}
	}
	public function deldropzone(){
		$uuid = $_POST['uuid'];
		$data = $this->query_sql->select_row('tbl_newsland_photo', 'id,image,thumb', array('uuid' => $uuid));
		$file = "upload/newsLand/detail/".$data['image'];
		$thumb = "upload/newsLand/detail/thumb/".$data['thumb'];
		unlink($file);
		unlink($thumb);
		$this->query_sql->del('tbl_newsland_photo',array('uuid' => $uuid));
	}
	public function deldropzonebyID(){
		$id = $_POST['id'];
		$data = $this->query_sql->select_row('tbl_newsland_photo', 'id,image,thumb', array('id' => $id));
		$file = "upload/newsLand/detail/".$data['image'];
		$thumb = "upload/newsLand/detail/thumb/".$data['thumb'];
		unlink($file);
		unlink($thumb);
		$this->query_sql->del('tbl_newsland_photo',array('id' => $id));
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
		$datas = $this->query_sql->select_row($this->table, 'id,image,thumb,alias', array('id' => $id));
		$file_image = $this->path_dir.$datas['image'];
		$file_thumb = $this->path_dir_thumb.$datas['thumb'];
		if($datas['image'] != ''){ unlink($file_image); }
		if($datas['thumb'] != ''){ unlink($file_thumb); }
		///Detail
		$photo = $this->query_sql->select_array('tbl_newsland_photo', 'id,image,thumb', array('newsLandID' => $id));
		foreach ($photo as $key_photo => $val_photo) {
			$file_image_detail = 'upload/newsLand/detail/'.$val_photo['image'];
			$file_thumb_detail = 'upload/newsLand/detail/thumb/'.$val_photo['thumb'];
			if($val_photo['image'] != ''){ unlink($file_image_detail); }
			if($val_photo['thumb'] != ''){ unlink($file_thumb_detail); }
		}
		//Delete
		$this->query_sql->del('tbl_alias',array('alias' => $datas['alias']));
		$this->query_sql->del('tbl_newsland_menu',array('newsLandID' => $id));
		$this->query_sql->del('tbl_newsland_photo',array('newsLandID' => $id));
		$this->query_sql->del($this->table,array('id' => $id));
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
			///Detail
			$photo = $this->query_sql->select_array('tbl_newsland_photo', 'id,image,thumb', array('newsLandID' => $val));
			foreach ($photo as $key_photo => $val_photo) {
				$file_image_detail = 'upload/newsLand/detail/'.$val_photo['image'];
				$file_thumb_detail = 'upload/newsLand/detail/thumb/'.$val_photo['thumb'];
				if($val_photo['image'] != ''){ unlink($file_image_detail); }
				if($val_photo['thumb'] != ''){ unlink($file_thumb_detail); }
			}
			//Delete
			$this->query_sql->del('tbl_alias',array('alias' => $datas['alias']));
			$this->query_sql->del('tbl_newsland_menu',array('newsLandID' => $val));
			$this->query_sql->del('tbl_newsland_photo',array('newsLandID' => $val));
			$this->query_sql->del($this->table,array('id' => $val));
		}
	}
}
