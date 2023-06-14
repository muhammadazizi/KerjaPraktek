<?php

class model_search extends CI_Model
{
	public function search($keyword)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->like('nama_barang', $keyword);
		return $this->db->get()->result();
	}
}
