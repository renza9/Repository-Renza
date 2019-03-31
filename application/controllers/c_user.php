<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

	private $fb;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'html');
		$this->load->library(array('form_validation','FacebookSDK'));
		$this->load->model('m_query');
		$this->fb = $this->facebooksdk;
	}

	public function index()
	{
		if ($this->session->userdata('level')) {
			redirect('c_mahasiswa','refresh');
		}
		$cb = "http://localhost/CI_ID/c_user/callback";
		$url = $this->fb->getLoginUrl($cb);
		$this->load->view('v_userlogin', ['url'=>$url]);
	}

	public function callback()
	{
		$act = $this->fb->getAccessToken();
		$data = $this->fb->getUserData($act);
		print_r($data);

	}
	public function user_login()
	{
		$this->form_validation->set_rules('username', 'Username' , 'required');
		$this->form_validation->set_rules('password', 'Pasword' , 'required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
		if ($this->form_validation->run() ) 
		{
			$username = $this->input->post('username');//sesuaikan nama fiednya denagn inputan ok
			$password = $this->input->post('password');
			$this->m_query->login($username, $password);
			
		}
		 else
		{
			$this->index();
		}
	}


	public function keluar()
	{
		$this->session->sess_destroy();//ini sess_detroy ini dia menhaspu semua sessi yang berjalan
		$session = array('level','username','password');
		$this->session->unset_userdata($session);		
		redirect('c_user','refresh');//redirexk kehalaman utama
	}

	
}

/* End of file c_user.php */
/* Location: ./application/controllers/c_user.php */