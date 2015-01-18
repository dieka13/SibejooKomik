<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Artwork extends CI_Controller
{
	var $user_info;
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('tank_auth', 'security', 'session'));
		 	
		$this->load->model('adm/artwork_mdl', '', TRUE);
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

	public function index()
	{
		$info['module'] = "artwork";
		$info['action'] = "manage";
		
		$data['artworks'] = $this->artwork_mdl->get_all();
		if(NULL != $this->session->flashdata('alert'))
		{
			$info['alert'] = $this->session->flashdata('alert');
			$info['alert_class'] = $this->session->flashdata('alert_class');
		}
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/artwork_manage', $data);
		$this->load->view('adm/footer');
	}
	
	public function manage()
	{
		redirect('admin/artwork', 403);
	}
	
	public function upload()
	{
		$info['module'] = "artwork";
		$info['action'] = "upload";
		
		foreach($this->kategori_mdl->get_all() as $k)
		{
			$kategori[$k->id_kategori] = $k->nama_kategori;
		}
		$data['kategori'] = $kategori;
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/artwork_upload', $data);
		$this->load->view('adm/footer');
	}
	
	public function do_upload() // disabled
	{	
		error_reporting(E_ALL);
		ini_set("display_errors", "on"); 
		$this->load->library('form_validation');
		$this->load->helper('file');
		
		$this->form_validation->set_rules('judul', 'Judul', 'required|max_length[60]|strip');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|is_natural');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'htmlspecialchars|trim');
		
		if($this->form_validation->run() == FALSE )
		{
			$this->upload();
		}
		else
		{
			$config['upload_path'] =  APPPATH.'/artwork/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 6000;
			$config['file_name'] = $this->input->post('judul');
			$this->load->library('upload', $config);
			
			echo "LOADED";
			echo $this->upload->display_errors();
			
			$result = $this->upload->do_upload('artwork');
			echo $this->upload->display_errors();
			echo $result;
			
			
			if($result == TRUE)
			{
				
				
				//memasukan data ke database
				$upload_data = $this->upload->data();
				$data = array( 'judul' => $this->input->post('judul'),
							   'deskripsi' => $this->input->post('deskripsi'),
							   'id_kategori' => $this->input->post('kategori'),
							   'url' => $upload_data['file_name'],
				);
				$this->artwork_mdl->insert($data);
				echo "Uploaded";
				
				//ini_set("memory_limit", "-1");
				/*$config['image_library'] = 'gd2';
				$config['source_image'] = './artwork/'.$upload_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['thumb_marker'] = '_280';
				$config['maintain_ratio'] = TRUE;
				$config['master_dim'] = 'width';
				$config['width'] = 280;
				$config['height'] = 280;*/
				
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$this->image_lib->clear();
				
				$config = array();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './artwork/'.$upload_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['thumb_marker'] = '_580';
				$config['maintain_ratio'] = TRUE;
				$config['master_dim'] = 'width';
				$config['width'] = 580;
				$config['height'] = 580;
				
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				
				$flash = array(
					'alert' => 'Artwork "'.$this->input->post('judul').'" berhasil ditambahkan',
					'alert_class' => 'success'
				);
				$this->session->set_flashdata($flash);
				redirect('admin/artwork');
			}
			else
			{
				echo "Here";
				echo $this->upload->display_errors();				
			}
		}
		
	}
	
	public function edit($id)
	{
		foreach ($this->artwork_mdl->get($id) as $a)
		{
			$data['id_artwork'] = $a->id_artwork;
			$data['judul'] = $a->judul;
			$data['id_kategori'] = $a->id_kategori;
			$data['deskripsi'] = $a->deskripsi;
			$data['ukuran_thumbnail'] = $a->ukuran_thumbnail;
			$data['url'] = $a->url;
		}
		
		if(empty($data))
		{
			show_404();
		}
		
		$data['thumbnail_enum'] = $this->artwork_mdl->get_thumbnail_enum();
		
		$info['module'] = "artwork";
		$info['action'] = "edit";
		
		foreach($this->kategori_mdl->get_all() as $k)
		{
			$kategori[$k->id_kategori] = $k->nama_kategori;
		}
		$data['kategori'] = $kategori;
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/artwork_edit', $data);
		$this->load->view('adm/footer');	
	}
	
	
	public function do_edit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul', 'required|max_length[60]|strip');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|is_natural');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'htmlspecialchars|trim');
		
		if($this->form_validation->run() == FALSE )
		{
			$this->edit($this->input->post('id_artwork'));
		}
		else
		{
			$data = array();
			$data['id_artwork'] = $this->input->post('id_artwork');
			$data['judul'] = $this->input->post('judul');
			$data['id_kategori'] = $this->input->post('kategori');
			$data['deskripsi'] = $this->input->post('deskripsi');
			$data['ukuran_thumbnail'] = $this->input->post('ukuran_thumbnail');
			
			if(! $this->input->post('judul_lama') == $this->input->post('judul'))
			{
				$extension = substr($this->input->post('url'), -4);
				$data['url'] = "artwork/".$this->input->post('judul').$extension;
			}
			
			if($this->artwork_mdl->update($this->input->post('id_artwork'), $data))
			{
				$data = array(
					'alert' => 'Perubahan berhasil disimpan',
					'alert_class' => 'success'
				);
			} else {
				$data = array(
					'alert' => 'Terjadi error ketika perubahan disimpan',
					'alert_class' => 'alert'
				);
			}
			
			$this->session->set_flashdata($data);
			redirect('admin/artwork');
		}
	}


	
	public function delete($id)
	{
		foreach ($this->artwork_mdl->get($id) as $a)
		{
			$data['id_artwork'] = $a->id_artwork;
			$data['judul'] = $a->judul;
			$data['nama_kategori'] = $a->nama_kategori;
			$data['deskripsi'] = $a->deskripsi;
			$data['url'] = $a->url;
			$data['tanggal_upload'] = $a->tanggal_upload;
		}
		
		if(empty($data))
		{
			show_404();
		}
		
		$info['module'] = "artwork";
		$info['action'] = "delete";
		
		$this->output->nocache();
		$this->load->view('adm/header', $this->user_info);
		$this->load->view('adm/side_menu', $info);
		$this->load->view('adm/artwork_delete', $data);
		$this->load->view('adm/footer');
	}
	
	public function do_delete()
	{
		if("" == $this->input->post('id_artwork'))
		{
			show_404();
		}
		
		if($this->artwork_mdl->delete($this->input->post('id_artwork')))
		{
			
			$flash = array(
				'alert' => 'Artwork "'.$this->input->post('judul').'" berhasil dihapus',
				'alert_class' => 'success'
			);
			$this->session->set_flashdata($flash);
			redirect('admin/artwork');
		}
		else
		{
			$flash = array(
				'alert' => 'Terjadi kesalahan ketika menghapus artwork',
				'alert_class' => 'alert'
			);
			$this->session->set_flashdata($flash);
			redirect('admin/artwork');
		}
	}
	
	
	public function do_manual_upload()
	{
		$this->load->library('form_validation');
		$this->load->helper('file');
		
		$this->form_validation->set_rules('judul', 'Judul', 'required|max_length[60]|strip');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|is_natural');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'htmlspecialchars|trim');
		
		if($this->form_validation->run() == FALSE )
		{
			$this->upload();
		}
		else
		{
			
			$name = 'artwork'; 
	
			$upload_path    = './artwork/';
			$allowed_types  = array("jpg", "jpeg", "gif", "png");
			$extension      = end(explode(".", $_FILES[$name]["name"]));
			$max_size       = '4000';
			
			if ($_FILES['artwork']['name']!="")
			{
				if ((($_FILES[$name]["type"] == "image/gif")
					|| ($_FILES[$name]["type"] == "image/jpeg")
					|| ($_FILES[$name]["type"] == "image/pjpeg")
					|| ($_FILES[$name]["type"] == "image/png")
					|| ($_FILES[$name]["type"] == "image/x-png")
					|| ($_FILES[$name]["type"] == "application/excel")
					|| ($_FILES[$name]["type"] == "application/vnd.ms-excel")
					|| ($_FILES[$name]["type"] == "application/msexcel")
					|| ($_FILES[$name]["type"] == "application/pdf")
					|| ($_FILES[$name]["type"] == "application/x-download"))
					&& (round($_FILES[$name]["size"]/1024,2) < $max_size )
					&& in_array($extension, $allowed_types))
					{
			
						if ($_FILES[$name]["error"] > 0)
						{
							echo $_FILES[$name]["error"];
						}
						else
						{
							$uploadInput['orig_name']   = $_FILES[$name]["name"];
							$uploadInput['enc_name']    = $this->input->post('judul');
							$uploadInput['extension']   = $_FILES[$name]["type"];
			
							$moved = move_uploaded_file($_FILES[$name]["tmp_name"], $upload_path . url_title($uploadInput['enc_name'], '_') . '.' . $extension);
			
							if($moved)
							{
								$this->load->model('artwork_mdl', '', TRUE);
								$data = array( 'judul' => $this->input->post('judul'),
											   'deskripsi' => $this->input->post('deskripsi'),
											   'id_kategori' => $this->input->post('kategori'),
											   'url' => url_title($uploadInput['enc_name'], '_') . '.' . $extension
								);
								
								$config['source_image'] = './artwork/'.url_title($uploadInput['enc_name'], '_') . '.' . $extension;
								$config['create_thumb'] = TRUE;
								$config['thumb_marker'] = '_280';
								$config['maintain_ratio'] = TRUE;
								$config['master_dim'] = 'width';
								$config['width'] = 280;
								$config['height'] = 280;
								
								$this->load->library('image_lib', $config);
								$this->image_lib->resize();
								$this->image_lib->clear();
								
								$config = array();
								$config['image_library'] = 'gd2';
								$config['source_image'] = './artwork/'.url_title($uploadInput['enc_name'], '_') . '.' . $extension;
								$config['create_thumb'] = TRUE;
								$config['thumb_marker'] = '_580';
								$config['maintain_ratio'] = TRUE;
								$config['master_dim'] = 'width';
								$config['width'] = 580;
								$config['height'] = 580;
								
								$this->image_lib->initialize($config);
								$this->image_lib->resize();
								
								if($this->artwork_mdl->insert($data))
								{	
									$flash = array(
										'alert' => 'Artwork "'.$this->input->post('judul').'" berhasil ditambahkan',
										'alert_class' => 'success'
									);
										
									$this->session->set_flashdata($flash);
									redirect('admin/artwork');
								}
							}
							else
								echo 'fail';
			
						}
					}
			}
		}
	}
}