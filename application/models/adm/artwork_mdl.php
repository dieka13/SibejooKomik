<?php 


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Artwork_mdl extends CI_Model
{
	function __construct()
    {
        parent::__construct();
		$this->load->helper('database');
    }
	
	
	function get_all($columns = NULL) //ambil semua row dari tabel artwork di database
	{
		$this->db->from('artwork');
		$this->db->join('kategori_artwork', 'kategori_artwork.id_kategori = artwork.id_kategori');
		
		if(NULL !== $columns)
		{
			$this->db->select($columns);
		}
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function get($id) //ambil row dengan id $id dari tabel artwork di database
	{
		$this->db->from('artwork');
		$this->db->where('id_artwork', $id);
		$this->db->join('kategori_artwork', 'kategori_artwork.id_kategori = artwork.id_kategori');
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_by_category($category)
	{
		$this->db->from('artwork');
		$this->db->where('id_kategori', $category);
		$this->db->join('kategori_artwork', 'kategori_artwork.id_kategori = artwork.id_kategori');
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function insert($data) //memasukkan row sesuai $data ke tabel artwork. menghasilkan TRUE jika berhasil, FALSE jika gagal
	{
		$this->db->insert('artwork', $data);
		
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
		$this->db->where('id_artwork', $id);
		$this->db->update('artwork', $data);
		
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
		$this->db->where('id_artwork', $id);
		$this->db->delete('artwork'); 
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_thumbnail_enum()
	{
		return field_enums('artwork', 'ukuran_thumbnail');
	}
}
?>