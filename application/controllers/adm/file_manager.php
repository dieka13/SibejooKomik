<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class File_manager extends CI_Controller
{
	var $user_info;
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('tank_auth', 'security', 'session'));

		$this->load->model('adm/post_mdl', '', TRUE);
		
		$this->load->helper('form');
		
		$this->_cek_login();
		$this->session->set_flashdata('refer', current_url());
	}
	
	function _cek_login()
	{
		if($this->tank_auth->is_logged_in())
		{
			$this->user_info = array('username' => $this->tank_auth->get_username());
		} 
		else 
		{
			redirect('/auth/login', 'location');
		}
	}
	
	function index()
	{
		
		$info['module'] = "file manager";
		$info['action'] = "";
		
		$data['post'] = $this->post_mdl->get_all();
		if(NULL != $this->session->flashdata('alert'))
		{
			$info['alert'] = $this->session->flashdata('alert');
			$info['alert_class'] = $this->session->flashdata('alert_class');
		}
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/file_manager');
		$this->load->view('adm/footer');
	}
	
	
}