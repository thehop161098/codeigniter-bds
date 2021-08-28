<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('query_sql');
		$this->load->model('SendEmail');
		// $this->load->library('facebook');
		// $this->load->library('googleplus');
	}
	public function __destruct(){
	}
	//Thông tin tài khoản
	public function infoUser()
	{
		if(!$this->CI_auth->checkSignin()){ redirect(base_url()); }
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Thông tin tài khoản';
		$errors = [];
		$infoUser = $this->query_sql->select_row('tbl_admin','*',['id' => $this->session->userdata('userID') ]);
		if($this->input->post()){
			$infoUserPost = isset($_POST['Updateinfo']) ? $_POST['Updateinfo'] : '';
			// check name
			if(empty($infoUserPost['fullname']))
			{
				$errors['fullname'] = 'Trường bắt buộc';
			}
			//check email
			$check_email_exsit = $this->query_sql->total('tbl_admin',['email' => $infoUserPost['email'],'role_id' => ROLE_USER, 'id !=' => $infoUser['id']]);
			if (empty($infoUserPost['email']))
			{
				$errors['email'] = 'Trường bắt buộc';
			} else {
				if($check_email_exsit > 0)
				{
					$errors['email'] = 'Email đã tồn tại';
				}
				if(filter_var($infoUserPost['email'], FILTER_VALIDATE_EMAIL) === false)
				{
					$errors['email'] = 'Email không đúng định dạng';
				}
			}
			//Check phone
			$pattern = '/(0[2-9])+([0-9]{8})\b/';
			if(empty($infoUserPost['phone']))
			{
				$errors['phone'] = "Trường bắt buộc.";
			}elseif(!preg_match($pattern, trim($infoUserPost['phone']))) {
				$errors['phone'] = "Số điện thoại không đúng.";
			}
			if(empty($errors))
			{
				$check_email_old = $this->query_sql->total('tbl_admin',['email' => $infoUserPost['email'],'role_id' => ROLE_USER]);
				if(
					($check_email_old > 0 && (int)$data['data_index']['active_sys']['active_register'] == 1) ||
					($check_email_old > 0 && (int)$data['data_index']['active_sys']['active_register'] != 1) ||
					($check_email_old == NULL && (int)$data['data_index']['active_sys']['active_register'] != 1)
				){
					$data_update = array(
						'fullname' 			=> 	$infoUserPost['fullname'],
						'phone' 			=> 	$infoUserPost['phone'],
						'email' 		=>  $infoUserPost['email'],
						'updated_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
					);
					$result = $this->query_sql->edit('tbl_admin', $data_update,['id' => $infoUser['id'], 'role_id' => ROLE_USER]);
					if(isset($result) && $result['type'] == 'successful'){
						$this->session->set_flashdata('message_flashdata_old', array(
							'type'		=> 'sucess',
							'message'	=> 'Cập nhật thành công!!',
						));
						redirect('tai-khoan.html');
					}else{
						$this->session->set_flashdata('message_flashdata_old', array(
							'type'		=> 'error',
							'message'	=> 'Cập nhật không thành công!!',
						));
						redirect('tai-khoan.html');
					}
				} else {
					$data_update = array(
						'fullname' 			=> 	$infoUserPost['fullname'],
						'phone' 			=> 	$infoUserPost['phone'],
						'email' 		=>  $infoUserPost['email'],
						'active' 		=>  0,
						'updated_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
					);
					$result = $this->query_sql->edit('tbl_admin', $data_update,['id' => $infoUser['id'], 'role_id' => ROLE_USER]);
					if(isset($result) && $result['type'] == 'successful'){
						/////Send Email Customer
						$subject = 'Kích hoạt tài khoản';
						$body = 'Email của bạn đã được cập nhật, vui lòng nhấn <strong><a href="'.base_url().'kich-hoat.html?email='.$infoUserPost['email'].'">vào đây</a></strong> để kích hoạt';
						$this->SendEmail->send($subject,$body,$infoUserPost['email']);
						//////
						$this->session->set_flashdata('message_flashdata', array(
							'type'		=> 'sucess',
							'message'	=> '“Email của bạn đã thay  đổi. Vui lòng kiểm tra nội dung mail '.$infoUserPost['email'].' để kích hoạt tài khoản. Xin cảm ơn!”',
						));
						redirect('tai-khoan.html');
					}else{
						$this->session->set_flashdata('message_flashdata', array(
							'type'		=> 'error',
							'message'	=> 'Cập nhật không thành công!!',
						));
						redirect('tai-khoan.html');
					}
				}
			}
		}
		$data['errors'] = $errors;
		$data['infoUser'] = $infoUser;
		$data['template'] = 'frontend/auth/profiles';
		$this->load->view('frontend/default/index', isset($data)?$data:NULL);
	}
	// Đổi mật khẩu
	public function changPass()
	{
		if(!$this->CI_auth->checkSignin()){ redirect(base_url()); }
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Thông tin tài khoản';
		$errors = [];
		$infoUser = $this->query_sql->select_row('tbl_admin','*',['id' => $this->session->userdata('userID') ]);
		if($this->input->post()){
			$infoUserPost = isset($_POST['ChangPass']) ? $_POST['ChangPass'] : '';
			// Password
			if(empty($infoUserPost['password']))
			{
				$errors['password'] = 'Trường bắt buộc';
			} else{
				if($infoUserPost['password'] != $infoUser['text_pass']) {
					$errors['password'] = 'Mật khẩu cũ không chính xác';
				}
			}
			// New Password
			if(empty($infoUserPost['new-password']))
			{
				$errors['new-password'] = 'Trường bắt buộc';
			} else{
				if(strlen($infoUserPost['new-password']) < 6)
				{
					$errors['new-password'] = 'Mật khẩu từ 6 ký tự trở lên';
				}
			}
			if(empty($infoUserPost['re-new-password']))
			{
				$errors['re-new-password'] = 'Trường bắt buộc';
			} else{
				if($infoUserPost['re-new-password'] != $infoUserPost['new-password'])
				{
					$errors['re-new-password'] = 'Mật khẩu chưa trùng khớp';
				}
			}
			if(empty($errors))
			{
				//Random password
				$rand_salt = $this->CI_encrypts->genRndSalt();
				$encrypt_pass = $this->CI_encrypts->encryptUserPwd($infoUserPost['new-password'],$rand_salt);
				$data_update = array(
					'password' 			=> 	$encrypt_pass,
					'salt' 				=>  $rand_salt,
					'text_pass' 		=>  $infoUserPost['new-password'],
					'updated_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$result = $this->query_sql->edit('tbl_admin', $data_update,['id' => $infoUser['id'], 'role_id' => ROLE_USER]);
				if($result>0){
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'sucess',
						'message'	=> 'Đổi mật khẩu thành công!!',
					));
					redirect('doi-mat-khau.html');
				}else{
					$this->session->set_flashdata('message_flashdata', array(
						'type'		=> 'error',
						'message'	=> 'Đổi mật khẩu không thành công!!',
					));
					redirect('doi-mat-khau.html');
				}
			}
		}
		$data['errors'] = $errors;
		$data['old_data'] = isset($infoUserPost) ? $infoUserPost : [];
		$data['template'] = 'frontend/auth/changPass';
		$this->load->view('frontend/default/index', isset($data)?$data:NULL);
	}
	// Đăng nhập
	public function signin()
	{
		$errors = [];
		$signin = isset($_POST['Login']) ? $_POST['Login'] : '';
		if(! empty($signin)){
			//check email
			if (empty($signin['email']))
			{
				$errors['email'] = 'Trường bắt buộc';
			} else {
				if(filter_var($signin['email'], FILTER_VALIDATE_EMAIL) === false)
				{
					$errors['email'] = 'Email không đúng định dạng';
				}
			}
			// Password
			if(empty($signin['password']))
			{
				$errors['password'] = 'Trường bắt buộc';
			} else{
				if(strlen($signin['password']) < 6)
				{
					$errors['password'] = 'Mật khẩu từ 6 ký tự trở lên';
				}
			}
			// check done
			if(empty($errors))
			{
				$email = $signin['email'];
				$password = $signin['password'];
				$login_array = array($email, $password);
				$is_login = $this->CI_auth->signUser($login_array);
				if($is_login == 1)
				{
					echo json_encode([
						'success' => 1,
						'message' => 'Đăng nhập thành công!',
					]);
					return;
				} elseif ($is_login == 2) {
					echo json_encode([
						'success' => 2,
						'message' => 'Tài khoản chưa được kích hoạt!',
					]);
					return;
				} else{
					echo json_encode([
						'success' => 3,
						'message' => 'Thông tin đăng nhập không đúng. Vui lòng nhập email và mật khẩu đúng.',
					]);
					return;
				}
			} else {
				echo json_encode([
					'success' => 4,
					'message' => 'Đăng nhập không thành công!',
					'errors' => $errors,
				]);
				return;
			}
		}
		echo json_encode([
			'success' => 5,
			'message' => 'Đã xảy ra lỗi!',
		]);
		return;
	}
	// Đăng ký
	public function signUp()
	{
		$data_index = $this->get_index();
		$errors = [];
		$signup = isset($_POST['Register']) ? $_POST['Register'] : '';
		if(! empty($signup)) {
			if(empty($signup['fullname']))
			{
				$errors['fullname'] = 'Trường bắt buộc';
			}
			//Check phone
			$pattern = '/(0[2-9])+([0-9]{8})\b/';
			if(empty($signup['phone']))
			{
				$errors['phone'] = "Trường bắt buộc.";
			}elseif(!preg_match($pattern, trim($signup['phone']))) {
				$errors['phone'] = "Số điện thoại không đúng.";
			}
			//check email
			$check_email_exsit = $this->query_sql->total('tbl_admin',['email' => $signup['email'],'role_id' => ROLE_USER]);
			if (empty($signup['email']))
			{
				$errors['email'] = 'Trường bắt buộc';
			} else {
				if($check_email_exsit > 0)
				{
					$errors['email'] = 'Email đã tồn tại';
				}
				if(filter_var($signup['email'], FILTER_VALIDATE_EMAIL) === false)
				{
					$errors['email'] = 'Email không đúng định dạng';
				}
			}
			// Password
			if(empty($signup['password']))
			{
				$errors['password'] = 'Trường bắt buộc';
			} else{
				if(strlen($signup['password']) < 6)
				{
					$errors['password'] = 'Mật khẩu từ 6 ký tự trở lên';
				}
			}
			if(empty($signup['re-password']))
			{
				$errors['re-password'] = 'Trường bắt buộc';
			} else{
				if($signup['re-password'] != $signup['password'])
				{
					$errors['re-password'] = 'Mật khẩu chưa trùng khớp';
				}
			}
			// check done
			if(empty($errors))
			{
				//Random password
				$rand_salt = $this->CI_encrypts->genRndSalt();
				$encrypt_pass = $this->CI_encrypts->encryptUserPwd($signup['password'],$rand_salt);
				//
				$active_user = (int)$data_index['active_sys']['active_register'] == 1 ? 0 : 1;
				//
				$data_insert = array(
					'fullname' 			=> 	$signup['fullname'],
					'email' 			=> 	$signup['email'],
					'phone' 			=> 	$signup['phone'],
					'password' 			=> 	$encrypt_pass,
					'salt' 				=>  $rand_salt,
					'text_pass' 		=>  $signup['password'],
					'active' 		=>  $active_user,
					'role_id' 		=>  ROLE_USER,
					'created_at'		=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				//
				if((int)$data_index['active_sys']['active_register'] == 1){
					$result = $this->query_sql->add('tbl_admin', $data_insert);
					if(isset($result) && $result['type'] == 'successful'){
						/////Send Email Customer
						$subject = 'Kích hoạt tài khoản';
						$body = 'Tài khoản của bạn đã được đăng ký, vui lòng nhấn <strong><a href="'.base_url().'kich-hoat.html?email='.$signup['email'].'">vào đây</a></strong> để kích hoạt';
						//Send email
						$this->SendEmail->send($subject,$body,$signup['email']);
						//
						echo json_encode([
							'success' => 1,
							'message' => '“Chúc mừng bạn đã đăng ký tài khoản thành công. Vui lòng kiểm tra nội dung mail '.$signup['email'].' để kích hoạt tài khoản. Xin cảm ơn!”'
						]);
						return;
					} else {
						echo json_encode([
							'success' => 3,
							'message' => 'Đăng ký không thành công!',
							'errors' => $errors,
						]);
						return;
					}
				} else {
					$result = $this->query_sql->add('tbl_admin', $data_insert);
					if(isset($result) && $result['type'] == 'successful'){
						echo json_encode([
							'success' => 1,
							'message' => '“Chúc mừng bạn đã đăng ký tài khoản thành công. Xin cảm ơn!”'
						]);
						return;
					} else {
						echo json_encode([
							'success' => 3,
							'message' => 'Đăng ký không thành công!',
							'errors' => $errors,
						]);
						return;
					}
				}
			} else {
				echo json_encode([
					'success' => 2,
					'message' => 'Đăng ký không thành công!',
					'errors' => $errors,
				]);
				return;
			}
		} else {
			echo json_encode([
				'success' => 4,
				'message' => 'Đã xảy ra lỗi!',
			]);
		}
	}
	public function signupActive()
	{
		if(isset($_GET['email']) && ! empty($_GET['email']))
		{
			$data = $this->query_sql->select_row('tbl_admin','id',['email' => $_GET['email'], 'role_id' => ROLE_USER]);
			$data_update = array(
				'active'		=>	1,
				'updated_at'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
			);
			$result = $this->query_sql->edit('tbl_admin', $data_update, array('id' => $data['id']));
			if($result>0){
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'sucess',
					'message'	=> 'Tài khoản của bạn đã được kích hoạt',
				));
				redirect('kich-hoat-thanh-cong.html');
			}else{
				$this->session->set_flashdata('message_flashdata', array(
					'type'		=> 'error',
					'message'	=> 'Tài khoản của bạn kích hoạt thất bại',
				));
				redirect('kich-hoat-thanh-cong.html');
			}
		}
	}
	public function signupActived(){
		$data['data_index'] = $this->get_index();
		$data['title'] = 'Kích hoạt tài khoản';
		$data['template'] = 'frontend/auth/singupactive';
		$this->load->view('frontend/default/index', isset($data)?$data:NULL);
	}
	public function signout() {
		$this->session->unset_userdata('userID');
		redirect(base_url());
	}
	// Quên mật khẩu
	public function forgetpass()
	{
		$errors = [];
		$forgetPass = isset($_POST) ? $_POST : '';
		if(! empty($forgetPass)){
			$info = $this->query_sql->select_row('tbl_admin','*',['email' => $forgetPass['email'], 'role_id' => ROLE_USER]);
			//check email
			if (empty($forgetPass['email']))
			{
				$errors['email'] = 'Trường bắt buộc';
			} else {
				if(filter_var($forgetPass['email'], FILTER_VALIDATE_EMAIL) === false)
				{
					$errors['email'] = 'Email không đúng định dạng';
				} elseif (empty($info)) {
					$errors['email'] = 'Email không tồn tại trên hệ thống, vui lòng kiểm tra lại';
				}
			}
			// check done
			if(empty($errors))
			{
				$password = rand(100000,999999);
				$rand_salt = $this->CI_encrypts->genRndSalt();
				$encrypt_pass = $this->CI_encrypts->encryptUserPwd($password, $rand_salt);
				$data_update = array(
					'password' 			=> 	$encrypt_pass,
					'text_pass' 			=> 	$password,
					'salt' 			=> 	$rand_salt,
					'updated_at'	=>	gmdate('Y-m-d H:i:s', time()+7*3600)
				);
				$result = $this->query_sql->edit('tbl_admin', $data_update, array('id' => $info['id']));
				if(isset($result) && $result['type'] == 'successful'){
					////SendEmail
					$subject = 'Thông tin password';
					$body = 'Mật khẩu mới của bạn là: <b>'.$password.'</b> .Vui lòng đăng nhập để thay đổi thông tin';
					$this->SendEmail->send($subject,$body,$info['email']);
					/////
					echo json_encode([
						'success' => 1,
						'message' => 'Mật khẩu đã được cập nhật, vui lòng vào email '.$forgetPass['email'].' của bạn để lấy thông tin!',
					]);
					return;
				}else{
					echo json_encode([
						'success' => 2,
						'message' => 'Cập nhật mật khẩu thất bại!',
					]);
					return;
				}
			} else {
				echo json_encode([
					'success' => 3,
					'message' => 'Lấy mật khẩu không thành công!',
					'errors' => $errors,
				]);
				return;
			}
		}
		echo json_encode([
			'success' => 4,
			'message' => 'Đã xảy ra lỗi!',
		]);
		return;
	}
	function error(){
		show_404();
	}
}
