<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');

	}
	public function __destruct(){
	}
	public function index()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Cấu hình chung';

		// $data['system'] = $this->query_sql->select_row('tbl_system','*',array('id' => 1));
		// $data['mail'] = json_decode($data['system']['hostmail'],true);
		// $data['contact'] = json_decode($data['system']['contact'],true);
		// if($this->input->post()){
		// 	if($_FILES["image"]["name"]){
		// 		$file_image = "upload/favicon/".$data['logo']['image'];
		// 		unlink($file_image);
		// 		$logo_dir = 'upload/favicon/'; 
		// 		$config['upload_path']	= $logo_dir;
		// 		$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
		// 		$config['max_size'] = 5120;

				
		// 		$this->load->library('upload', $config); 
		// 		$this->upload->initialize($config); 
		// 		$image = $this->upload->do_upload("image");
		// 		$image_data = $this->upload->data();

		// 		$this->load->library('image_lib');
		// 		$config['image_library'] = 'gd2';
		// 		$config['source_image'] = 'upload/favicon/'.$image_data['file_name'];
		// 		$config['new_image'] = 'upload/favicon/thumb/'.$image_data['file_name'];
		// 		$config['create_thumb'] = TRUE;
		// 		$config['maintain_ratio'] = TRUE;
		// 		$config['width'] = 100;

		// 		$name_img = explode('.',$image_data['file_name']);
		// 		$name_img_thumb = $name_img[0].'_thumb.'.$name_img[1];
				
		// 	    $this->image_lib->initialize($config);
		// 	    $this->image_lib->resize();

		// 		$name_img = $image_data['file_name'];
		// 		$name_img_thumb = $name_img_thumb;
		// 	}else{
		// 		$name_img = $data['logo']['image'];
		// 		$name_img_thumb = $data['logo']['image_thumb'];
		// 	}

		// 	$data_update = array(
		// 		'title' 			=> 	trim($this->input->post('title')),
		// 		'description' 			=> 	trim($this->input->post('description')),
		// 		'image' 		=> 	$name_img,
		// 		'image_thumb' 		=> 	$name_img_thumb,
		// 		'created_at'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
		// 	);
		// 	$flag = $this->query_sql->edit('tbl_system', $data_update, array('id' => 1));
		// 	if($flag>0){
		// 		$this->session->set_flashdata('message_flashdata', array(
		// 			'type'		=> 'sucess',
		// 			'message'	=> 'Cập nhật dữ liệu thành công!',
		// 		));
		// 		redirect('otadmin/dashboard',$data);
		// 	}else{
		// 		$this->session->set_flashdata('message_flashdata', array(
		// 			'type'		=> 'error',
		// 			'message'	=> 'Cập nhật dữ liệu không thành công!',
		// 		));
		// 		redirect('otadmin/dashboard',$data);
		// 	}

		// }

		$data['template'] = 'backend/home/index';
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	public function notpermission()
	{
		if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
		$data['data_index'] = $this->get_index();
		//Config module
		$data['title'] = "Thông báo";
		$data['template'] = 'backend/home/notpermission';
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
}
