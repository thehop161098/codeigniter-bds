<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Route extends My_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}

	public function __destruct(){
	}
	public function index($alias,$page = 1)
	{
		$checkLink = substr($_SERVER['REQUEST_URI'], -1, 1);
		$data = $this->query_sql->select_row('tbl_alias','*',array('alias' => $alias));
		if($data == NULL){ redirect('404');  }
		if($data['type'] == 1){
			$result = $this->cate_news($data['alias']);
			$result['template'] = 'frontend/news/category';
		}else if($data['type'] == 4){
			$result = $this->news($data['alias']);
			$result['template'] = 'frontend/news/detail';
		}else if($data['type'] == 2){
			$result = $this->cate_newsLand($data['alias']);
			$result['template'] = 'frontend/newsLand/category';
		}else if($data['type'] == 3){
			$result = $this->newsLand($data['alias']);
			$result['template'] = 'frontend/newsLand/detail';
		}else if($data['type'] == 5){
			$result = $this->city($data['alias']);
			$result['template'] = 'frontend/city/category';
		}else if($data['type'] == 6){
			$result = $this->district($data['alias']);
			$result['template'] = 'frontend/district/category';
		}else if($data['type'] == 7){
			$result = $this->ward($data['alias']);
			$result['template'] = 'frontend/ward/category';
		}else if($data['type'] == 8){
			$result = $this->cate_project($data['alias']);
			$result['template'] = 'frontend/project/category';
		}else{
			$result = $this->project($data['alias']);
			$result['template'] = 'frontend/project/detail';
		}
		$this->load->view('frontend/default/index', isset($result)?$result:NULL);
	}
	//NewsLand
	public function cate_newsLand($alias){
		$data['data_index'] = $this->get_index();
		$menuInfo = $this->query_sql->select_row('tbl_category', 'id,title,meta_description,meta_keyword,name,content,thumb', array('alias' => $alias));
		$arraynewsLandID = $this->CI_function->getListMenuId($menuInfo['id']);
		if(! empty($arraynewsLandID)) {
			$considion = array('publish' => 1);
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
			$config['base_url'] = base_url().$alias. $str_get;
			$config['total_rows'] = $this->query_sql->total_where_in('tbl_news_land',$considion,'cateid',$arraynewsLandID);
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
				$newsLand = $this->query_sql->select_array_wherein('tbl_news_land','id,name,alias,price,price_detail,area,unit,deal,created_at,thumb,district_id,cateid',$considion,'cateid',$arraynewsLandID,'id desc',($page * $config['per_page']),$config['per_page']);
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
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1),'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		////
		$data['title'] = $menuInfo['title'];
		$data['keyword'] = $menuInfo['meta_keyword'];
		$data['description'] = $menuInfo['meta_description'];
		$data['image'] = 'upload/menuNewsLand/thumb/'.$menuInfo['thumb'];
		$data['alias'] = $alias.'/';
		$data['name'] = $menuInfo['name'];
		$data['content'] = $menuInfo['content'];
		$data['newsLand'] = $newsLand;
		$data['alias'] = $alias;
		return $data;
	}
	// NewsLand Detail
	public function newsLand($alias)
	{
		$data['data_index'] = $this->get_index();
		$newsLand = $this->query_sql->select_row('tbl_news_land', '*', array('publish' => 1, 'alias' => $alias));
		if($newsLand == NULL){
			redirect('/');
		}
		if(! empty($newsLand)){
			$direction_name = $this->query_sql->select_row('tbl_direction', 'name', array('id' => $newsLand['direction_id']));
			$newsLand['direction_name'] = $direction_name['name'];
			/////
			$street_name = $this->query_sql->select_row('tbl_street', 'name', array('id' => $newsLand['street_id']));
			$ward_name = $this->query_sql->select_row('tbl_ward', 'name', array('id' => $newsLand['ward_id']));
			$district_name = $this->query_sql->select_row('tbl_district', 'name', array('id' => $newsLand['district_id']));
			$city_name = $this->query_sql->select_row('tbl_city', 'name', array('id' => $newsLand['city_id']));
			$newsLand['address_name'] = $street_name['name'].', '.$ward_name['name'].', '.$district_name['name'].', '.$city_name['name'];
			///Cate and City
			$newsLand['infoCate'] = $this->query_sql->select_row('tbl_category', 'id,name,alias', array('id' => $newsLand['cateid']));
			$newsLand['infoCity'] = $this->query_sql->select_row('tbl_city', 'id,name,alias', array('id' => $newsLand['city_id']));
			////Fullname người đăng
			$fullname = $this->query_sql->select_row('tbl_admin', 'fullname,phone', array('id' => $newsLand['id_user']));
			if(! empty($fullname)){
				$newsLand['fullname'] = $fullname['fullname'];
			}
		}
		//Get image detail
		$newsLandPhoto = $this->query_sql->select_array('tbl_newsland_photo', 'id,image,thumb', array('newsLandID' => $newsLand['id']));
		//Product same
		$arrayCateID = $this->CI_function->getListMenuId($newsLand['cateid']);
		$newsLandSame = $this->query_sql->select_array_wherein('tbl_news_land','id,name,alias,price,price_detail,area,unit,deal,created_at,thumb,district_id,cateid',array('publish' => 1,'id !=' => $newsLand['id']),'cateid',$arrayCateID,'id desc',0,9);
		if(! empty($newsLandSame)) {
			foreach ($newsLandSame as $key_newsLandSame => $val_newsLandSame) {
				$newsLandSame[$key_newsLandSame]['infoDistrict'] = $this->query_sql->select_row('tbl_district','id,name,alias',array('id' => $val_newsLandSame['district_id']));
				$newsLandSame[$key_newsLandSame]['infoCate'] = $this->query_sql->select_row('tbl_category','id,name,alias',array('id' => $val_newsLandSame['cateid'], 'publish' => 1));
				if($val_newsLandSame['price'] == 0) {
					$newsLandSame[$key_newsLandSame]['price_detail'] = 'Thỏa thuận';
				}
			}
		}


		/////
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1),'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		////

		$data['title'] = $newsLand['title'];
		$data['keyword'] = $newsLand['meta_keyword'];
		$data['description'] = $newsLand['meta_description'];
		$data['name'] = $newsLand['name'];
		$data['image'] = 'upload/newsLand/thumb/'.$newsLand['thumb'];
		$data['alias'] = $alias;
		$data['newsLand'] = isset($newsLand) ? $newsLand : [];
		$data['newsLandPhoto'] = isset($newsLandPhoto) ? $newsLandPhoto : [];
		$data['newsLandSame'] = $newsLandSame;
		return $data;
	}
	//Project
	public function cate_project($alias){
		$data['data_index'] = $this->get_index();
		$menuInfo = $this->query_sql->select_row('tbl_category', 'id,title,meta_description,meta_keyword,name,content,thumb', array('alias' => $alias));
		$arrayProjectID = $this->CI_function->getListMenuId($menuInfo['id']);
		if($arrayProjectID != NULL){
			$considion = array('publish' => 1);
			///////
			$url_get = $_GET;
			if (isset($url_get['page'])) {
				unset($url_get['page']);
			}
			$str_get = http_build_query($url_get);
			$config = $this->query_sql->_pagination();
			$config['enable_query_strings'] = TRUE;
			$config['page_query_string'] = TRUE;
			$config['query_string_segment'] = 'page';
			$config['base_url'] = base_url().$alias. $str_get;
			$config['total_rows'] = $this->query_sql->total_where_in('tbl_project',$considion,'cateid',$arrayProjectID);
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
				$project = $this->query_sql->select_array_wherein('tbl_project','id,name,alias,thumb,dia_chi',$considion,'cateid',$arrayProjectID,'id desc',($page * $config['per_page']),$config['per_page']);
			}
		}else{
			$project = NULL;
		}

		/////
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1),'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		////
		$data['category_project'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 8, 'parentid !=' => 0),'sort asc');
		////
		$data['title'] = $menuInfo['title'];
		$data['keyword'] = $menuInfo['meta_keyword'];
		$data['description'] = $menuInfo['meta_description'];
		$data['image'] = 'upload/menuNewsLand/thumb/'.$menuInfo['thumb'];
		$data['alias'] = $alias.'/';
		$data['name'] = $menuInfo['name'];
		$data['content'] = $menuInfo['content'];
		$data['project'] = isset($project) ? $project : [];
		$data['alias'] = $alias;
		return $data;
	}
	// Project Detail
	public function project($alias)
	{
		$data['data_index'] = $this->get_index();
		$project = $this->query_sql->select_row('tbl_project', '*', array('publish' => 1, 'alias' => $alias));
		if($project == NULL){
			redirect('/');
		}
		//Project same
		$arrayCateID = $this->CI_function->getListMenuId($project['cateid']);
		$projectSame = $this->query_sql->select_array_wherein('tbl_project','id,name,alias,thumb,dia_chi',array('publish' => 1,'id !=' => $project['id']),'cateid',$arrayCateID,'id desc',0,8);
		/////
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1),'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		////
		$data['category_project'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 8, 'parentid !=' => 0), 'sort asc');
		////
		$data['title'] = $project['title'];
		$data['keyword'] = $project['meta_keyword'];
		$data['description'] = $project['meta_description'];
		$data['name'] = $project['name'];
		$data['image'] = 'upload/project/thumb/'.$project['thumb'];
		$data['alias'] = $alias;
		$data['project'] = $project;
		$data['projectSame'] = $projectSame;
		return $data;
	}
	//cateAtCity
	public function cateAtCity($alias_cate,$alias_city){
		$dataCate = $this->query_sql->select_row('tbl_category','*',array('alias' => $alias_cate));
		$dataCity = $this->query_sql->select_row('tbl_city','*',array('alias' => $alias_city));
		$arraynewsLandID = $this->CI_function->getListMenuId($dataCate['id']);
		if(! empty($arraynewsLandID) && ! empty($dataCity)) {
			$considion = array('publish' => 1, 'city_id' => $dataCity['id']);
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
			$config['base_url'] = base_url().$alias_cate.'/'.$alias_city. $str_get;
			$config['total_rows'] = $this->query_sql->total_where_in('tbl_news_land',$considion,'cateid',$arraynewsLandID);
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
				$newsLand = $this->query_sql->select_array_wherein('tbl_news_land','id,name,alias,price,price_detail,area,unit,deal,created_at,thumb,district_id,cateid',$considion,'cateid',$arraynewsLandID,'id desc',($page * $config['per_page']),$config['per_page']);
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
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1),'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		///////
		$data['district'] = $this->query_sql->select_array('tbl_district','id,name,alias',array('city_id' => $dataCity['id']),'id desc');
		///alias breadcrumb
		$data['aliasCate'] = $dataCate;
		$data['aliasCity'] = $dataCity;

		$data['name'] = $dataCate['name'].' tại '.$dataCity['name'];
		$data['newsLand'] = isset($newsLand) ? $newsLand : [];
		$data_index = $this->get_index();
		$this->load->view('frontend/default/index', [
			'template' => 'frontend/cateAtCity/category',
			'data_index' => $data_index,
			'data' => $data,
			'title' => $dataCate['name'].' tại '.$dataCity['name'],
			'meta_keyword' => $dataCate['meta_keyword'].' '.$dataCity['meta_keyword'],
			'meta_description' => $dataCate['meta_description'].' '.$dataCity['meta_description']
		]);
	}
	// Cate News
	public function cate_news($alias)
	{
		$data['data_index'] = $this->get_index();
		$menuInfo = $this->query_sql->select_row('tbl_category', '*', array('alias' => $alias));
		$arrayCateID = $this->CI_function->getListMenuId($menuInfo['id']);
		if(! empty($arrayCateID)) {
			$considion = array('publish' => 1);

			$url_get = $_GET;
			if (isset($url_get['page'])) {
				unset($url_get['page']);
			}
			$str_get = http_build_query($url_get);
			$config = $this->query_sql->_pagination();
			$config['enable_query_strings'] = TRUE;
			$config['page_query_string'] = TRUE;
			$config['query_string_segment'] = 'page';
			$config['base_url'] = base_url().$alias. $str_get;
			$config['total_rows'] = $this->query_sql->total_where_in('tbl_news',$considion,'cateid',$arrayCateID);
			$config['per_page'] = 12;
			$config['uri_segment'] = 3;
			$total_page = ceil($config['total_rows'] / $config['per_page']);
			$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
			$page = ($page > $total_page) ? $total_page : $page;
			$page = ($page < 1) ? 1 : $page;
			$page = $page - 1;
			$this->pagination->initialize($config);
			$data['list_pagination'] = $this->pagination->create_links();
			//////
			if($config['total_rows']>0){
				$news = $this->query_sql->select_array_wherein('tbl_news','*',array('publish' => 1),'cateid',$arrayCateID,'id desc',($page * $config['per_page']),$config['per_page']);
			}
		} else {
			$news = NULL;
		}

		$cateChild = $this->query_sql->select_array('tbl_category','id,name,alias,title,type',array('publish' => 1,'parentid' => $menuInfo['id']),'id desc');
		// if($cateChild != NULL){
		// 	foreach ($cateChild as $key_cateChild => $val_cateChild) {
		// 		$arrayCateChildID = $this->CI_function->getListMenuId($val_cateChild['id']);
		// 		$cateChild[$key_cateChild]['countProduct'] = $this->query_sql->total_where_in('tbl_product',array('publish' => 1),'cateid',$arrayCateChildID);
		// 	}
		// }

		/////
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1), 'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		////
		$data['title'] = $menuInfo['name'];
		$data['keyword'] = $menuInfo['meta_keyword'];
		$data['description'] = $menuInfo['meta_description'];
		$data['name'] = $menuInfo['name'];
		$data['image'] = 'upload/menuNews/thumb/'.$menuInfo['thumb'];
		$data['alias'] = $alias.'/';
		$data['content'] = $menuInfo['content'];
		$data['news'] = isset($news) ? $news : [];
		$data['cateChild'] = $cateChild;
		return $data;
	}
	public function news($alias)
	{
		$data['data_index'] = $this->get_index();
		$news = $this->query_sql->select_row('tbl_news', '*', array('publish' => 1, 'alias' => $alias));
		if($news == NULL){
			redirect('/');
		}
		//news same
		$arrayCateID = $this->CI_function->getListMenuId($news['cateid']);
		$newsSame = $this->query_sql->select_array_wherein('tbl_news','id,name,alias,thumb,title,des',array('publish' => 1,'id !=' => $news['id']),'cateid',$arrayCateID,'id desc',0,8);
		//CateChild
		$cateParentID = $this->query_sql->select_row('tbl_category','parentid',array('publish' => 1,'id' => $news['cateid']));
		$cateChild = $this->query_sql->select_array('tbl_category','id,name,alias,title,type',array('publish' => 1,'parentid' => $cateParentID['parentid'],'parentid != ' => 0),'id desc');
		if($cateChild == NULL){
			$cateChild = $this->query_sql->select_array('tbl_category','id,name,alias,title,type',array('publish' => 1,'type' => 1,'left' => 1),'id desc');
		}
		// if($cateChild != NULL){
		// 	foreach ($cateChild as $key_cateChild => $val_cateChild) {
		// 		$arrayCateChildID = $this->CI_function->getListMenuId($val_cateChild['id']);
		// 		$cateChild[$key_cateChild]['countProduct'] = $this->query_sql->total_where_in('tbl_product',array('publish' => 1),'cateid',$arrayCateChildID);
		// 	}
		// }

		//CatesidebarbyNews
		$arrayCateSB = json_decode($news['cateSB'],true);
		if($arrayCateSB != NULL){
			$CateSB = $this->query_sql->select_array_wherein('tbl_category','id,name,alias,title',array('publish' => 1),'id',$arrayCateSB,'id desc');
			if($CateSB != NULL){
				foreach ($CateSB as $key_CateSB => $val_CateSB) {
					$newsSB = $this->query_sql->select_array('tbl_news','id,name,alias,title,thumb',array('publish' => 1,'cateID' => $val_CateSB['id']),'id desc');
					$CateSB[$key_CateSB]['news'] = $newsSB;
				}
			}
			$data['CateSB'] = $CateSB;
		}



		//tags
		$tags = $this->query_sql->select_array('tbl_tags_detail','*',array('newsID' => $news['id']));
		if($tags != NULL){
			foreach ($tags as $key_tags => $val_tags) {
				$tagsInfo = $this->query_sql->select_row('tbl_tags','*',array('id' => $val_tags['tagsID']));
				$tags[$key_tags]['name'] = $tagsInfo['name'];
				$tags[$key_tags]['alias'] = $tagsInfo['alias'];
			}
		}


		/////
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1),'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		////
		$data['title'] = $news['title'];
		$data['keyword'] = $news['meta_keyword'];
		$data['description'] = $news['meta_description'];
		$data['name'] = $news['name'];
		$data['image'] = 'upload/news/thumb/'.$news['thumb'];
		$data['alias'] = $alias;
		$data['news'] = $news;
		$data['newsSame'] = $newsSame;
		$data['cateChild'] = $cateChild;
		$data['tags'] = $tags;
		return $data;
	}
	// city
	public function city($alias){
		$data['data_index'] = $this->get_index();
		$cityInfo = $this->query_sql->select_row('tbl_city', '*', array('alias' => $alias));
		if(! empty($cityInfo)) {
			$considion = array('publish' => 1, 'city_id' => $cityInfo['id']);
			///
			$url_get = $_GET;
			if (isset($url_get['page'])) {
				unset($url_get['page']);
			}
			$str_get = http_build_query($url_get);
			$config = $this->query_sql->_pagination();
			$config['enable_query_strings'] = TRUE;
			$config['page_query_string'] = TRUE;
			$config['query_string_segment'] = 'page';
			$config['base_url'] = base_url().$alias. $str_get;
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
				$newsLand = $this->query_sql->select_array('tbl_news_land','id,name,alias,price,price_detail,unit,deal,area,created_at,thumb,district_id,cateid',$considion,'id desc',($page * $config['per_page']),$config['per_page']);
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
		///////
		$district = $this->query_sql->select_array('tbl_district','id,name,alias',array('city_id' => $cityInfo['id']),'id desc');
		/////
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1),'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		////
		$data['title'] = $cityInfo['title'];
		$data['keyword'] = $cityInfo['meta_keyword'];
		$data['description'] = $cityInfo['meta_description'];
		$data['alias'] = $alias.'/';
		$data['name'] = $cityInfo['name'];
		$data['newsLand'] = isset($newsLand) ? $newsLand : [];
		$data['district'] = isset($district) ? $district : [];
		$data['alias'] = $alias;
		return $data;
	}
	public function district($alias){
		$data['data_index'] = $this->get_index();
		$districtInfo = $this->query_sql->select_row('tbl_district', '*', array('alias' => $alias));
		if(! empty($districtInfo)) {
			$considion = array('publish' => 1, 'district_id' => $districtInfo['id']);
			///
			$url_get = $_GET;
			if (isset($url_get['page'])) {
				unset($url_get['page']);
			}
			$str_get = http_build_query($url_get);
			$config = $this->query_sql->_pagination();
			$config['enable_query_strings'] = TRUE;
			$config['page_query_string'] = TRUE;
			$config['query_string_segment'] = 'page';
			$config['base_url'] = base_url().$alias. $str_get;
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
				$newsLand = $this->query_sql->select_array('tbl_news_land','id,name,alias,price,price_detail,unit,deal,area,created_at,thumb,district_id,cateid',$considion,'id desc',($page * $config['per_page']),$config['per_page']);
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

		$ward = $this->query_sql->select_array('tbl_ward','id,name,alias',array('district_id' => $districtInfo['id']),'id desc');
		/////
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1),'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		////
		$data['title'] = $districtInfo['title'];
		$data['keyword'] = $districtInfo['meta_keyword'];
		$data['description'] = $districtInfo['meta_description'];
		$data['alias'] = $alias.'/';
		$data['name'] = $districtInfo['name'];
		$data['newsLand'] = isset($newsLand) ? $newsLand : [];
		$data['ward'] = isset($ward) ? $ward : [];
		$data['alias'] = $alias;
		return $data;
	}
	public function ward($alias){
		$data['data_index'] = $this->get_index();
		$wardInfo = $this->query_sql->select_row('tbl_ward', '*', array('alias' => $alias));
		if(! empty($wardInfo)) {
			$considion = array('publish' => 1, 'ward_id' => $wardInfo['id']);
			///
			$url_get = $_GET;
			if (isset($url_get['page'])) {
				unset($url_get['page']);
			}
			$str_get = http_build_query($url_get);
			$config = $this->query_sql->_pagination();
			$config['enable_query_strings'] = TRUE;
			$config['page_query_string'] = TRUE;
			$config['query_string_segment'] = 'page';
			$config['base_url'] = base_url().$alias. $str_get;
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
				$newsLand = $this->query_sql->select_array('tbl_news_land','id,name,alias,price,price_detail,deal,unit,area,created_at,thumb,district_id,cateid',$considion,'id desc',($page * $config['per_page']),$config['per_page']);
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
		//////
		$wardSame = $this->query_sql->select_array('tbl_ward','id,name,alias',array('district_id' => $wardInfo['district_id']),'id desc');
		/////
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1),'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		////
		$data['title'] = $wardInfo['title'];
		$data['keyword'] = $wardInfo['meta_keyword'];
		$data['description'] = $wardInfo['meta_description'];
		$data['alias'] = $alias.'/';
		$data['name'] = $wardInfo['name'];
		$data['newsLand'] = isset($newsLand) ? $newsLand : [];
		$data['wardSame'] = isset($wardSame) ? $wardSame : [];
		$data['alias'] = $alias;
		return $data;
	}
	/////
	public function search($page = 1)
	{
		if($_GET['s_keyword']) {
			$considion = array('publish' => 1);
			$url_get = $_GET;
			if (isset($url_get['page'])) {
				unset($url_get['page']);
			}
			$str_get = http_build_query($url_get);
			$config = $this->query_sql->_pagination();
			$config['enable_query_strings'] = TRUE;
			$config['page_query_string'] = TRUE;
			$config['query_string_segment'] = 'page';
			$config['base_url'] = base_url().'tim-kiem.html?'. $str_get;
			if($_GET['s_keyword'] && $_GET['s_keyword']){
				$config['total_rows'] = $this->query_sql->total_like('tbl_news',$considion,$_GET['s_keyword']);
			}else{
				$config['total_rows'] = $this->query_sql->total('tbl_news',$considion);
			}
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
				if($_GET['s_keyword'] && $_GET['s_keyword']){
					$news = $this->query_sql->select_array_like('tbl_news','*',array('publish' => 1),'id desc',($page * $config['per_page']),$config['per_page'],$_GET['s_keyword']);
				}else{
					$news = $this->query_sql->select_array('tbl_news','*',array('publish' => 1),'id desc',($page * $config['per_page']),$config['per_page']);
				}

			}
		} else {
			$news = NULL;
		}
		/////
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1), 'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		////
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Tìm kiếm';
		$data['name'] = 'Tìm kiếm';
		$data['news'] = isset($news) ? $news : [];
		$data['template'] = 'frontend/news/search';
		$this->load->view('frontend/default/index', isset($data)?$data:NULL);
	}
	public function searchBDS($page = 1)
	{
		$considion = array('publish' => 1);
		$sort_by = 'id desc';
		if($_GET['cate_parent']){
			$arraynewsLandID = $this->CI_function->getListMenuId($_GET['cate_parent']);
		}
		if($_GET['cateid']){
			$considion['cateid'] = $_GET['cateid'];
		}
		if($_GET['city_id']){
			$considion['city_id'] = $_GET['city_id'];
		}
		if($_GET['district_id']){
			$considion['district_id'] = $_GET['district_id'];
		}
		if($_GET['ward_id']){
			$considion['ward_id'] = $_GET['ward_id'];
		}
		if($_GET['direction_id']){
			$considion['direction_id'] = $_GET['direction_id'];
		}
		if($_GET['price_min'] && ! $_GET['price_max']){
			$considion['price >='] = $_GET['price_min'];
		}
		if($_GET['price_max'] && ! $_GET['price_min']){
			$considion['price <='] = $_GET['price_max'];
		}
		if($_GET['price_min'] && $_GET['price_max']){
			$considion['price >='] = $_GET['price_min'];
			$considion['price <='] = $_GET['price_max'];
			$sort_by = 'price asc';
		}
		//////////
		$url_get = $_GET;
		if (isset($url_get['page'])) {
			unset($url_get['page']);
		}
		$str_get = http_build_query($url_get);
		$config = $this->query_sql->_pagination();
		$config['enable_query_strings'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['base_url'] = base_url().'tim-kiem-bds.html?'. $str_get;
		if(!empty($_GET['s_keybds']) && ! $_GET['cateid'] || empty($_GET['s_keybds']) && ! $_GET['cateid']){
			$config['total_rows'] = $this->query_sql->total_where_in_and_like('tbl_news_land',$considion,'cateid',$arraynewsLandID,!empty($_GET['s_keybds']));
		} else if(!empty($_GET['s_keybds']) &&  $_GET['cateid'] || empty($_GET['s_keybds']) &&  $_GET['cateid']) {
			$config['total_rows'] = $this->query_sql->total_where_in_and_like('tbl_news_land',$considion,'cateid',$_GET['cateid'],!empty($_GET['s_keybds']));
		}else{
			$config['total_rows'] = $this->query_sql->total('tbl_news_land',$considion);
		}
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
			if(!empty($_GET['s_keybds']) && ! $_GET['cateid'] || empty($_GET['s_keybds']) && ! $_GET['cateid']){
				$newsLand = $this->query_sql->select_array_wherein_and_like('tbl_news_land','id,name,alias,price,price_detail,area,unit,deal,created_at,thumb,district_id,cateid',$considion,'cateid',$arraynewsLandID,$sort_by,($page * $config['per_page']),$config['per_page'],!empty($_GET['s_keybds']));
			}else if(!empty($_GET['s_keybds']) &&  $_GET['cateid'] || empty($_GET['s_keybds']) &&  $_GET['cateid']){
				$newsLand = $this->query_sql->select_array_wherein_and_like('tbl_news_land','id,name,alias,price,price_detail,area,unit,deal,created_at,thumb,district_id,cateid',$considion,'cateid',$_GET['cateid'],$sort_by,($page * $config['per_page']),$config['per_page'],!empty($_GET['s_keybds']));
			}
			else{
				$newsLand = $this->query_sql->select_array('tbl_news_land','id,name,alias,price,price_detail,area,unit,deal,created_at,thumb,district_id,cateid',$considion,$sort_by,($page * $config['per_page']),$config['per_page']);
			}

		}
		//////
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
		$data['district'] = $this->query_sql->select_array('tbl_district','id,name',array('city_id' => $_GET['city_id']));
		$data['ward'] = $this->query_sql->select_array('tbl_ward','id,name',array('district_id' => $_GET['district_id']));
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['cateChild'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => $_GET['cate_parent']));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1), 'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		/////
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Tìm kiếm';
		$data['name'] = 'Tìm kiếm';
		$data['newsLand'] = isset($newsLand) ? $newsLand : [];
		$data['template'] = 'frontend/newsLand/searchBDS';
		$this->load->view('frontend/default/index', isset($data)?$data:NULL);
	}
	public function searchProject($page = 1)
	{
		$considion = array('publish' => 1);
		$sort_by = 'id desc';
		if($_GET['cate_projectID']){
			$considion['cateid'] = $_GET['cate_projectID'];
		}
		if($_GET['proCity_id']){
			$considion['city_id'] = $_GET['proCity_id'];
		}
		if($_GET['proDistrict_id']){
			$considion['district_id'] = $_GET['proDistrict_id'];
		}
		//////////
		$url_get = $_GET;
		if (isset($url_get['page'])) {
			unset($url_get['page']);
		}
		$str_get = http_build_query($url_get);
		$config = $this->query_sql->_pagination();
		$config['enable_query_strings'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['base_url'] = base_url().'tim-kiem-project.html?'. $str_get;
		if(!empty($_GET['s_keyproject'])){
			$config['total_rows'] = $this->query_sql->total_like('tbl_project',$considion,$_GET['s_keyproject']);
		} else{
			$config['total_rows'] = $this->query_sql->total('tbl_project',$considion);
		}
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
			if(!empty($_GET['s_keyproject'])){
				$project = $this->query_sql->select_array_like('tbl_project','id,name,alias,thumb,dia_chi',$considion,$sort_by,($page * $config['per_page']),$config['per_page'],$_GET['s_keyproject']);
			} else{
				$project = $this->query_sql->select_array('tbl_project','id,name,alias,thumb,dia_chi',$considion,$sort_by,($page * $config['per_page']),$config['per_page']);
			}

		}
		/////
		$data['city'] = $this->query_sql->select_array('tbl_city','id,name',NULL);
		$data['category'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 2, 'parentid' => 0));
		$data['searchPrice'] = $this->query_sql->select_array('tbl_searchprice','id,name,price',array('publish' => 1), 'sort asc');
		$data['direction'] = $this->query_sql->select_array('tbl_direction','id,name',NULL,'sort asc');
		/////
		$data['category_project'] = $this->query_sql->select_array('tbl_category','id,name',array('type' => 8, 'parentid !=' => 0), 'sort asc');
		$data['district'] = $this->query_sql->select_array('tbl_district','id,name',array('city_id' => $_GET['proCity_id']));
		/////
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Tìm kiếm';
		$data['name'] = 'Tìm kiếm';
		$data['project'] = isset($project) ? $project : [];
		$data['template'] = 'frontend/project/search';
		$this->load->view('frontend/default/index', isset($data)?$data:NULL);
	}


	public function tags($alias)
	{
		$data['data_index'] = $this->get_index();
		$tags = $this->query_sql->select_row('tbl_tags', '*', array('alias' => $alias));
		$tagsDetail = $this->query_sql->select_array('tbl_tags_detail','newsID',array('tagsID' => $tags['id']));
		$arrIDNews = NULL;
		if($tagsDetail != NULL){
			foreach ($tagsDetail as $key => $val) {
				$arrIDNews[] = $val['newsID'];
			}
		}
		if($arrIDNews != NULL){
			$news = $this->query_sql->select_array_wherein('tbl_news','id,name,des,alias,thumb,title,created_at',array('publish' => 1),'id',$arrIDNews,'id desc');
		}
		$data['title'] = $tags['name'];
		$data['news'] = isset($news) ? $news : '';
		$data['template'] = 'frontend/tags/index';
		$this->load->view('frontend/default/index', isset($data)?$data:NULL);
	}
}
