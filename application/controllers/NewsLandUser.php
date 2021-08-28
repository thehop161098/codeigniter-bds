<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsLandUser extends MY_Controller {
	var $path_dir = 'upload/newsLand/';
	var	$path_dir_thumb = 'upload/newsLand/thumb/';
	var	$table = 'tbl_news_land';

	/////
	public function index()
	{
		if(!$this->CI_auth->checkSignin()){ redirect(base_url()); }

		$data['datas'] = $this->query_sql->select_array($this->table,'*',array('id_user' => $this->session->userdata('userID'), 'role_id' => ROLE_USER),'id desc');
		if($data['datas'] != NULL){
			foreach ($data['datas'] as $key => $val) {
				$cate_name = '(---------)';
				$cate_parent = '(---------)';
				$infoCate = $this->query_sql->select_row('tbl_category', 'name,parentid', array('id' => $val['cateid']));
				if($infoCate != NULL){
					$cate_name = $infoCate['name'];
					$infoCateChild = $this->query_sql->select_row('tbl_category', 'name', array('id' => $infoCate['parentid']));
					if($infoCateChild != NULL){
						$cate_parent = $infoCateChild['name'];
					}
				}
				$data['datas'][$key]['cate_name'] = $cate_name;
				$data['datas'][$key]['cate_name_parent'] = $cate_parent;
				$data['datas'][$key]['city_name'] = $this->query_sql->select_row('tbl_city', 'name', array('id' => $val['city_id']));
			}
		}
		// echo "<pre>";
		// print_r ($data['datas']);
		// echo "</pre>";die;

		$data_index = $this->get_index();
		$this->load->view('frontend/default/index', [
			'template' => 'frontend/newsLandUser/index',
			'data_index' => $data_index,
			'data' => $data,
			'title' => 'Danh sách đăng tin',
			'meta_keyword' => $data_index['system']['meta_keyword'],
			'meta_description' => $data_index['system']['meta_description']
		]);
	}
	public function newsPost() {
		if(!$this->CI_auth->checkSignin()){ redirect(base_url()); }
		$data_old = $this->input->post();
		if($data_old){
			//Create Alias
			$name = trim($this->input->post('name'));
			$alias = $this->CI_function->create_alias($name);
			$type = 3;
			if($type > 0){
				$alias = $this->CI_function->createdAlias($alias,$type);
			}
			///format
			$price = str_replace(',', '',$this->input->post('price'));
			$price_detail = $this->CI_function->jam_read_num_forvietnamese($price);
			///
			$row_user = $this->query_sql->select_row('tbl_admin', 'id,role_id', array('id' => $this->session->userdata('userID')));
			///
			if(! empty($row_user)) {
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
				//////////
				$data_insert = array(
					'id_user' 				=> 	$row_user['id'],
					'role_id' 				=> $row_user['role_id'],
					'name' 				=> 	trim($this->input->post('name')),
					'alias' 			=> 	$alias,
					'city_id'				=>	$this->input->post('city_id'),
					'district_id'				=>	$this->input->post('district_id'),
					'ward_id'				=>	$this->input->post('ward_id'),
					'street_id' 				=> 	trim($this->input->post('street_id')),
					'dia_chi' 				=> 	trim($this->input->post('dia_chi')),
					'map_lat' 				=> 	trim($this->input->post('map_lat')),
					'map_long' 				=> 	trim($this->input->post('map_long')),
					'direction_id' 				=> 	trim($this->input->post('direction_id')),
					'area'				=>	$this->input->post('area'),
					'unit'				=>	$this->input->post('unit'),
					'deal'				=>	$this->input->post('deal'),
					'price'				=>	$price,
					'price_detail'				=>	$price_detail,
					'number_floor' 				=> 	trim($this->input->post('number_floor')),
					'room' 				=> 	trim($this->input->post('room')),
					'toliet' 				=> 	trim($this->input->post('toliet')),
					'image' 			=>  $name_image,
					'thumb' 			=>  $name_thumb,
					'cateid' 				=> 	trim($this->input->post('cateid')),
					'facade' 				=> 	trim($this->input->post('facade')),
					'highway' 				=> 	trim($this->input->post('highway')),
					'video' 				=> 	trim($this->input->post('video')),
					'content' 				=> 	trim($this->input->post('content')),
					'publish' 				=> 	0,
					'created_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$result = $this->query_sql->add($this->table, $data_insert);
				$newsLandID = $result['id_insert'];
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
					redirect('danh-sach-dang-tin.html');
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Thêm mới lỗi!!',
					));
					redirect('dang-tin.html');
				}
			} else {
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Thêm mới lỗi!!',
				));
				redirect('dang-tin.html');
			}
		}

		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',array('publish' => 1),'sort asc');
		$data['data_old'] = $data_old;
		//////
		$data_index = $this->get_index();
		$this->load->view('frontend/default/index', [
			'template' => 'frontend/newsLandUser/add',
			'data_index' => $data_index,
			'data' => $data,
			'title' => 'Đăng tin',
			'meta_keyword' => $data_index['system']['meta_keyword'],
			'meta_description' => $data_index['system']['meta_description']
		]);
	}
	public function editPost($id) {
		if(!$this->CI_auth->checkSignin()){ redirect(base_url()); }
		$data['path_dir_thumb'] = $this->path_dir_thumb;
		//edit
		$data['datas'] = $this->query_sql->select_row($this->table, '*', array('id' => $id));
		$data['photoList'] = $this->query_sql->select_array('tbl_newsland_photo', 'id,thumb', array('newsLandID' => $id));
		$parentid = $this->query_sql->select_row('tbl_category', 'parentid', array('id' => $data['datas']['cateid']));
		$data['cateidParent'] = $parentid['parentid'];
		if($this->input->post()){
			//upload image
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
			//Create Alias
			$name = trim($this->input->post('name'));
			$alias = $this->CI_function->create_alias($name);
			$type = 3;
			if($type > 0){
				$alias = $this->CI_function->createdAlias($alias,$type,$data['datas']['alias']);
			}
			///format
			$price = str_replace(',', '',$this->input->post('price'));
			$price_detail = $this->CI_function->jam_read_num_forvietnamese($price);
			///
			$data_update = array(
				'id_user' 				=> 	$data['datas']['id_user'],
				'role_id' 				=> $data['datas']['role_id'],
				'name' 				=> 	trim($this->input->post('name')),
				'alias' 			=> 	$alias,
				'city_id'				=>	$this->input->post('city_id'),
				'district_id'				=>	$this->input->post('district_id'),
				'ward_id'				=>	$this->input->post('ward_id'),
				'street_id' 				=> 	trim($this->input->post('street_id')),
				'dia_chi' 				=> 	trim($this->input->post('dia_chi')),
				'map_lat' 				=> 	trim($this->input->post('map_lat')),
				'map_long' 				=> 	trim($this->input->post('map_long')),
				'direction_id' 				=> 	trim($this->input->post('direction_id')),
				'area'				=>	$this->input->post('area'),
				'unit'				=>	$this->input->post('unit'),
				'deal'				=>	$this->input->post('deal'),
				'price'				=>	$price,
				'price_detail'				=>	$price_detail,
				'number_floor' 				=> 	trim($this->input->post('number_floor')),
				'room' 				=> 	trim($this->input->post('room')),
				'toliet' 				=> 	trim($this->input->post('toliet')),
				'image' 			=>  $name_image,
				'thumb' 			=>  $name_thumb,
				'cateid' 				=> 	trim($this->input->post('cateid')),
				'facade' 				=> 	trim($this->input->post('facade')),
				'highway' 				=> 	trim($this->input->post('highway')),
				'video' 				=> 	trim($this->input->post('video')),
				'content' 				=> 	trim($this->input->post('content')),
				'publish' 				=> 	0,
				'created_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$result = $this->query_sql->edit($this->table, $data_update, array('id' => $id, 'role_id' 				=> ROLE_USER,));
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
					'message'	=> 'Cập nhật thành công!!',
				));
				redirect('danh-sach-dang-tin.html');
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Cập nhật lỗi!!',
				));
				redirect('dang-tin.html');
			}
		}

		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['cateChild'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => $data['cateidParent']));
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['district'] = $this->query_sql->select_array('tbl_district','id,name',array('city_id' => $data['datas']['city_id']));
		$data['ward'] = $this->query_sql->select_array('tbl_ward','id,name',array('district_id' => $data['datas']['district_id']));
		$data['street'] = $this->query_sql->select_array('tbl_street','id,name',array('ward_id' => $data['datas']['ward_id']));
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',array('publish' => 1),'sort asc');
		//////
		$data_index = $this->get_index();
		$this->load->view('frontend/default/index', [
			'template' => 'frontend/newsLandUser/edit',
			'data_index' => $data_index,
			'data' => $data,
			'title' => 'Đăng tin',
			'meta_keyword' => $data_index['system']['meta_keyword'],
			'meta_description' => $data_index['system']['meta_description']
		]);
	}
	public function groundCateID()
	{
		$cateParentID = $_POST['cateParentID'];
		$groundCate = $this->query_sql->select_array('tbl_category','*',array('parentid'=>$cateParentID),'id desc');
		echo '<option value="">Chọn loại nhà đất</option>';
		foreach ($groundCate as $val) {
			echo '<option  value="'.$val['id'].'">'.$val['name'].'</option>';
		}
	}
	public function district()
	{
		$cityID = $_POST['cityID'];
		$district = $this->query_sql->select_array('tbl_district','*',array('city_id'=>$cityID),'id desc');
		echo '<option value="">---Quận/Huyện---</option>';
		foreach ($district as $val) {
			echo '<option  value="'.$val['id'].'">'.$val['name'].'</option>';
		}
	}
	public function ward()
	{
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
	public function upload()
	{
		if(!$this->CI_auth->checkSignin()){ redirect(base_url()); }
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
	public function delete()
	{
		if(!$this->CI_auth->checkSignin()){ redirect(base_url()); }
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

	public function categoryUser($id){
		$fullname = $this->query_sql->select_row('tbl_admin', 'fullname', array('id' => $id));
		if(! empty($id)) {
			$considion = array('publish' => 1, 'id_user' => $id);
			////
			$url_get = $_GET;
			if (isset($url_get['page'])) {
				unset($url_get['page']);
			}
			$str_get = http_build_query($url_get);
			$config = $this->query_sql->_pagination();
			$config['enable_query_strings'] = TRUE;
			$config['page_query_string'] = TRUE;
			$config['query_string_segment'] = 'page';
			$config['base_url'] = base_url().'tin-bds-user/'.$id. $str_get;
			$config['total_rows'] = $this->query_sql->total_where_in('tbl_news_land',$considion);
			$config['per_page'] = 12;
			$config['uri_segment'] = 3;
			$total_page = ceil($config['total_rows'] / $config['per_page']);
			$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
			$page = ($page > $total_page) ? $total_page : $page;
			$page = ($page < 1) ? 1 : $page;
			$page = $page - 1;
			$this->pagination->initialize($config);
			$data['list_pagination'] = $this->pagination->create_links();
			/////////
			if($config['total_rows']>0){
				$newsLand = $this->query_sql->select_array('tbl_news_land','id,name,alias,price,price_detail,area,unit,deal,created_at,thumb,district_id,cateid',$considion,'id desc',($page * $config['per_page']),$config['per_page']);
			}
		}else{
			$newsLand = NULL;
		}
		if(! empty($newsLand)) {
			foreach ($newsLand as $key_newsLand => $val_newsLand) {
				$newsLand[$key_newsLand]['infoDistrict'] = $this->query_sql->select_row('tbl_district','id,name,alias',array('id' => $val_newsLand['district_id']));
				$newsLand[$key_newsLand]['infoCate'] = $this->query_sql->select_row('tbl_category','id,name,alias',array('id' => $val_newsLand['cateid'], 'publish' => 1));
				if($val_newsLand['price'] == 0) {
					$newsLand[$key_newsLand]['price_detail'] = 'Thỏa thuận';
				}
			}
		}

		/////
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1), 'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		////
		$data['newsLand'] = $newsLand;
		$data_index = $this->get_index();
		$this->load->view('frontend/default/index', [
			'template' => 'frontend/newsLandUser/categoryUser',
			'data_index' => $data_index,
			'data' => $data,
			'title' => 'Danh sách đăng tin của '.$fullname['fullname'],
			'meta_keyword' => $data_index['system']['meta_keyword'],
			'meta_description' => $data_index['system']['meta_description']
		]);
	}
}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */
