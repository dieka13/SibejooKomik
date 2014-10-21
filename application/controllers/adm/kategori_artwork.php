<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_artwork extends CI_Controller
{
	var $user_info;
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('tank_auth', 'security', 'session'));

		$this->load->model('adm/kategori_mdl', '', TRUE);
		
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
		
		$info['module'] = "kategori_artwork";
		$info['action'] = "manage";
		
		$data['kategori_artwork'] = $this->kategori_mdl->get_all();
		if(NULL != $this->session->flashdata('alert'))
		{
			$info['alert'] = $this->session->flashdata('alert');
			$info['alert_class'] = $this->session->flashdata('alert_class');
		}
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/kategori_artwork_manage', $data);
		$this->load->view('adm/footer');
	}
	
	function add()
	{
		$info['module'] = "kategori_artwork";
		$info['action'] = "add";
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/kategori_artwork_add');
		$this->load->view('adm/footer');
	}
	
	function do_add()
	{
		if( NULL == $this->input->post('nama_kategori'))
		{
			show_404();
		}
		
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori'),
			'keterangan' => $this->input->post('keterangan')
		);
		
		if($this->kategori_mdl->insert($data))
		{
			$flash = array(
				'alert' => 'Kategori "'.$this->input->post('nama_kategori').'" berhasil ditambahkan',
				'alert_class' => 'success'
			);
			$this->session->set_flashdata($flash);
			redirect('admin/kategori_artwork');
		}
	}
	
	function edit($id)
	{
		$info['module'] = "kategori_artwork";
		$info['action'] = "edit";
		
		foreach ($this->kategori_mdl->get($id) as $a)
		{
			$data['id_kategori'] = $a->id_kategori;
			$data['nama_kategori'] = $a->nama_kategori;
			$data['keterangan'] = $a->keterangan;
		}
		
		if(empty($data))
		{
			show_404();
		}
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/kategori_artwork_edit', $data);
		$this->load->view('adm/footer');
	}
	
	function do_edit()
	{
		if( NULL == $this->input->post('id_kategori'))
		{
			show_404();
		}
		
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori'),
			'keterangan' => $this->input->post('keterangan')
		);
		
		if( $this->kategori_mdl->update($this->input->post('id_kategori'), $data) )
		{
			$flash = array(
				'alert' => 'Perubahan berhasil disimpan',
				'alert_class' => 'success'
			);
			$this->session->set_flashdata($flash);
			redirect('admin/kategori_artwork');
		}
	}
	
	function delete($id)
	{
		$info['module'] = "kategori_artwork";
		$info['action'] = "delete";
		
		foreach ($this->kategori_mdl->get($id) as $a)
		{
			$data['id_kategori'] = $a->id_kategori;
			$data['nama_kategori'] = $a->nama_kategori;
			$data['keterangan'] = $a->keterangan;
		}
		
		if(empty($data))
		{
			show_404();
		}
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/kategori_artwork_delete', $data);
		$this->load->view('adm/footer');
	}
	
	function do_delete()
	{
		if( NULL == $this->input->post('id_kategori'))
		{
			show_404();
		}
		
		if( $this->kategori_mdl->delete($this->input->post('id_kategori')) )
		{
			$flash = array(
				'alert' => 'Kategori "'.$this->input->post('nama_kategori').'" berhasil dihapus',
				'alert_class' => 'success'
			);
			$this->session->set_flashdata($flash);
			redirect('admin/kategori_artwork');
		}
	}
}