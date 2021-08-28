<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//for module frontend
class MY_Controller extends CI_Controller {
	public function __construct(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		parent::__construct();
	}
	protected function get_index(){
		// if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
	 //        $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	 //        redirect($url);
	 //        exit;
	 //    }
		$data['logo'] = $this->get_logo();
		$data['system'] = $this->get_system();
		$data['contact'] = $this->get_contact();
		$data['socials'] = $this->get_socials();
		$data['googles'] = $this->get_googles();
		$data['contentSite'] = $this->get_contentSite();
		$data['active_sys'] = $this->get_ActiveRes();
		$data['menu_left'] = $this->getMenuLeft();
		$data['menu_footer'] = $this->getMenuFooter();
		$data['tags'] = $this->getTags();
		$data['menuFull'] = $this->getMenuFull();
		$data['cateMain'] = $this->getCateMain();
		$data['info'] = $this->get_info();
		$data['crt'] = $this->get_control();
		$data['act'] = $this->get_act();
		$data['subTotal'] = $this->subTotal();
		$data['qty'] = $this->qty();
		$data['numberOrder'] = $this->get_number_cart();
		$data['breadcrumb'] = $this->breadcrumb();
		$data['menuCity'] = $this->getMenuCity();
		$data['news_right'] = $this->getNewsRight();
		$data['bannerSide'] = $this->getBannerSide();
		$data['listCity'] = $this->getListCity();
		return $data;
	}
	//
	protected function get_logo(){
		$data = $this->db->select('name,link,thumb,image')->from('tbl_photo')->where('type', 'logo')->get()->row_array();
		if($data['link'] == ''){
			$data['link'] = base_url();
		}
		return $data;
	}
	protected function subTotal(){
		$data = $this->cart->contents();
		$subTotal = 0;
		if($data != NULL){
			foreach ($data as $key => $val) {
				$subTotal += $val['subtotal'];
			}
		}
		return $subTotal;
	}
	protected function qty(){
		$data = $this->cart->contents();
		$qty = 0;
		if($data != NULL){
			foreach ($data as $key => $val) {
				$qty += $val['qty'];
			}
		}
		return $qty;
	}
	protected function get_number_cart(){
		$data = $this->cart->contents();
		return $data;
	}
	protected function get_system(){
		$system = $this->db->select('contents')->from('tbl_system')->where('type', 'system')->get()->row_array();
		$data = json_decode($system['contents'],true);
		return $data;
	}
	protected function get_contentSite(){
		$system = $this->db->select('contents')->from('tbl_system')->where('type', 'contentSite')->get()->row_array();
		$data = json_decode($system['contents'],true);
		return $data;
	}
	protected function get_ActiveRes(){
		$system = $this->db->select('contents')->from('tbl_system')->where('type', 'registerCus')->get()->row_array();
		$data = json_decode($system['contents'],true);
		return $data;
	}
	protected function get_contact(){
		$system = $this->db->select('contents')->from('tbl_system')->where('type', 'contact')->get()->row_array();
		$data = json_decode($system['contents'],true);
		$search = [',', '.',' ','-'];
		$replace   = [''];
		$data['phone_sp_detail'] = str_replace($search, $replace, $data['phone_sp']);
		$data['zalo_mobile'] = str_replace($search, $replace, $data['zalo_mobile']);
		$data['phone_mobile'] = str_replace($search, $replace, $data['phone_mobile']);
		return $data;
	}
	protected function get_socials(){
		$system = $this->db->select('contents')->from('tbl_system')->where('type', 'socials')->get()->row_array();
		$data = json_decode($system['contents'],true);
		return $data;
	}
	protected function get_googles(){
		$system = $this->db->select('contents')->from('tbl_system')->where('type', 'googles')->get()->row_array();
		$data = json_decode($system['contents'],true);
		return $data;
	}
	protected function getMenuCity() {
		$data = $this->query_sql->select_array('tbl_city','id,name,alias',NULL,'id desc');
		return $data;
	}
	protected function getNewsRight() {
		$data = $this->query_sql->select_array('tbl_category','id,name',array('publish' => 1, 'right' => 1, 'type' => 1),'sort desc');
		if(! empty($data)) {
			foreach ($data as $key => $val) {
				$data[$key]['child'] = $this->query_sql->select_array('tbl_news','id,name,alias,thumb',array('publish' => 1, 'cateid' => $val['id']),'id desc',0,5);
			}
		}
		return $data;
	}
	protected function getBannerSide() {
		$data = $this->query_sql->select_array('tbl_photo','id,name,link,thumb',array('publish' => 1, 'type' => 'banner'),'sort desc');
		return $data;
	}
	protected function getListCity(){
		$data = $this->query_sql->select_array('tbl_city','id,name,alias',NULL,'id asc');
		return $data;
	}

