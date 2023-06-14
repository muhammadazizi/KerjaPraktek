<?php

class Model_kategori extends CI_Model
{

	public function data_pria()
	{
		return $this->db->get_where('barang', array('nama_kategori' => 'pria'));
	}

	public function data_wanita()
	{
		return $this->db->get_where('barang', array('nama_kategori' => 'wanita'));
	}

	public function data_unisex()
	{
		return $this->db->get_where('barang', array('nama_kategori' => 'unisex'));
	}

	public function data_aksessoris()
	{
		return $this->db->get_where('barang', array('nama_kategori' => 'aksessoris'));
	}

	public function data_mesin()
	{
		return $this->db->get_where('barang', array('nama_kategori' => 'mesin'));
	}

	public function data_dinding()
	{
		return $this->db->get_where('barang', array('nama_kategori' => 'dinding'));
	}
}
