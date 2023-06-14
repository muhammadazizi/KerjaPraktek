<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beranda extends CI_Controller
{
	public function guest()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['barang'] = $this->db->get('barang')->result();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('guest/beranda', $data);
	}

	public function cari()
	{
		$data['title'] = 'Toko Jam Surya';
		$keyword = $this->input->post('keyword');

		$this->load->model('model_search');
		$data['barang'] = $this->model_search->search($keyword);

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('guest/search', $data);
	}

	public function gender()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['barang'] = $this->db->get('barang')->result();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('guest/gender', $data);
	}

	public function tambahkeranjang($id)
	{
		//mengambil data dari method find
		$this->load->model('model_barang');
		$barang = $this->model_barang->find($id);

		//Array khusus untuk library Cart
		$data = array(
			'id'      => $barang->id_barang,
			'qty'     => 1,
			'price'   => $barang->harga,
			'name'    => $barang->nama_barang,
			'kategori'	  => $barang->nama_kategori
		);

		//insert data ke library cart
		$this->cart->insert($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Barang Telah Di Tambahkan !!!  </div>');
		redirect('beranda/guest');
	}

	public function detail_keranjang()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Please Login Before Buy !!!  </div>');
		redirect('beranda/guest');
	}

	public function detail($id_brg)
	{
		$data['title'] = 'Toko Jam Surya';
		$data['barang'] = $this->model_barang->detail_barang($id_brg);

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('guest/detail', $data);
	}

	public function keranjang()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Please Login Before Buy !!!  </div>');
		redirect('beranda/guest');
	}
}