	protected function getMenuLeft(){
		$data = $this->db->select('*')->from('tbl_category')->where(array('publish' => 1,'left' => 1))->order_by('sort asc, id desc')->get()->result_array();
		if($data != NULL){
			foreach ($data as $key => $val) {
				$data_child = $this->db->select('*')->from('tbl_category')->where(array('publish' => 1,'parentid' => $val['id']))->get()->result_array();
				if($data_child != NULL){
					foreach ($data_child as $key_data_child => $val_data_child) {
						$data_child2 = $this->db->select('*')->from('tbl_category')->where(array('publish' => 1,'parentid' => $val_data_child['id']))->get()->result_array();
						$data_child[$key_data_child]['child'] = $data_child2;
					}
				}
				$data[$key]['child'] = $data_child;
			}
		}
		return $data;
	}
	protected function getMenuFooter(){
		$data = $this->db->select('*')->from('tbl_menu')->where(array('publish' => 1,'footer' => 1))->order_by('sort asc, id desc')->get()->result_array();
		if($data != NULL){
			foreach ($data as $key => $val) {
				if($val['type'] == 0) {
					$url = $val['link'];
				} else {
					$cate = $this->db->select('id,alias')->from('tbl_category')->where(array('id' => $val['categoryid']))->get()->row_array();
					$url = $cate['alias'];
				}
				$data[$key]['url'] = $url;
				// Child
				$data_child = $this->db->select('*')->from('tbl_menu')->where(array('publish' => 1,'parentid' => $val['id']))->get()->result_array();
				if($data_child != NULL){
					foreach ($data_child as $key_data_child => $val_data_child) {
						if($val_data_child['type'] == 0) {
							$url = $val_data_child['link'];
						} else {
							$cateChild = $this->db->select('id,alias')->from('tbl_category')->where(array('id' => $val_data_child['categoryid']))->get()->row_array();
							$url = $cateChild['alias'];
						}
						$data_child2 = $this->db->select('*')->from('tbl_menu')->where(array('publish' => 1,'parentid' => $val_data_child['id']))->get()->result_array();
						$data_child[$key_data_child]['url'] = $url;
						$data_child[$key_data_child]['child'] = $data_child2;
					}
				}
				$data[$key]['child'] = $data_child;
			}
		}
		return $data;
	}
	protected function getTags(){
		$data = $this->db->select('*')->from('tbl_tags')->order_by('id desc')->limit(8,0)->get()->result_array();
		return $data;
	}
	protected function getMenuFull(){
		$data = $this->db->select('*')->from('tbl_menu')->where(array('publish' => 1,'main'=> 1,'parentid' => 0))->order_by('sort asc, id desc')->get()->result_array();
		if($data != NULL){
			foreach ($data as $key => $val) {
				if($val['type'] == 0) {
					$url = $val['link'];
				} else {
					$cate = $this->db->select('id,alias')->from('tbl_category')->where(array('id' => $val['categoryid']))->get()->row_array();
					$url = $cate['alias'];
				}
				$data[$key]['url'] = $url;
				// child
				$data_child = $this->db->select('*')->from('tbl_menu')->where(array('publish' => 1,'parentid' => $val['id']))->get()->result_array();
				if($data_child != NULL){
					foreach ($data_child as $key_data_child => $val_data_child) {
						if($val_data_child['type'] == 0) {
							$url = $val_data_child['link'];
						} else {
							$cateChild = $this->db->select('id,alias')->from('tbl_category')->where(array('id' => $val_data_child['categoryid']))->get()->row_array();
							$url = $cateChild['alias'];
						}
						// child
						$data_child2 = $this->db->select('*')->from('tbl_menu')->where(array('publish' => 1,'parentid' => $val_data_child['id']))->get()->result_array();
						$data_child[$key_data_child]['url'] = $url;
						$data_child[$key_data_child]['child'] = $data_child2;
					}
				}
				$data[$key]['child'] = $data_child;
			}
		}
		return $data;
	}
	protected function getCateMain(){
		$data = $this->db->select('id,name,link,type,categoryid')->from('tbl_menu')->where(array('publish' => 1,'main' => 1))->order_by('sort asc, id desc')->get()->result_array();
		if($data != NULL){
			foreach ($data as $key => $val) {
				if($val['type'] == 0) {
					$url = $val['link'];
				} else {
					$cate = $this->db->select('id,alias')->from('tbl_category')->where(array('id' => $val['categoryid']))->get()->row_array();
					$url = $cate['alias'];
				}
				$data[$key]['url'] = $url;
				// child
				$dataChild = $this->db->select('id,name,link,type,categoryid')->from('tbl_menu')->where(array('publish' => 1,'parentid' => $val['id']))->order_by('sort asc, id desc')->get()->result_array();
				if($dataChild != NULL){
					foreach ($dataChild as $key_child => $val_child) {
						if($val_child['type'] == 0) {
							$url = $val_child['link'];
						} else {
							$cateChild = $this->db->select('id,alias')->from('tbl_category')->where(array('id' => $val_child['categoryid']))->get()->row_array();
							$url = $cateChild['alias'];
						}
						$dataChild2 = $this->db->select('id,name,link')->from('tbl_menu')->where(array('publish' => 1,'parentid' => $val_child['id']))->order_by('sort asc, id desc')->get()->result_array();
						$dataChild[$key_child]['url'] = $url;
						$dataChild[$key_child]['child'] = $dataChild2;
					}
				}
				$data[$key]['child'] = $dataChild;
			}
		}
		return $data;
	}
	protected function getInfoUserSignin(){
		return $this->CI_auth->getInfoUser();
	}
	protected function get_info(){
		$data = $this->query_sql->select_array('tbl_info', 'id,name,content,keys', array('publish' => 1), 'id asc');
		$arr_key = NULL;
		if(isset($data) && $data != NULL){
			foreach ($data as $key => $val) {
				$arr_key[$val['keys']] = $val['content'];
			}
		}
		return $arr_key;
	}
	protected function get_act(){
		$data = $this->router->fetch_method();
		return $data;
	}
	protected function get_control(){
		$data = $this->router->fetch_class();
		return $data;
	}
	protected function breadcrumb(){
		$model = $this->get_control();
		$act = $this->get_act();
		if($model == 'route'){
			if($act == 'index'){
				$segment = $this->uri->segment(1);
				$checkLink = substr($_SERVER['REQUEST_URI'], -1, 1);
				$data = $this->query_sql->select_row('tbl_alias','*',array('alias' => $segment));

				if($data['type'] == 1){
					$cate = $this->query_sql->select_row('tbl_category', 'id, name, alias, parentid', array('alias' => $data['alias']));
					$name = $cate['name'];
					$dataCate = $this->CI_function->getCateBreadcrumb($cate['parentid'],0);
				}
				if($data['type'] == 4){
					$news = $this->query_sql->select_row('tbl_news', 'id, name, alias, cateid', array('alias' => $data['alias']));
					$name = $news['name'];
					$cate = $this->query_sql->select_row('tbl_category', 'id, name, alias, parentid', array('id' => $news['cateid']));
					$cate_name = $cate['name'];
					$cate_alias = $cate['alias'];
					$dataCate = $this->CI_function->getCateBreadcrumb($cate['parentid'],0);
				}
				if($data['type'] == 2){
					$cate = $this->query_sql->select_row('tbl_category', 'id, name, alias, parentid', array('alias' => $data['alias']));
					$name = $cate['name'];
					$dataCate = $this->CI_function->getCateBreadcrumb($cate['parentid'],0);
				}
				if($data['type'] == 3){
					$news = $this->query_sql->select_row('tbl_news_land', 'id, name, alias, cateid', array('alias' => $data['alias']));
					$name = $news['name'];
					$cate = $this->query_sql->select_row('tbl_category', 'id, name, alias, parentid', array('id' => $news['cateid']));
					$cate_name = $cate['name'];
					$cate_alias = $cate['alias'];
					$dataCate = $this->CI_function->getCateBreadcrumb($cate['parentid'],0);
				}
				if($data['type'] == 5){
					$cate = $this->query_sql->select_row('tbl_city', 'id, name, alias', array('alias' => $data['alias']));
					$name = $cate['name'];
				}
				if($data['type'] == 6){
					$cate = $this->query_sql->select_row('tbl_district', 'id, name, alias', array('alias' => $data['alias']));
					$name = $cate['name'];
				}
				if($data['type'] == 7){
					$cate = $this->query_sql->select_row('tbl_ward', 'id, name, alias', array('alias' => $data['alias']));
					$name = $cate['name'];
				}
			}
		}
		return array('name' => $name,'cate_name' => $cate_name,'cate_alias' => $cate_alias,'dataCate' => $dataCate);
	}

}


