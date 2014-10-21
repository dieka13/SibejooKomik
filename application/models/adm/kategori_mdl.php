<?php 


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_mdl extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	
	function get_all() //ambil semua row dari tabel kategori di database
	{		
		$query = $this->db->get('kategori_artwork');
		return $query->result();
	}
	
	function get($id) //ambil row dengan id $id dari tabel kategori di database
	{
		$this->db->from('kategori_artwork');
		$this->db->where('id_kategori', $id);
		$this->db->limit(1);
		
		$query = $this->db->get();
		return $query->result();
	}
	
	
	function insert($data) //memasukkan row sesuai $data ke tabel kategori. menghasilkan TRUE jika berhasil, FALSE jika gagal
	{
		$this->db->insert('kategori_artwork', $data);
		
		if($this->db->insert_id() != 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function update($id, $data)
	{	
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori_artwork', $data);
		
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
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori_artwork'); 
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
	
	
}
?>