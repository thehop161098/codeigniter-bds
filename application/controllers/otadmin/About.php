<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Admin_Controller {
	//Config Module
	var $title = 'Giới thiệu';
	var $path_dir = 'upload/about/';
	var	$path_dir_thumb = 'upload/about/thumb/';
	var	$path_url = 'otadmin/about/';
	var	$table = 'tbl_about';
	var	$template = 'backend/about/';
	var	$control = 'about';
	var	$width_thumb = 700;
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

		$data['datas'] = $this->query_sql->select_row($this->table, '*');
		if($this->input->post()){
			
			$data_update = array(
				'name' 			=> 	trim($this->input->post('name')),
				'des' 			=> 	trim($this->input->post('des')),
				'video' 			=> 	trim($this->input->post('video')),
				'publish'		=>	$this->input->post('publish'),
				'updated_at'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);

			$result = $this->query_sql->edit($this->table, $data_update, array('id' => 1));
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
		$this->load->view('backend/default/index', isset($data)?$data:NULL);
	}
	// public function delete_image(){
 //    	if($this->CI_auth->check_logged() === false){redirect(base_url().'otadmin/login.html');}
	// 	$image = $_POST['image'];
	// 	$datas = $this->query_sql->select_row($this->table, 'id,image,thumb', array('thumb' => $image));
	// 	if($datas != NULL){
	// 		$file_image = $this->path_dir.$datas['image'];
	// 		$file_image_thumb = $this->path_dir_thumb.$datas['thumb'];
	// 		if($datas['image'] != ''){ unlink($file_image); }
	// 		if($datas['thumb'] != ''){ unlink($file_image_thumb); }
	// 		$data_update = [
	// 			'image' => '',
	// 			'thumb' => '',
	// 		];
	// 		$this->query_sql->edit($this->table, $data_update, array('id' => $datas['id']));
	// 	}
	// }
}