//for module backend
class Admin_Controller extends CI_Controller {
	public function __construct(){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		parent::__construct();

	}
	protected function get_index(){
		//$this->check_permission();
		$data['info_admin'] = $this->get_admin();
		// $data['system'] = $this->get_system();
		// $data['tickettype'] = $this->get_ticket_type();
		$data['role'] = $this->get_role();
		$data['module'] = $this->get_module();
		$data['contact'] = $this->get_contact();
		return $data;
	}
	protected function get_lang(){
		$data = '';
		return $data;
	}
	protected function get_contact(){
		$system = $this->db->select('contents')->from('tbl_system')->where('type', 'contact')->get()->row_array();
		$data = json_decode($system['contents'],true);
		$search = [',', '.',' ','-'];
		$replace   = [''];
		$data['phone_sp_detail'] = str_replace($search, $replace, $data['phone_sp']);
		$data['zalo_mobile'] = str_replace($search, $replace, $data['zalo_mobile']);
		$data['phone_mobile'] = str_replace($search, $replace, $data['phone_mobile']);
		return $data;
	}
	protected function get_admin(){
		if($this->CI_auth->check_logged()){
			$id_user = $this->CI_auth->logged_id();
			$data = $this->db->select('*')->from('tbl_admin')->where('id', $id_user)->get()->row_array();
			return $data;
		}
	}
	protected function check_permission(){
		$user = $this->CI_auth->logged_info();
		if($user != NULL){
			$ctrl = $this->router->fetch_class();
			if($ctrl != 'home'){
				$module = $this->db->select('id')->from('tbl_module')->where('ctr', $ctrl)->get()->row_array();
				$permission = $this->db->select('active')->from('tbl_permission')->where(array('moduleid' => $module['id'],'roleid' => $user['role_id']))->get()->row_array();
				if($permission['active'] == 0){
					redirect(base_url().'otadmin/home/notpermission');
				}
			}
		}
	}
	protected function get_system(){
		$data = $this->db->select('*')->from('ot_system')->where('id', 1)->get()->row_array();
		return $data;
	}
	protected function get_module(){
		$user = $this->CI_auth->logged_info();
		if($user != NULL){
			$data = $this->db->select('*')->from('tbl_module')->where(array('publish' => 1,'parentid' => 0))->order_by('sort asc')->get()->result_array();
			if($data != NULL){
				foreach ($data as $key => $val) {
					$permission = $this->db->select('active')->from('tbl_permission')->where(array('moduleid' => $val['id'],'roleid' => $user['role_id']))->get()->row_array();
					if($permission == NULL){
						$data[$key]['active'] = 0;
					}else{
						$data[$key]['active'] = $permission['active'];
					}

					$child = $this->db->select('*')->from('tbl_module')->where(array('publish' => 1,'parentid' => $val['id']))->order_by('sort asc')->get()->result_array();
					if($child != NULL){
						foreach ($child as $key_child => $val_child) {
							$permission_child = $this->db->select('active')->from('tbl_permission')->where(array('moduleid' => $val_child['id'],'roleid' => $user['role_id']))->get()->row_array();
							if($permission_child == NULL){
								$child[$key_child]['active'] = 0;
							}else{
								$child[$key_child]['active'] = $permission_child['active'];
							}

						}
					}
					$data[$key]['child'] = $child;
				}
			}
			return $data;
		}
	}
	protected function get_role(){
		$data = $this->db->select('*')->from('tbl_role')->where('publish', 1)->order_by('id desc')->get()->result_array();
		return $data;
	}
}
