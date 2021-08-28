<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

	public function index()
	{
		$errors = [];
		$datas = isset($_POST['Contact']) ? $_POST['Contact'] : '';
		if (!empty($datas)) {
			$datas['type'] = 'contact';
			$datas['created_at'] = gmdate('Y-m-d H:i:s', time()+7*3600);
			if(empty($datas['name']))
			{
				$errors['name'] = 'Trường bắt buộc';
			}
			//Check phone
			$pattern = '/(0[2-9])+([0-9]{8})\b/';
			if(empty($datas['phone']))
			{
				$errors['phone'] = "Trường bắt buộc.";
			}elseif(!preg_match($pattern, trim($datas['phone']))) {
				$errors['phone'] = "Số điện thoại không đúng.";
			}
			//check email
			if (empty($datas['email']))
			{
				$errors['email'] = 'Trường bắt buộc';
			} else {
				if(filter_var($datas['email'], FILTER_VALIDATE_EMAIL) === false)
				{
					$errors['email'] = 'Email không đúng định dạng';
				}
			}
			if(empty($datas['description']))
			{
				$errors['description'] = 'Trường bắt buộc';
			}
			if(empty($errors))
			{
				$result = $this->query_sql->add('tbl_contact', $datas);
				if(isset($result['type']) && $result['type'] == 'successful'){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Gửi liên hệ thành công!!',
					));
					redirect(''.base_url().'lien-he.html');
				} else {
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Gửi liên hệ không thành công!!',
					));
					redirect(''.base_url().'lien-he.html');
				}
			}
		}
		$data_index = $this->get_index();
		//Get All Address
		$data['allAddress'] = $this->query_sql->select_array('tbl_showroom','id,name',['publish' => 1],'sort desc');
		$data['allMap'] = $this->query_sql->select_array('tbl_map_showroom','*',['publish' => 1],'sort desc');
		if(! empty($data['allAddress'])) {
			foreach ($data['allAddress'] as $key_map => $val_map) {
				$data['allAddress'][$key_map]['child'] = $this->query_sql->select_array('tbl_map_showroom','*',['publish' => 1, 'showroomID' => $val_map['id']],'sort desc');
			}
		}
		$this->load->view('frontend/default/index', [
			'template' => 'frontend/contact/index',
			'data_index' => $data_index,
			'data' => $data,
			'datas' => $datas,
			'errors' => $errors,
			'title' => 'Liên hệ - '.$data_index['system']['title'],
			'meta_keyword' => $data_index['system']['meta_keyword'],
			'meta_description' => $data_index['system']['meta_description']
		]);
	}
}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */
