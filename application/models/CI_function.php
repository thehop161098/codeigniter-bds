<?php
class CI_function extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
	function changDate($date,$type){
		$ar_date = explode('/',$date);
		if($type == 1){
			$result = $ar_date[2].'-'.$ar_date[1].'-'.$ar_date[0];
		}
		return $result;
	}
	function createCode($number,$table){
		$code = $this->CI_function->RandomString($number);
		$data = $this->query_sql->select_row($table, 'id',array('code' => $code));
		if($order != NULL){
			$code = $this->CI_function->RandomString($number);
		}
		return $code;
	}
	function RandomString($length = 10) {
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	function RandomNumber($length = 10) {
		$characters = '0123456789';
		$charactersLength = strlen($characters);
		$data = '';
		for ($i = 0; $i < $length; $i++) {
			$data .= $characters[rand(0, $charactersLength - 1)];
		}
		return $data;
	}
	function changFormatDate($date) {
		$ar_date = explode('/',$date);
		$data = $ar_date[2].'-'.$ar_date[1].'-'.$ar_date[0];
		return $data;
	}
	function checkCode($code,$table) {
		$data = $this->query_sql->select_row($table, 'id',array('code' => $code));
		if($data != NULL){
			$code = $this->checkCode($this->RandomNumber(4),'ot_bus_ticket_type');
		}
		return $code;
	}
	function getParentID($id,$level){
		$code = 0;
		if($level == 0){
			$data = $this->query_sql->select_row('ot_admin', 'parent_id',array('id' => $id));
			if($data != NULL){
				$code = $data['parent_id'];
			}
		}else{
			$data = $this->query_sql->select_row('ot_admin', 'parent_id'.$level,array('id' => $id));
			if($data != NULL){
				$code = $data['parent_id'.$level];
			}
		}
		return $code;
	}
	function getSelectMenu($parentid,$option = '|-----',$typeid = 0,$type = 0){
		if($type && $type > 0){
			$menu = $this->query_sql->select_array('tbl_menu', 'id,name,parentid',array('parentid' => $parentid,'type' => $type));
		}else{
			$menu = $this->query_sql->select_array('tbl_menu', 'id,name,parentid',array('parentid' => $parentid));
		}

		if($menu != NULL){
			if($parentid > 0){ $option = $option.'-----'; }
			foreach ($menu as $key => $val) {
				$data .= '<option value="'.$val['id'].'"';
				if($typeid == $val['id']){
					$data .= 'selected';
				}
				$data .= '>'.$option.$val['name'].'</option>';
				$data .= $this->getSelectMenu($val['id'], $option,$typeid);
			}
		}
		return $data;
	}
	function getSelectCategory($parentid,$option = '|-----',$typeid = 0,$type = 0){
		if($type && $type > 0){
			$menu = $this->query_sql->select_array('tbl_category', 'id,name,parentid',array('parentid' => $parentid,'type' => $type));
		}else{
			$menu = $this->query_sql->select_array('tbl_category', 'id,name,parentid',array('parentid' => $parentid));
		}

		if($menu != NULL){
			if($parentid > 0){ $option = $option.'-----'; }
			foreach ($menu as $key => $val) {
				$data .= '<option value="'.$val['id'].'"';
				if($typeid == $val['id']){
					$data .= 'selected';
				}
				$data .= '>'.$option.$val['name'].'</option>';
				$data .= $this->getSelectCategory($val['id'], $option,$typeid);
			}
		}
		return $data;
	}
	function getSelectMenu2($parentid,$option = '|-----',$typeid = 0,$type = 0){
		if($type && $type > 0){
			$menu = $this->query_sql->select_array('tbl_menu', 'id,name,parentid',array('parentid' => $parentid,'type' => $type));
		}else{
			$menu = $this->query_sql->select_array('tbl_menu', 'id,name,parentid',array('parentid' => $parentid));
		}

		if($menu != NULL){
			if($parentid > 0){ $option = $option.'-----'; }
			foreach ($menu as $key => $val) {
				$data .= '<option value="'.$val['id'].'"';
				if($typeid == $val['id']){
					$data .= 'selected';
				}
				$data .= '>'.$option.$val['name'].'</option>';
				$data .= $this->getSelectMenu2($val['id'], $option,$typeid);
			}
		}
		return $data;
	}
	function getCheckboxMenu($parentid,$option = '|-----',$typeid = 0,$type = 0,$arrayList = NULL){
		if($type && $type > 0){
			$considion = array('parentid' => $parentid,'type' => $type);
		}else{
			$considion = array('parentid' => $parentid);
		}
		$menu = $this->query_sql->select_array('tbl_menu', 'id,name,parentid',$considion);
		if($menu != NULL){
			if($parentid > 0){ $option = $option.'-----'; }
			foreach ($menu as $key => $val) {
				$data .= '<div class="checkbox checkbox-default"><input type="checkbox" name="cateID[]" value="'.$val['id'].'"';
					//$typeid == $val['id']
				if(in_array($val['id'],$arrayList)){
					$data .= 'checked';
				}
				$data .= '/><label for="cateID">'.$option.$val['name'].'</label></div>';
				$data .= $this->getCheckboxMenu($val['id'], $option,$typeid,$type,$arrayList);
			}
		}
		return $data;
	}
	function getCheckboxMenu2($parentid,$option = '|-----',$typeid = 0,$type = 0,$arrayList = NULL){
		if($type && $type > 0){
			$considion = array('parentid' => $parentid,'type' => $type);
		}else{
			$considion = array('parentid' => $parentid);
		}
		$menu = $this->query_sql->select_array('tbl_menu', 'id,name,parentid',$considion);
		if($menu != NULL){
			if($parentid > 0){ $option = $option.'-----'; }
			foreach ($menu as $key => $val) {
				$data .= '<div class="checkbox checkbox-default"><input type="checkbox" name="cateSB[]" value="'.$val['id'].'"';
					//$typeid == $val['id']
				if(in_array($val['id'],$arrayList)){
					$data .= 'checked';
				}
				$data .= '/><label for="cateID">'.$option.$val['name'].'</label></div>';
				$data .= $this->getCheckboxMenu2($val['id'], $option,$typeid,$type,$arrayList);
			}
		}
		return $data;
	}
	function showMenuTable($parentid,$option = '|'){
		$menu = $this->query_sql->select_array('tbl_menu', '*',array('parentid' => $parentid));
		if($menu != NULL){
			if($parentid > 0){ $option = $option.'----'; }
			foreach ($menu as $key => $val) {
				$name_parent = $this->query_sql->select_row('tbl_menu', 'name',array('id' => $val['parentid']));
				$data .= '<tr>
				<td class="text-center">
					<div class="checkbox checkbox-primary">
						<input id="checkbox2'.$val['id'].'" type="checkbox" name="chon" class="checkbox-list" value="'.$val['id'].'">
						<label for="checkbox2'.$val['id'].'"></label>
					</div>
				</td>
				<td width="300">
					<a href="'.ADMIN_MENU_URL.'edit/'.$val['id'].'">';
					if($parentid > 0){ $data .= $option; }
					$data .= $val['name'].'</a>
				</td>
				<td class="text-center">'.date('d/m/Y',strtotime($val['created_at'])).'</td>
				<td width="100" class="text-center">
					<input onkeyup="changeSort(this,'.$val['id'].');" type="text" class="form-control text-center" value="'.$val['sort'].'" data-control="menu">
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-success">
						<input onchange="checkShowGlobals('.$val['id'].',\'publish\');"'; if($val['publish'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="publish" class="publish'.$val['id'].'" value="1" data-control="menu">
						<label for="publish'.$val['id'].'"></label>
					</div>
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-success box-check-left">
						<input onchange="checkShowGlobals('.$val['id'].',\'main\');"'; if($val['main'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="main" class="main'.$val['id'].'" value="1" data-control="menu">
						<label for="main'.$val['id'].'">MenuTop</label>
					</div>
					<div class="checkbox checkbox-success box-check-left">
						<input onchange="checkShowGlobals('.$val['id'].',\'hot\');"'; if($val['hot'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="hot" class="hot'.$val['id'].'" value="1" data-control="menu">
						<label for="hot'.$val['id'].'">Hot</label>
					</div>
					<div class="checkbox checkbox-success box-check-left">
						<input onchange="checkShowGlobals('.$val['id'].',\'footer\');"'; if($val['footer'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="footer" class="footer'.$val['id'].'" value="1" data-control="menu">
						<label for="footer'.$val['id'].'">Footer</label>
					</div>
				</td>
				<td class="text-center">
					<a href="'.ADMIN_MENU_URL.'edit/'.$val['id'].'" class="btn btn-sm btn-info waves-effect waves-light"> <i class="fa fa-edit"></i> </a>
					<a onclick="del('.$val['id'].');" class="btn btn-sm btn-youtube waves-effect waves-light delete'.$val['id'].'" data-control="menu"> <i class="ti-trash"></i> </a>
				</td>
				</tr>';
				$data .= $this->showMenuTable($val['id'], $option);
			}
		}
		return $data;
	}
	function showMenuNewsLand($parentid,$option = '|'){
		$menu = $this->query_sql->select_array('tbl_category', '*',array('parentid' => $parentid, 'type' => 2));
		if($menu != NULL){
			if($parentid > 0){ $option = $option.'----'; }
			foreach ($menu as $key => $val) {
				$name_parent = $this->query_sql->select_row('tbl_category', 'name',array('id' => $val['parentid']));
				$data .= '<tr>
				<td class="text-center">
					<div class="checkbox checkbox-primary">
						<input id="checkbox2'.$val['id'].'" type="checkbox" name="chon" class="checkbox-list" value="'.$val['id'].'">
						<label for="checkbox2'.$val['id'].'"></label>
					</div>
				</td>
				<td>
					<a href="'.ADMIN_MENUNEWSLAND_URL.'edit/'.$val['id'].'">';
					if($parentid > 0){ $data .= $option; }
					$data .= $val['name'].'</a>
				</td>
				<td class="text-center">'.date('d/m/Y',strtotime($val['created_at'])).'</td>
				<td width="100" class="text-center">
					<input onkeyup="changeSort(this,'.$val['id'].');" type="text" class="form-control text-center" value="'.$val['sort'].'" data-control="menuNewsLand">
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-success">
						<input onchange="checkShowGlobals('.$val['id'].',\'publish\');"'; if($val['publish'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="publish" class="publish'.$val['id'].'" value="1" data-control="menuNewsLand">
						<label for="publish'.$val['id'].'"></label>
					</div>
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-success box-check-left">
						<input onchange="checkShowGlobals('.$val['id'].',\'home\');"'; if($val['home'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="home" class="home'.$val['id'].'" value="1" data-control="menuNewsLand">
						<label for="home'.$val['id'].'">Home</label>
					</div>
					<div class="checkbox checkbox-success box-check-left">
						<input onchange="checkShowGlobals('.$val['id'].',\'left\');"'; if($val['left'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="left" class="left'.$val['id'].'" value="1" data-control="menuNewsLand">
						<label for="left'.$val['id'].'">Left</label>
					</div>
					<div class="checkbox checkbox-success box-check-left">
						<input onchange="checkShowGlobals('.$val['id'].',\'right\');"'; if($val['right'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="right" class="right'.$val['id'].'" value="1" data-control="menuNewsLand">
						<label for="right'.$val['id'].'">Right</label>
					</div>
				</td>
				<td class="text-center">
					<a href="'.ADMIN_MENUNEWSLAND_URL.'edit/'.$val['id'].'" class="btn btn-sm btn-info waves-effect waves-light"> <i class="fa fa-edit"></i> </a>
					<a onclick="del('.$val['id'].');" class="btn btn-sm btn-youtube waves-effect waves-light delete'.$val['id'].'" data-control="menuNewsLand"> <i class="ti-trash"></i> </a>
				</td>
				</tr>';
				$data .= $this->showMenuNewsLand($val['id'], $option);
			}
		}
		return $data;
	}
	function showMenuProject($parentid,$option = '|'){
		$menu = $this->query_sql->select_array('tbl_category', '*',array('parentid' => $parentid, 'type' => 8));
		if($menu != NULL){
			if($parentid > 0){ $option = $option.'----'; }
			foreach ($menu as $key => $val) {
				$name_parent = $this->query_sql->select_row('tbl_category', 'name',array('id' => $val['parentid']));
				$data .= '<tr>
				<td class="text-center">
					<div class="checkbox checkbox-primary">
						<input id="checkbox2'.$val['id'].'" type="checkbox" name="chon" class="checkbox-list" value="'.$val['id'].'">
						<label for="checkbox2'.$val['id'].'"></label>
					</div>
				</td>
				<td>
					<a href="'.ADMIN_MENUPROJECT_URL.'edit/'.$val['id'].'">';
					if($parentid > 0){ $data .= $option; }
					$data .= $val['name'].'</a>
				</td>
				<td class="text-center">'.date('d/m/Y',strtotime($val['created_at'])).'</td>
				<td width="100" class="text-center">
					<input onkeyup="changeSort(this,'.$val['id'].');" type="text" class="form-control text-center" value="'.$val['sort'].'" data-control="menuProject">
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-success">
						<input onchange="checkShowGlobals('.$val['id'].',\'publish\');"'; if($val['publish'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="publish" class="publish'.$val['id'].'" value="1" data-control="menuProject">
						<label for="publish'.$val['id'].'"></label>
					</div>
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-success box-check-left">
						<input onchange="checkShowGlobals('.$val['id'].',\'home\');"'; if($val['home'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="home" class="home'.$val['id'].'" value="1" data-control="menuProject">
						<label for="home'.$val['id'].'">Home</label>
					</div>
					<div class="checkbox checkbox-success box-check-left">
						<input onchange="checkShowGlobals('.$val['id'].',\'left\');"'; if($val['left'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="left" class="left'.$val['id'].'" value="1" data-control="menuProject">
						<label for="left'.$val['id'].'">Left</label>
					</div>
					<div class="checkbox checkbox-success box-check-left">
						<input onchange="checkShowGlobals('.$val['id'].',\'right\');"'; if($val['right'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="right" class="right'.$val['id'].'" value="1" data-control="menuProject">
						<label for="right'.$val['id'].'">Right</label>
					</div>
				</td>
				<td class="text-center">
					<a href="'.ADMIN_MENUPROJECT_URL.'edit/'.$val['id'].'" class="btn btn-sm btn-info waves-effect waves-light"> <i class="fa fa-edit"></i> </a>
					<a onclick="del('.$val['id'].');" class="btn btn-sm btn-youtube waves-effect waves-light delete'.$val['id'].'" data-control="menuProject"> <i class="ti-trash"></i> </a>
				</td>
				</tr>';
				$data .= $this->showMenuProject($val['id'], $option);
			}
		}
		return $data;
	}
	function showMenuNews($parentid,$option = '|'){
		$menu = $this->query_sql->select_array('tbl_category', '*',array('parentid' => $parentid, 'type' => 1));
		if($menu != NULL){
			if($parentid > 0){ $option = $option.'----'; }
			foreach ($menu as $key => $val) {
				$name_parent = $this->query_sql->select_row('tbl_category', 'name',array('id' => $val['parentid']));
				$data .= '<tr>
				<td class="text-center">
					<div class="checkbox checkbox-primary">
						<input id="checkbox2'.$val['id'].'" type="checkbox" name="chon" class="checkbox-list" value="'.$val['id'].'">
						<label for="checkbox2'.$val['id'].'"></label>
					</div>
				</td>
				<td>
					<a href="'.ADMIN_MENUNEWS_URL.'edit/'.$val['id'].'">';
					if($parentid > 0){ $data .= $option; }
					$data .= $val['name'].'</a>
				</td>
				<td class="text-center">'.date('d/m/Y',strtotime($val['created_at'])).'</td>
				<td width="100" class="text-center">
					<input onkeyup="changeSort(this,'.$val['id'].');" type="text" class="form-control text-center" value="'.$val['sort'].'" data-control="menuNews">
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-success">
						<input onchange="checkShowGlobals('.$val['id'].',\'publish\');"'; if($val['publish'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="publish" class="publish'.$val['id'].'" value="1" data-control="menuNews">
						<label for="publish'.$val['id'].'"></label>
					</div>
				</td>
				<td class="text-center">
					<div class="checkbox checkbox-success box-check-left">
						<input onchange="checkShowGlobals('.$val['id'].',\'home\');"'; if($val['home'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="home" class="home'.$val['id'].'" value="1" data-control="menuNews">
						<label for="home'.$val['id'].'">Home</label>
					</div>
					<div class="checkbox checkbox-success box-check-left">
						<input onchange="checkShowGlobals('.$val['id'].',\'left\');"'; if($val['left'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="left" class="left'.$val['id'].'" value="1" data-control="menuNews">
						<label for="left'.$val['id'].'">Left</label>
					</div>
					<div class="checkbox checkbox-success box-check-left">
						<input onchange="checkShowGlobals('.$val['id'].',\'right\');"'; if($val['right'] == 1){  $data .= 'checked '; } $data .= 'type="checkbox" name="right" class="right'.$val['id'].'" value="1" data-control="menuNews">
						<label for="right'.$val['id'].'">Right</label>
					</div>
				</td>
				<td class="text-center">
					<a href="'.ADMIN_MENUNEWS_URL.'edit/'.$val['id'].'" class="btn btn-sm btn-info waves-effect waves-light"> <i class="fa fa-edit"></i> </a>
					<a onclick="del('.$val['id'].');" class="btn btn-sm btn-youtube waves-effect waves-light delete'.$val['id'].'" data-control="menuNews"> <i class="ti-trash"></i> </a>
				</td>
				</tr>';
				$data .= $this->showMenuNews($val['id'], $option);
			}
		}
		return $data;
	}
	public function getCateBreadcrumb($parentid){
		$cate = $this->query_sql->select_row('tbl_category', 'id, name, alias, parentid', array('id' => $parentid));
		if($cate != NULL){
			$result['cate_name1'] = $cate['name'];
			$result['cate_alias1'] = $cate['alias'];
			$cate2 = $this->query_sql->select_row('tbl_category', 'id, name, alias, parentid', array('id' => $cate['parentid']));
			if($cate2 != NULL){
				$result['cate_name2'] = $cate2['name'];
				$result['cate_alias2'] = $cate2['alias'];
				$cate3 = $this->query_sql->select_row('tbl_category', 'id, name, alias, parentid', array('id' => $cate2['parentid']));
				if($cate3 != NULL){
					$result['cate_name3'] = $cate3['name'];
					$result['cate_alias3'] = $cate3['alias'];

				}
			}
		}
		return $result;
	}
	function getArrayBdsID($cateID){
		$result = array();
		$arrayCateID = $this->CI_function->getListMenuId($cateID);
			//get array ID
		$arrayProductIDByCateID = $this->query_sql->select_array_wherein('tbl_newsland_menu','newsLandID',NULL,'cateID',$arrayCateID,NULL,NULL,NULL);
		if($arrayProductIDByCateID != NULL){
			foreach ($arrayProductIDByCateID as $key => $val) {
				array_push($result,$val['newsLandID']);
			}
		}
		$result = array_unique($result);
		return $result;
	}
	function getListMenuId($parentid){
		$result[] = $parentid;
		$menu_child = $this->query_sql->select_array('tbl_category','id',array('publish' => 1, 'parentid' => $parentid));
		if($menu_child != NULL){
			foreach ($menu_child as $key => $val) {
				$result[] = (int)$val['id'];
				$menu_child_2 = $this->query_sql->select_array('tbl_category','id',array('publish' => 1, 'parentid' => $val['id']));
				if($menu_child_2 != NULL){
					foreach ($menu_child_2 as $key2 => $val2) {
						$result[] = (int)$val2['id'];
					}
				}
			}
		}
		return $result;
	}
	function createdAlias($alias='',$type,$alias_old = ''){
		$random = rand(0,999);
		$check = $this->query_sql->select_row('tbl_alias', '*', array('alias' => $alias_old,'type' => $type));
		if($check != NULL){
			if($alias == $alias_old){
				$alias = $alias_old;
			}else{
				$data = $this->query_sql->select_row('tbl_alias', '*', array('alias' => $alias));
				if($data != NULL){
					$alias = $alias.'-'.$random;
				}
			}
			$data_edit = array(
				'alias' 	=> 	$alias,
			);
			$result = $this->query_sql->edit('tbl_alias', $data_edit,array('id' => $check['id']));
		}else{
			$data = $this->query_sql->select_row('tbl_alias', '*', array('alias' => $alias));
			if($data != NULL){
				$alias = $alias.'-'.$random;
			}
			$data_add = array(
				'alias' 	=> 	$alias,
				'type' 		=> 	$type,
				'created_at'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$result = $this->query_sql->add('tbl_alias', $data_add);
		}
		return $alias;
	}
	function create_alias($bien)
	{
		if($bien != '')
		{
			$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
				"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
				,"ế","ệ","ể","ễ",
				"ì","í","ị","ỉ","ĩ",
				"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
				,"ờ","ớ","ợ","ở","ỡ",
				"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
				"ỳ","ý","ỵ","ỷ","ỹ",
				"đ",
				"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
				,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
				"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
				"Ì","Í","Ị","Ỉ","Ĩ",
				"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
				,"Ờ","Ớ","Ợ","Ở","Ỡ",
				"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
				"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
				"Đ",
				"!","@","#","$","%","^","&","*","(",")");

			$marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
				,"a","a","a","a","a","a",
				"e","e","e","e","e","e","e","e","e","e","e",
				"i","i","i","i","i",
				"o","o","o","o","o","o","o","o","o","o","o","o"
				,"o","o","o","o","o",
				"u","u","u","u","u","u","u","u","u","u","u",
				"y","y","y","y","y",
				"d",
				"A","A","A","A","A","A","A","A","A","A","A","A"
				,"A","A","A","A","A",
				"E","E","E","E","E","E","E","E","E","E","E",
				"I","I","I","I","I",
				"O","O","O","O","O","O","O","O","O","O","O","O"
				,"O","O","O","O","O",
				"U","U","U","U","U","U","U","U","U","U","U",
				"Y","Y","Y","Y","Y",
				"D",
				"","","","","","","","","","");
			$bien = trim($bien);
			$bien = str_replace("/","",$bien);
			$bien = str_replace(":","",$bien);
			$bien = str_replace("!","",$bien);
			$bien = str_replace("(","",$bien);
			$bien = str_replace(")","",$bien);
			$bien = str_replace($marTViet,$marKoDau,$bien);
			$bien = str_replace("-","",$bien);
			$bien = str_replace("–","",$bien);
			$bien = str_replace("  "," ",$bien);
			$bien = str_replace(" ","-",$bien);
			$bien = str_replace("%","-",$bien);
			$bien = str_replace("+","-",$bien);
			$bien = str_replace("'","",$bien);
			$bien = str_replace("“","",$bien);
			$bien = str_replace("”","",$bien);
			$bien = str_replace(",","",$bien);
			$bien = str_replace("’","",$bien);
			$bien = str_replace(".","",$bien);
			$bien = str_replace('"',"",$bien);
			$bien = str_replace('\\','',$bien);
			$bien = str_replace('//','',$bien);
			$bien = str_replace('?','',$bien);
			$bien = str_replace('&','',$bien);
			$bien = strtolower($bien);
			return $bien;
		}
	}
	function createAliasAdd($name){
		$alias = $this->create_alias($name);
		$data_alias = $this->query_sql->select_row('tbl_alias', '*', array('alias' => $alias));
		if($data_alias != NULL){
			$randdom = rand(9,9999);
			$alias = $alias.'-'.$randdom;
		}
		return $alias;
	}
	function delStringSpecial($bien)
	{
		if($bien != ''){
			$bien = trim($bien);
			$bien = str_replace("/","",$bien);
			$bien = str_replace(":","",$bien);
			$bien = str_replace("!","",$bien);
			$bien = str_replace("(","",$bien);
			$bien = str_replace(")","",$bien);
			$bien = str_replace("-","",$bien);
			$bien = str_replace("  "," ",$bien);
			$bien = str_replace("%","",$bien);
			$bien = str_replace("+","",$bien);
			$bien = str_replace("'","",$bien);
			$bien = str_replace("“","",$bien);
			$bien = str_replace("”","",$bien);
			$bien = str_replace(",","",$bien);
			$bien = str_replace('//','',$bien);
			$bien = str_replace('?','',$bien);
			$bien = str_replace('&','',$bien);
			$bien = str_replace('–','',$bien);
			return $bien;
		}
	}
	function jam_read_num_forvietnamese($num = false)
	{
		$str = '';
		$num = trim($num);
		$arr = str_split($num);
		$count = count($arr);
		$f = number_format($num);
		if ($count < 4) {
			$str = $num;
		} else {
			$r = explode(',', $f);
			switch (count($r)) {
				case 4:
				$str = $r[0] . ' tỉ';
				if ((int) $r[1]) {
					$str .= ' ' . $r[1];
				}
				break;
				case 3:
				$str = $r[0] . ' triệu';
				if ((int) $r[1]) {
					$str .= ' ' . $r[1];
				}
				break;
				case 2:
				$str = $r[0] . ' ngàn';
				if ((int) $r[1]) {
					$str .= ' ' . $r[1];
				}
				break;
			}
		}
		return ($str);
	}

}
?>
