<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendEmail extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function send($subject = '', $message = '', $to, $email_admin = []){
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_port' => '587',
			'smtp_user' => 'sentmail.optech@gmail.com',
			'smtp_pass' => 'bryodnfmzckgndxm',
			'smtp_crypto' => 'tls',
			'charset'   => 'utf-8',
			'mailtype'  => 'html',
			'wordwrap' => TRUE,
			'newline' => "\r\n"
		);
		$this->load->library('email', $config);
		$this->email->from('sentmail.optech@gmail.com', 'Nhà bất 1368');
		if(! empty($email_admin))
		{
			$list = array($email_admin);
		} else {
			$list = array();
		}
		if(! empty($to))
		{
			array_push($list, $to);
		}
		$this->email->to($list);
		$this->email->subject($subject);
		$this->email->message($message);
		// $this->email->attach('http://lucjfer.local/uploads/qrcode/5b80ce339cd8f20d538b4567/LUCJFER.png', "inline");
		if ($this->email->send()) {
			return true;
		} else {
			// echo $this->email->print_debugger();
		}

		return false;
	}
}

/* End of file SendEmail.php */
/* Location: ./application/models/SendEmail.php */