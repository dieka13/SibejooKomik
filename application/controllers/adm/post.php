<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller
{
	var $user_info;
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('tank_auth', 'security', 'session'));

		$this->load->model('adm/post_mdl', '', TRUE);
		
		$this->load->helper(array('form', 'date'));
		
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
		
		$info['module'] = "post";
		$info['action'] = "manage";
		
		$data['post'] = $this->post_mdl->get_all(TRUE);
		if(NULL != $this->session->flashdata('alert'))
		{
			$info['alert'] = $this->session->flashdata('alert');
			$info['alert_class'] = $this->session->flashdata('alert_class');
		}
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/post_manage', $data);
		$this->load->view('adm/footer');
	}
	
	function add()
	{
		$info['module'] = "post";
		$info['action'] = "add";
		$footer['editor'] = TRUE;
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/post_add');
		$this->load->view('adm/footer', $footer);
	}
	
	function do_add()
	{
		if( NULL == $this->input->post('judul'))
		{
			show_404();
		}
		
		$data = array(
			'judul' => $this->input->post('judul'),
			'isi' => $this->input->post('isi'),
			'tanggal_posting' => date('Y-m-d H:i:s')
		);
		
		if($this->post_mdl->insert($data))
		{
			$flash = array(
				'alert' => 'Post "'.$this->input->post('judul').'" berhasil ditambahkan',
				'alert_class' => 'success'
			);
			$this->session->set_flashdata($flash);
			redirect('admin/post');
		}
	}
	
	function edit($id)
	{
		$info['module'] = "post";
		$info['action'] = "edit";
		
		foreach ($this->post_mdl->get($id) as $a)
		{
			$data['id_post'] = $a->id_post;
			$_POST['judul'] = $a->judul;
			$_POST['isi'] = $a->isi;
		}
		
		if(empty($data))
		{
			show_404();
		}
		
		$editor['editor'] = TRUE;
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/post_edit', $data);
		$this->load->view('adm/footer', $editor);
	}
	
	function do_edit()
	{
		if( NULL == $this->input->post('id_post'))
		{
			show_404();
		}
		
		$data = array(
			'judul' => $this->input->post('judul'),
			'isi' => $this->input->post('isi')
		);
		
		if( $this->post_mdl->update($this->input->post('id_post'), $data) )
		{
			$flash = array(
				'alert' => 'Perubahan berhasil disimpan',
				'alert_class' => 'success'
			);
			$this->session->set_flashdata($flash);
			redirect('admin/post');
		}
	}
	
	function delete($id)
	{
		$info['module'] = "post";
		$info['action'] = "delete";
		
		foreach ($this->post_mdl->get($id) as $a)
		{
			$data['id_post'] = $a->id_post;
			$data['judul'] = $a->judul;
			$data['isi'] = $a->isi;
		}
		
		if(empty($data))
		{
			show_404();
		}
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/post_delete', $data);
		$this->load->view('adm/footer');
	}
	
	function do_delete()
	{
		if( NULL == $this->input->post('id_post'))
		{
			show_404();
		}
		
		if( $this->post_mdl->delete($this->input->post('id_post')) )
		{
			$flash = array(
				'alert' => 'Post "'.$this->input->post('judul').'" berhasil dihapus',
				'alert_class' => 'success'
			);
			$this->session->set_flashdata($flash);
			redirect('admin/post');
		}
	}
}