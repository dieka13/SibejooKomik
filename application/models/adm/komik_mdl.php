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
    
    function insert($data)
    {
        $this->db->insert('komik', $data);
        
        if($this->db->insert_id() != 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    function update($id_komik, $data)
    {
        $this->db->where('id_komik', $id_komik);
        $this->db->update('komik', $data);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    function delete($id)
    {
        $this->db->where('id_komik', $id);
        $this->db->delete('komik'); 
        $this->db->limit(1);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    function insert_halaman($id_komik, $data)
    {
        $data['id_komik'] = $id_komik;
        $this->db->insert('halaman_komik', $data);
        
        if($this->db->insert_id() != 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    function update_halaman()
    {
        
    }
    
    function delete_halaman()
    {
        
    }
}