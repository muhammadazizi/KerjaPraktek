<?php

class model_barang extends CI_Model
{
	function tampil_data()
	{
		//Mengabil Data dari tabel barang
		return $this->db->get('barang');
	}

	function tambah_barang($data, $table)
	{
		//Insert Data ke Database
		$this->db->insert($table, $data);
	}
	//Digunakan mengambil Data Barang dengan parameter Where
	function edit_barang($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	//Digunakan untuk Melakukan Update pada database 
	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//Digunakan untuk Melakukan Delete pada database 
	function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	//Membuat method untuk mencari barang dan mengembailkan barang
	public function find($id)
	{

		//Simpan ke variabel result dari hasil pencarian
		$result = $this->db->where('id_barang', $id)
			->limit(1)
			->get('barang');

		if ($result->num_rows() > 0) {

			return $result->row();
		} else {

			return array();
		}
	}

	public function detail_barang($id_barang)
	{

		$result = $this->db->where('id_barang', $id_barang)
			->get('barang');

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {

			return false;
		}
	}

	public function ambil_id($id_barang)
	{
		return $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
	}

	public function proses($id_barang)
	{
		$data = [
			'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
			'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
			'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
			'harga' => htmlspecialchars($this->input->post('harga', true)),
			'stok' => htmlspecialchars($this->input->post('stok', true)),
			'image' => htmlspecialchars($this->input->post('image', true)),
		];
		$this->db->where('id_barang', $this->input->post('id_barang'));
		$this->db->update('barang', $data);
	}
}
