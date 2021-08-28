<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends MY_Controller {

	public function index()
	{	

		$typeID = $_POST['typeID'];
		$news = $this->query_sql->select_row('tbl_news','id,alias',array('id' => $typeID));
		$data_insert = array(
			'fullname' 			=> 	trim($_POST['fullname']),
			'email' 			=> 	trim($_POST['email']),
			'phone' 			=> 	trim($_POST['phone']),
			'content' 			=> 	trim($_POST['content']),
			'publish'			=>	0,
			'type'				=>	'news',
			'typeID'			=>	$typeID,
			'parentid'			=>	0,
			'created_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
		);
		$result = $this->query_sql->add('tbl_comment', $data_insert);
		if($result > 0){
			echo json_encode(array('rs' => 1));
		}else{
			echo json_encode(array('rs' => 0));
		}
	}
}