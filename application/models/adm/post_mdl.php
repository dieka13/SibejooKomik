<?php 


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post_mdl extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	
	function get_all($ordered = FALSE) //ambil semua row dari tabel kategori di database
	{		
		if($ordered == TRUE)
		{
			$this->db->order_by("tanggal_posting", "desc");
		}
		
		$query = $this->db->get('post');
		
		return $query->result();
	}
	
	function get($id) //ambil row dengan id $id dari tabel kategori di database
	{
		$this->db->from('post');
		$this->db->where('id_post', $id);
		$this->db->limit(1);
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_latest($limit, $offset = 0)
	{
		$this->db->from('post')
		->order_by('tanggal_posting', 'desc')
		->limit($limit, $offset);
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function insert($data) //memasukkan row sesuai $data ke tabel kategori. menghasilkan TRUE jika berhasil, FALSE jika gagal
	{
		$this->db->insert('post', $data);
		
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
		$this->db->where('id_post', $id);
		$this->db->update('post', $data);
		
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
		$this->db->where('id_post', $id);
		$this->db->delete('post'); 
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