<?php
class Query_sql extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
	function add($table = '', $data = NULL){
		$this->db->insert($table, $data);
		$flag = $this->db->affected_rows();
		$insert_id = $this->db->insert_id();
		if($flag > 0){
			return array(
				'id_insert'	=> $insert_id,
				'type'		=> 'successful',
				'message'	=> 'Thêm dữ liệu thành công!',
			);
		}
		else
		{
			return array(
				'type'		=> 'error',
				'message'	=> 'Thêm dữ liệu không thành công!',
			);
		}
	}
	function adds($table = '', $data = NULL){
		$this->db->insert_batch($table, $data);
		$flag = $this->db->affected_rows();
		$insert_id = $this->db->insert_id();
		if($flag > 0){
			return array(
				'id_insert'	=> $insert_id,
				'type'		=> 'successful',
				'message'	=> 'Thêm dữ liệu thành công!',
			);
		}
		else
		{
			return array(
				'type'		=> 'error',
				'message'	=> 'Thêm dữ liệu không thành công!',
			);
		}
	}
	function edit($table = '', $data = NULL, $where = NULL){
		$this->db->where($where)->update($table, $data);
		$flag = $this->db->affected_rows();
		if($flag > 0){
			return array(
				'type'		=> 'successful',
				'message'	=> 'Cập nhật dữ liệu thành công!',
			);
		}
		else
		{
			return array(
				'type'		=> 'error',
				'message'	=> 'Cập nhật dữ liệu không thành công!',
			);
		}
	}
	function del($table = '', $where = NULL){
		$this->db->delete($table, $where);
	}
	function select_array($table = '', $data = NULL, $where = NULL, $order = 'id desc', $start = '', $limit = ''){
		$result = $this->db->select($data)->from($table);
		if($where != NULL){
			$result = $this->db->where($where);
		}
		if($order != ''){
			$result = $this->db->order_by($order);
		}
		if($limit != ''){
			$result = $this->db->limit($limit, $start);
		}
		$result = $this->db->get()->result_array();
		return $result;
	}
	function select_row($table = '', $data = NULL, $where = NULL, $order = ''){
		$result = $this->db->select($data)->from($table);
		if($where != NULL){
			$result = $this->db->where($where);
		}
		if($order!=''){
			$result = $this->db->order_by($order);
		}
		$result = $this->db->get()->row_array();
		return $result;
	}
	function select_row_max($table = '', $field_max = ''){
		$result = $this->db->select_max($field_max)->from($table);
		$result = $this->db->get()->row_array();
		return $result;
	}
	function total($table,$where = NULL){
		$result = $this->db->from($table);
		if($where != NULL){
			$result = $this->db->where($where);
		}
		$result = $this->db->count_all_results();
		return $result;
	}
	function select_array_orwhere($table = '', $data = NULL, $where = NULL,$where_or = NULL, $order = 'id desc', $start = '', $limit = ''){
		$result = $this->db->select($data)->from($table);
		if($where != NULL){
			$result = $this->db->where($where);
		}
		if($where_or != NULL){
			foreach ($where_or as $key => $val) {
				$result = $this->db->or_where($val);
			}
		}
		if($order != ''){
			$result = $this->db->order_by($order);
		}
		if($start != '' && $limit != ''){
			$result = $this->db->limit($limit, $start);
		}
		$result = $this->db->get()->result_array();
		return $result;
	}
	function total_where_in($table,$where = NULL,$field = '',$ar_where = NULL){
		$result = $this->db->from($table);
		if($where != NULL){
			$result = $this->db->where($where);
		}
		if($ar_where != NULL && $field != ''){
			$result = $this->db->where_in($field,$ar_where);
		}
		$result = $this->db->count_all_results();
		return $result;
	}
	function total_where_in_and_like($table,$where = NULL,$field = '',$ar_where = NULL,$likeValue){
		$result = $this->db->from($table);
		if($where != NULL){
			$result = $this->db->where($where);
		}
		if($likeValue){
			$this->db->like('name', $likeValue);
		}
		if($ar_where != NULL && $field != ''){
			$result = $this->db->where_in($field,$ar_where);
		}
		$result = $this->db->count_all_results();
		return $result;
	}
	function total_like($table,$where = NULL,$likeValue){
		$result = $this->db->from($table);
		if($where != NULL){
			$result = $this->db->where($where);
		}
		if($likeValue){
			$this->db->like('name', $likeValue);
		}
		$result = $this->db->count_all_results();
		return $result;
	}
	function select_array_wherenotin($table = '', $data = NULL, $where = NULL,$field = '',$ar_where = NULL, $order = 'id desc', $start = '', $limit = ''){
		$result = $this->db->select($data)->from($table);
		if($where != NULL){
			$result = $this->db->where($where);
		}
		if($ar_where != NULL && $field != ''){
			$result = $this->db->where_not_in($field,$ar_where);
		}
		if($order != ''){
			$result = $this->db->order_by($order);
		}
		if($start != '' && $limit != ''){
			$result = $this->db->limit($limit, $start);
		}
		$result = $this->db->get()->result_array();
		return $result;
	}
	function select_array_wherein($table = '', $data = NULL, $where = NULL,$field = '',$ar_where = NULL, $order = 'id desc', $start = NULL, $limit = NULL){

		$result = $this->db->select($data)->from($table);
		if($where != NULL){
			$result = $this->db->where($where);
		}
		if($ar_where != NULL && $field != ''){
			$result = $this->db->where_in($field,$ar_where);
		}
		if($order != ''){
			$result = $this->db->order_by($order);
		}
		if($limit > 0){
			$result = $this->db->limit($limit,$start);
		}
		$result = $this->db->get()->result_array();
		return $result;
	}
	function select_array_wherein_and_like($table = '', $data = NULL, $where = NULL,$field = '',$ar_where = NULL, $order = 'id desc', $start, $limit,$likeValue){

		$result = $this->db->select($data)->from($table);
		if($where != NULL){
			$result = $this->db->where($where);
		}
		if($ar_where != NULL && $field != ''){
			$result = $this->db->where_in($field,$ar_where);
		}
		if($likeValue){
			$this->db->like('name', $likeValue);
		}
		if($order != ''){
			$result = $this->db->order_by($order);
		}
		if($limit > 0){
			$result = $this->db->limit($limit,$start);
		}
		$result = $this->db->get()->result_array();
		return $result;
	}
	function select_array_like($table = '', $data = NULL, $where = NULL, $order = 'id desc', $start, $limit,$likeValue){
		$result = $this->db->select($data)->from($table);
		if($where != NULL){
			$result = $this->db->where($where);
		}
		if($likeValue){
			$this->db->like('name', $likeValue);
		}
		if($order != ''){
			$result = $this->db->order_by($order);
		}
		if($limit > 0){
			$result = $this->db->limit($limit,$start);
		}
		$result = $this->db->get()->result_array();
		return $result;
	}

	function _pagination()
	{
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
		$config['next_tag_open'] = '<li class="paginate_button next">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
		$config['prev_tag_open'] = '<li class="paginate_button previous">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="paginate_button active"><a class="number current">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['num_links'] = 5;
		$config['uri_segment'] = 3;

		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = 10;
		return $config;
	}
}
?>
