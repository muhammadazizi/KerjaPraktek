<?php

class model_bank extends CI_Model
{
	public function index()
	{
		$image = $this->input->post('image');
		$bank = array(

			'image' => $this->input->post('image')
		);

		//input data ke database tabel tb_invoice
		$this->db->insert('bank', $bank);

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
}
