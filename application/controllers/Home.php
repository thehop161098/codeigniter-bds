<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');

	}
	public function __destruct(){
	}
	public function index()
	{
		$data['data_index'] = $this->get_index();
		$data['title'] = $data['data_index']['system']['title'];
		$data['keyword'] = $data['data_index']['system']['meta_keyword'];
		$data['description'] = $data['data_index']['system']['meta_description'];
		$data['image'] = 'upload/logo/thumb/'.$data['data_index']['logo']['thumb'];
		// newsHome
		$data['newsHome'] = $this->query_sql->select_array('tbl_news','id,name,des,alias,thumb',array('publish' => 1,'home'=> 1),'id desc',0,5);
		// bdsHot
		$bdsHot = $this->query_sql->select_array('tbl_news_land','id,name,alias,price,price_detail,area,unit,deal,created_at,thumb,district_id,cateid',array('publish' => 1,'hot'=> 1),'id desc');
		if(! empty($bdsHot)) {
			foreach ($bdsHot as $key_bdsHot => $val_bdsHot) {
				$bdsHot[$key_bdsHot]['infoDistrict'] = $this->query_sql->select_row('tbl_district','id,name,alias',array('id' => $val_bdsHot['district_id']));
				$bdsHot[$key_bdsHot]['infoCate'] = $this->query_sql->select_row('tbl_category','id,name,alias',array('id' => $val_bdsHot['cateid'], 'publish' => 1));
			}
		}
		// bdsHome
		$bdsHome = $this->query_sql->select_array('tbl_category','id,name,alias',array('publish' => 1,'home'=> 1),'sort desc');
		if(! empty($bdsHome)) {
			foreach ($bdsHome as $key_bdsHome => $val_bdsHome) {
				$arrayBdsID = $this->CI_function->getListMenuId($val_bdsHome['id']);
				if(empty($arrayBdsID))
				{
					$arrayBdsID = [0];
				}
				$bdsHome[$key_bdsHome]['child'] = $this->query_sql->select_array_wherein('tbl_news_land','id,name,alias,price,price_detail,unit,deal,area,created_at,thumb,district_id,cateid',array('publish' => 1),'cateid',$arrayBdsID,'id desc',0,6);
				if(! empty($bdsHome[$key_bdsHome]['child'])) {
					foreach ($bdsHome[$key_bdsHome]['child'] as $key_child => $val_child) {
						$bdsHome[$key_bdsHome]['child'][$key_child]['infoDistrict'] = $this->query_sql->select_row('tbl_district','id,name,alias',array('id' => $val_child['district_id']));
						$bdsHome[$key_bdsHome]['child'][$key_child]['infoCate'] = $this->query_sql->select_row('tbl_category','id,name,alias',array('id' => $val_child['cateid'], 'publish' => 1));
					}
				}
			}
		}
		/////
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1),'sort asc');
		//////
		$data['bdsHome'] = $bdsHome;
		$data['bdsHot'] = $bdsHot;
		$data['template'] = 'frontend/home/index';
		$this->load->view('frontend/default/index', isset($data)?$data:NULL);
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

	function error(){
		show_404();
	}
	function page404(){
		$data['data_index'] = $this->get_index();
		$data['title'] = '404';
		$this->load->view('frontend/default/404', isset($data)?$data:NULL);
	}
}
