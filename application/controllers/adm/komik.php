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
        $info['action'] = "add";

        $this->output->nocache();
        $this->load->view('adm/header', $this->user_info);
        $this->load->view('adm/side_menu', $info);
        $this->load->view('adm/komik_upload');
        $this->load->view('adm/footer');
        $this->load->view('adm/komik_jquery');
    }
}



/* */