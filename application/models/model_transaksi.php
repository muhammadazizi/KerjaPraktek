<?php

//Menggunakan Composer untuk waktu


use Carbon\Carbon;

class model_transaksi extends CI_Model
{


	public function index()
	{

		//Date time berdasar jakarta
		date_default_timezone_set('Asia/Jakarta');

		//Ambil dari method post
		$nama = $this->input->post('nama_user');
		$hp = $this->input->post('hp');
		//Simpan di Array invoice

		$transaksi = array(
			'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
			'hp' => $this->input->post('hp'),
			'tanggal_transaksi' => time(),
			'status' => 'Belum Dikonfirmasi',
		);

		//input data ke database tabel tb_invoice
		$this->db->insert('transaksi', $transaksi);

		//ambil nilai dari insert_id
		$id_transaksi = $this->db->insert_id();

		//Perulangan untuk simpan daya ke database 
		foreach ($this->cart->contents() as $item) {
			$data = array(
				'id_transaksi' => $id_transaksi,
				'id_barang'	=> $item['id'],
				'nama_barang' => $item['name'],
				'jumlah'	=> $item['qty'],
				'harga'	=> $item['price']
			);

			//input data ke database tabel tb_pesanan
			$this->db->insert('detail_transaksi', $data);
		}
		return TRUE;
	}

	public function tampil_data()
	{

		$result = $this->db->get('transaksi');

		if ($result->num_rows() > 0) {

			return $result->result();
		} else {

			return array();
		}
	}

	public function ambil_id($id_transaksi)
	{
		return $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();
	}

	public function proses($id_transaksi)
	{
		$data = [
			'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
			'hp' => $this->input->post('hp'),
			'tanggal_transaksi' => time(),
			'status' => $this->input->post('status')
		];
		$this->db->where('id_transaksi', $this->input->post('id_transaksi'));
		$this->db->update('transaksi', $data);
	}
}
