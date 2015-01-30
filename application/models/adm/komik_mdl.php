<?php 


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Komik_mdl extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_all_komik()
    {
        
        $this->db->order_by('tanggal_upload','DESC');
        $query = $this->db->get('komik');
        return $query->result();
    }
    
    function get_komik($id_komik)
    {
        
        $this->db->from('komik')->where('id_komik', $id_komik);
        
        $query = $this->db->get();
        return $query->result();
    }
}