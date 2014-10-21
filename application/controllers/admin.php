<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	var $user_info;
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library(array('tank_auth', 'session'));
		$this->_cek_login();
	}
	
	function _cek_login()
	{
		if($this->tank_auth->is_logged_in()){
			$this->user_info = array('username' => $this->tank_auth->get_username());
		} else {
			redirect('/auth/login/', 'location');
		}
	}
	
	function index($param = null)
	{
		$data['module'] = "admin page";
		$data['action'] = "home";
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $data);
		$this->load->view('adm/welcome');
		$this->load->view('adm/footer');
	}
	
	function login()
	{
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/login_form');
		$this->load->view('adm/footer');
	}
	
	function logout()
	{
		
	}
}