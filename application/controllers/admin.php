<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_chart');
	}

	function index1()
	{
		$data['transaksi'] = $this->model_chart->Jum_bulan();
		$this->load->view('owner/chart', $data);
	}
	public function index()
	{
		$data['title'] = 'Toko Jam Surya';
		$this->load->view('templates/auth_header', $data);
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['barang'] = $this->db->get('barang')->result_array();

		$this->form_validation->set_rules('namaBarang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('image', 'Image', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('owner/dashboard', $data);
		} else {
			$data = [
				'nama_kategori' => htmlspecialchars($this->input->post('namakategori', true)),
				'nama_barang' => htmlspecialchars($this->input->post('namaBarang', true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
				'harga' => htmlspecialchars($this->input->post('harga', true)),
				'stok' => htmlspecialchars($this->input->post('stok', true)),
				'image' => htmlspecialchars($this->input->post('image', true)),
			];
			$this->db->insert('barang', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			New Barang Added!  </div>');
			redirect('admin');
		}
	}

	public function transaksi()
	{
		$data['title'] = 'Toko Jam Surya';
		$this->load->view('templates/auth_header', $data);
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['transaksi'] = $this->db->get('transaksi')->result_array();
		$this->load->view('owner/transaksi', $data);
	}

	public function edit()
	{
		$data['title'] = 'Toko Jam Surya';
		$this->load->view('templates/auth_header', $data);
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['barang'] = $this->db->get('barang')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('owner/editbarang', $data);
		} else {
		}
	}

	public function detail_keranjang()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('member/keranjang');
		$this->load->view('templates/auth_footer');
	}

	public function profil()
	{
		$data['title'] = 'My Profil';
		$this->load->view('templates/auth_header', $data);
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('auth/profiladmin', $data);
	}

	public function edit_data($id_transaksi)
	{
		$data['title'] = 'Toko Jam Surya';
		$this->load->view('templates/auth_header', $data);
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['transaksi'] = $this->model_transaksi->ambil_id($id_transaksi);
		$this->load->view('owner/edit', $data);
	}

	public function update($id_transaksi)
	{
		$this->model_transaksi->proses($id_transaksi);
		redirect('admin/transaksi');
	}

	public function edit_data1($id_barang)
	{
		$data['title'] = 'Toko Jam Surya';
		$this->load->view('templates/auth_header', $data);
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['barang'] = $this->model_barang->ambil_id($id_barang);
		$this->load->view('owner/editbarang', $data);
	}

	public function update1($id_barang)
	{
		$this->model_barang->proses($id_barang);
		redirect('admin');
	}
}