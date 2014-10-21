<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('adm/artwork_mdl', '', TRUE);
		$this->load->model('adm/post_mdl', '', TRUE);
		$this->load->model('adm/kategori_mdl', '', TRUE);
	}

	function index()
	{
		$menu['category'] = $this->kategori_mdl->get_all();
		$gallery['artwork'] = $this->artwork_mdl->get_all('id_artwork, judul, url, ukuran_thumbnail');
		$data['posts'] = $this->post_mdl->get_latest(3,0);
		
		$this->load->view('templates/header', $menu);
		$this->load->view('templates/gallery', $gallery);
		$this->load->view('templates/latest_news', $data);
		$this->load->view('templates/footer');
	}
	
	function gallery()
	{
		
	}
	
	function load_post_by_seourl($id, $seourl = FALSE)
	{
		if($id != "")
		{
			
			if($result = $this->post_mdl->get($id))
			foreach ($result as $r)
			{
				$post['judul'] = $r->judul;
				$post['isi'] = $r->isi;
			}
			else 
			{
				show_404();
			}
			
			$correct_title = url_title($post['judul'], '-', TRUE);
			
			if((! $seourl) or ($seourl != $correct_title))
			{
				redirect('post/'.$id.'/'.$correct_title, 301);
			}
			
			$menu['category'] = $this->kategori_mdl->get_all();
			
			$this->load->view('templates/header', $menu);
			$this->load->view('templates/singlepost', $post);
			$this->load->view('templates/footer');
		}
		else
		{
			show_404();
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */