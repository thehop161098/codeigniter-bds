<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends Admin_Controller {
	//Config Module
	var $title = 'system';
	var $path_dir = 'upload/system/';
	var	$path_dir_thumb = 'upload/system/thumb/';
	var	$path_url = 'otadmin/system/';
	var	$table = 'tbl_system';
	var	$template = 'backend/system/';
	var	$control = 'system';
	var	$width_thumb = 64;
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

		$system = $this->query_sql->select_row($this->table, 'contents', array('type' => $this->control));
		$data['datas'] = json_decode($system['contents'],true);
		if($this->input->post()){
			if($_FILES["image"]["name"]){
				if (!is_dir($this->path_dir)){mkdir($this->path_dir);}
				if (!is_dir($this->path_dir_thumb)){mkdir($this->path_dir_thumb);}
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
				$config['width'] = $this->width_thumb;

				$ar_name_image = explode('.',$image_data['file_name']);
				$name_thumb = $ar_name_image[0].'_thumb.'.$ar_name_image[1];

			    $this->image_lib->initialize($config);
			    $this->image_lib->resize();
			}else{
				$name_image = $data['datas']['image'];
				$name_thumb = $data['datas']['thumb'];
			}
			$contents = array(
				'title' 			=> 	trim($this->input->post('title')),
				'meta_keyword' 		=> 	trim($this->input->post('meta_keyword')),
				'meta_description' 	=> 	trim($this->input->post('meta_description')),
				'schema' 	=> 	trim($this->input->post('schema')),
				'image' 			=>  $name_image,
				'thumb' 			=>  $name_thumb,
				'link' 		=> 	trim($this->input->post('link')),
				'updated_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);

			$contents = json_encode($contents);
			$data_update['contents'] = $contents;
			$result = $this->query_sql->edit($this->table, $data_update, array('type' => $this->control));
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
		$contentSite = $this->query_sql->select_row($this->table, 'contents', array('type' => 'contentSite'));
		$data['contentSite'] = json_decode($contentSite['contents'],true);
		$contact = $this->query_sql->select_row($this->table, 'contents', array('type' => 'contact'));
		$data['contact'] = json_decode($contact['contents'],true);
		$socials = $this->query_sql->select_row($this->table, 'contents', array('type' => 'socials'));
		$data['socials'] = json_decode($socials['contents'],true);
		$googles = $this->query_sql->select_row($this->table, 'contents', array('type' => 'googles'));
		$data['googles'] = json_decode($googles['contents'],true);
		$registerCus = $this->query_sql->select_row($this->table, 'contents', array('type' => 'registerCus'));
		$data['registerCus'] = json_decode($registerCus['contents'],true);
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function contentSite()
	{
		$contentSite = $this->query_sql->select_row($this->table, 'contents', array('type' => 'contentSite'));
		$datas = json_decode($contentSite['contents'],true);
		if($this->input->post()){
			$contents = array(
				'title_partner' 	=> 	$this->input->post('title_partner'),
				'title_idea' 	=> 	$this->input->post('title_idea'),
				'title_news' 	=> 	$this->input->post('title_news'),
			);

			$contents = json_encode($contents);
			$data_update['contents'] = $contents;
			$result = $this->query_sql->edit($this->table, $data_update, array('type' => 'contentSite'));
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
	public function contact()
	{
		if($this->input->post()){
			$contents = array(
				'company' 	=> 	trim($this->input->post('company')),
				'phone_sp' 	=> 	trim($this->input->post('phone_sp')),
				'email' 	=> 	trim($this->input->post('email')),
				'website' 	=> 	$this->input->post('website'),
				'hotline' 	=> 	trim($this->input->post('hotline')),
				'zalo' 	=> 	trim($this->input->post('zalo')),
				'address' 	=> 	trim($this->input->post('address')),
				'map' 	=> 	trim($this->input->post('map')),
				'fb_mobile' 	=> 	trim($this->input->post('fb_mobile')),
				'zalo_mobile' 	=> 	trim($this->input->post('zalo_mobile')),
				'phone_mobile' 	=> 	trim($this->input->post('phone_mobile')),
				'key_map' 	=> 	trim($this->input->post('key_map')),
			);
			$contents = json_encode($contents);
			$data_update['contents'] = $contents;
			$result = $this->query_sql->edit($this->table, $data_update, array('type' => 'contact'));
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
	public function socials()
	{
		if($this->input->post()){
			$contents = array(
				'fanpage' 	=> 	trim($this->input->post('fanpage')),
				'facebook' 	=> 	trim($this->input->post('facebook')),
				'twitter' 	=> 	trim($this->input->post('twitter')),
				'linkedin' 	=> 	trim($this->input->post('linkedin')),
				'instagram' 	=> 	trim($this->input->post('instagram')),
				'youtube' 	=> 	trim($this->input->post('youtube')),
			);
			$contents = json_encode($contents);
			$data_update['contents'] = $contents;
			$result = $this->query_sql->edit($this->table, $data_update, array('type' => 'socials'));
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
	public function google()
	{
		if($this->input->post()){
			if($_FILES["sitemaps"]["name"]){
				if(!empty($_FILES['sitemaps']))
				{
					unlink(base_url().'sitemap.html');
				    $path = '';
				    $sitemaps = '';
				    $path = $path . basename( $_FILES['sitemaps']['name']);
				    if(move_uploaded_file($_FILES['sitemaps']['tmp_name'], $path)) {
				      	$sitemaps = basename( $_FILES['sitemaps']['name']);
				    } else{
				        echo "Upload sitemap.html lỗi!";die;
				    }
				}
			}
			$contents = array(
				'analytics' 	=> 	trim($this->input->post('analytics')),
				'webmasters' 	=> 	trim($this->input->post('webmasters')),
				'sitemaps' 		=> 	$sitemaps,
			);
			$contents = json_encode($contents);
			$data_update['contents'] = $contents;
			$result = $this->query_sql->edit($this->table, $data_update, array('type' => 'googles'));
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
	public function registerCus()
	{
		if($this->input->post()){
			$contents = array(
				'active_register' 	=> 	$this->input->post('active_register'),
			);

			$contents = json_encode($contents);
			$data_update['contents'] = $contents;
			$result = $this->query_sql->edit($this->table, $data_update, array('type' => 'registerCus'));
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
}
