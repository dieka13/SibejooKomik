<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Komik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('tank_auth', 'security', 'session'));
        $this->load->model('adm/komik_mdl', '', TRUE);
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
        $info['module'] = "komik";
        $info['action'] = "manage";
        
        $data['komik'] = $this->komik_mdl->get_all_komik();
        if(NULL != $this->session->flashdata('alert'))
        {
            $info['alert'] = $this->session->flashdata('alert');
            $info['alert_class'] = $this->session->flashdata('alert_class');
        }
        
        $this->output->nocache();
        $this->load->view('adm/header', $this->user_info);
        $this->load->view('adm/side_menu', $info);
        $this->load->view('adm/komik_manage', $data);
        $this->load->view('adm/footer');
    }
    
    function upload()
    {
        $info['module'] = "komik";
        $info['action'] = "upload";

        $this->output->nocache();
        $this->load->view('adm/header', $this->user_info);
        $this->load->view('adm/side_menu', $info);
        $this->load->view('adm/komik_upload');
        $this->load->view('adm/footer');
        $this->load->view('adm/komik_jquery');
    }
    
    function _rearrange( $arr ){
        foreach( $arr as $key => $all ){
            foreach( $all as $i => $val ){
                $new[$i][$key] = $val;   
            }   
        }
        return $new;
    }
    
    function do_upload()
    {   
        $this->load->library('form_validation');
        $this->load->helper('file');

        $this->form_validation->set_rules('judul', 'Judul', 'required|max_length[60]|strip');

        if($this->form_validation->run() == FALSE )
        {
            $this->upload();
        }
        else
        {
            $upload_path = './komik/'.url_title($this->input->post('judul'));
            if (!file_exists($upload_path))
            {
                mkdir($upload_path);
                $halaman = $this->_rearrange($_FILES['halaman_komik']);
                var_dump($halaman);
                $i = 1;
                foreach($halaman as $h)
                {
                    
                    $moved = move_uploaded_file($h['tmp_name'], $upload_path."/".$i.substr($h['name'],-4));
                    if($moved)
                    {
                        $i++;
                    }
                }
            }
            elseif (!is_dir($upload_path)) 
            {
                echo $upload_path, " is not a directory";
            } else {
                $flash = array(
                    'alert' => 'Komik dengan judul "' . $this->input->post('judul') . '" sudah ada',
                    'alert_class' => 'alert'
                );

                $this->session->set_flashdata($flash);
                redirect('admin/komik');
            }
        }
    }
    
    
    
}



/* */