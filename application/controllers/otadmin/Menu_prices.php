<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_prices extends Admin_Controller {
	//Config Module
	public $title = 'Báo giá';
	public $path_dir = 'upload/menu_prices/';
	public $path_dir_thumb = 'upload/menu_prices/thumb/';
	public $path_url = ADMIN_URL.'menu_prices/';
	public $table = 'tbl_menu_prices';
	public $template = 'backend/menu_prices/';
	public $control = 'menu_prices';
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
		$data['control'] = $this->control;
		$data['data_index'] = $this->get_index();
		//add
		if($this->input->post()){
			$data_insert = array(
				'title_price' 			=> 	trim($this->input->post('title_price')),
				'cateid' 		=> 	trim($this->input->post('cateid')),
				'link_price' 			=> 	trim($this->input->post('link_price')),
				'des_price' 			=> 	trim($this->input->post('des_price')),
				'content_price' 			=> 	trim($this->input->post('content_price')),
				'title_hangmuc' 			=> 	trim($this->input->post('title_hangmuc')),
				'link_hangmuc' 			=> 	trim($this->input->post('link_hangmuc')),
				'des_hangmuc' 			=> 	trim($this->input->post('des_hangmuc')),
				'content_hangmuc' 			=> 	trim($this->input->post('content_hangmuc')),
				'title_sale' 			=> 	trim($this->input->post('title_sale')),
				'link_sale' 			=> 	trim($this->input->post('link_sale')),
				'des_sale' 			=> 	trim($this->input->post('des_sale')),
				'content_sale' 			=> 	trim($this->input->post('content_sale')),
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
			$data_update = array(
				'title_price' 			=> 	trim($this->input->post('title_price')),
				'cateid' 		=> 	trim($this->input->post('cateid')),
				'link_price' 			=> 	trim($this->input->post('link_price')),
				'des_price' 			=> 	trim($this->input->post('des_price')),
				'content_price' 			=> 	trim($this->input->post('content_price')),
				'title_hangmuc' 			=> 	trim($this->input->post('title_hangmuc')),
				'link_hangmuc' 			=> 	trim($this->input->post('link_hangmuc')),
				'des_hangmuc' 			=> 	trim($this->input->post('des_hangmuc')),
				'content_hangmuc' 			=> 	trim($this->input->post('content_hangmuc')),
				'title_sale' 			=> 	trim($this->input->post('title_sale')),
				'link_sale' 			=> 	trim($this->input->post('link_sale')),
				'des_sale' 			=> 	trim($this->input->post('des_sale')),
				'content_sale' 			=> 	trim($this->input->post('content_sale')),
				'publish'		=>	$this->input->post('publish'),
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
