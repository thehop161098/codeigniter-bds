<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends My_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
	}

	public function __destruct(){
	}
	public function index()
	{
		// if(!$this->CI_auth->checkSignin()){ redirect(base_url()); }
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Giỏ hàng';

		$dataCart = $this->cart->contents();
		$subTotal = 0;
		if($dataCart != NULL){
			foreach ($dataCart as $key => $val) {
				$subTotal += $val['subtotal'];
			}
		}

		$data['dataCart'] = $dataCart;
		$data['subTotal'] = $subTotal;
		$data['template'] = 'frontend/cart/index';
		$this->load->view('frontend/default/index', isset($data)?$data:NULL);
	}
	public function notifyOrder()
	{
		// if(!$this->CI_auth->checkSignin()){ redirect(base_url()); }
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Thông báo';

		$data['template'] = 'frontend/cart/notifyOrder';
		$this->load->view('frontend/default/index', isset($data)?$data:NULL);
	}
	public function payment()
	{
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Thanh toán';

		$payment  = isset($_POST['Payment']) ? $_POST['Payment'] : '';
		$errors = [];
		if (!empty($payment)) {
			$payment['created_at'] = gmdate('Y-m-d H:i:s', time()+7*3600);
			$payment['status'] = 0;
			$message_required = "Trường bắt buộc";
			
			if (empty($payment['fullname'])) {
				$errors['fullname'] = $message_required;
			}
			//Check Phone
			$pattern = '/(0[2-9])+([0-9]{8})\b/';
			if (empty($payment['phone'])) {
				$errors['phone'] = $message_required;
			}elseif (!preg_match($pattern, trim($payment['phone']))) {
				$errors['phone'] = "Số điện thoại không đúng định dạng.";
			}
			//Check address
			if (empty($payment['address'])) {
				$errors['address'] = $message_required;
			}
			//Check Email
			if(empty($payment['email'])) {
				$errors['email'] = 'Trường bắt buộc';
			}else {
				if(filter_var($payment['email'], FILTER_VALIDATE_EMAIL) === false)
				{
					$errors['email'] = 'Email không đúng định dạng';
				}
			}
			//Check Description
			if (empty($payment['description'])) {
				$errors['description'] = $message_required;
			}
			//check thành công
			if(empty($errors))
			{
				$code = $this->checkCode();
				$payment['code'] = $code;
				$subtotal = $this->input->post('subtotal');
				//Thêm bảng order
				$result = $this->query_sql->add('tbl_order', $payment);
				if($result > 0){
					$orderID = $result['id_insert'];
					$dataInsertCarts = NULL;
					$dataCart = $this->cart->contents();
					$subTotal = 0;
					if($dataCart != NULL){
						foreach ($dataCart as $key => $val) {
							$dataInsertCart = array(
								'orderID'		=>	$orderID,
								'qty'			=>	$val['qty'],
								'name'			=>	$val['name'],
								'price'			=>	$val['price'],
								'totalPrice'	=>	$val['subtotal'],
								'thumb'			=>	$val['options']['Image'],
								'created_at'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
							);
							$dataInsertCarts[] = $dataInsertCart;
							$subTotal += $val['subtotal'];
						}
						$resultInsertCarts = $this->query_sql->adds('tbl_cart', $dataInsertCarts);
						if($resultInsertCarts > 0)
						{
							$this->cart->destroy();
							redirect('notify-order.html');
						}
					}
				}
			}
		}
		$dataCart = $this->cart->contents();
		$subTotal = 0;
		if($dataCart != NULL){
			foreach ($dataCart as $key => $val) {
				$subTotal += $val['subtotal'];
			}
		}
		$data['subTotal'] 	= $subTotal;
		$data['dataCart'] 	= $dataCart;
		$data['errors'] = $errors;
		$data['payment'] = $payment;
		$data['template'] 	= 'frontend/cart/payment';
		$this->load->view('frontend/default/index', isset($data)?$data:NULL);
	}
	public function checkCode()
	{
		$code = rand(9,999999);
		$codeOrder = $this->query_sql->select_row('tbl_order','code',['code'=>$code]);
		if(isset($codeOrder) && ! empty($codeOrder)) {
			$this->checkCode();
		}
		return $code;
	}
	public function addCart()
	{
		$percent = 0;
		$price = 0;
		if($this->input->post()){
			$productID = isset($_POST['id']) ? $_POST['id'] : 0;
			$qty = isset($_POST['qty']) ? $_POST['qty'] : 1;
			
			if(isset($productID) && $productID > 0){
				$product = $this->query_sql->select_row('tbl_product', 'id, name,image, thumb,pricesale,price', array('publish' => 1, 'id' => $productID));
				if($product['pricesale'] > 0)
				{
					$price = $product['pricesale'];
				} else {
					$price = $product['price'];
				}
				$name = $this->CI_function->delStringSpecial($product['name']);
				$data = array(
					'id'      => $productID,
					'qty'     => $qty,
					'price'   => $price,
					'name'    => $name,
					'options' => array('Image' => $product['thumb'])
				);
				$result = $this->cart->insert($data);
				$qtyCart = $this->qty();
				if(isset($result)){

					echo json_encode(['success' => 1,'num_cart'=> $qtyCart]);

				}
			}
		}
	}
	
	public function delete()
	{
		$id = $_GET['id'];
		$result = $this->cart->remove($id);
		if($result == true){
			redirect('cart.html');
		}else{
			redirect(base_url());
		}
	}
	public function deleteCartHome()
	{
		$id = $_POST['id'];
		$result = $this->cart->remove($id);
		if($result == true){
			echo json_encode(1);
		}
	}
	public function updateCart(){
		$subTotal = 0;
		$rowid = $_POST['rowid'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];
		$data = array(
	        'rowid' => $rowid,
	        'qty'   => $qty
		);
		$result = $this->cart->update($data);
		if($result == true){
			$price = $price * $qty;
			$dataCart = $this->cart->contents();
			$qtyCart = $this->qty();
			if($dataCart != NULL){
				foreach ($dataCart as $key => $val) {
					$subTotal += $val['subtotal'];
				}
			}
			echo json_encode(array('rs' => 1,'num_cart'=>$qtyCart,'price' => $price,'subTotals' => number_format($subTotal),'subTotal' => number_format($dataCart[$rowid]['subtotal'])));
		}
	}
}
