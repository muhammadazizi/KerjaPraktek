<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengguna extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function bank()
	{
		$data['title'] = 'Pembayaran';
		$this->load->view('templates/auth_header', $data);
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['bank'] = $this->db->get('bank');
		$this->load->view('member/bank', $data);
	}


	public function index()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['barang'] = $this->db->get('barang')->result();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('member/dashboard', $data);
	}

	public function status()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['transaksi'] = $this->db->get('transaksi')->result();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('member/status', $data);
	}

	public function cari()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$keyword = $this->input->post('keyword');
		$this->load->model('model_search');
		$data['barang'] = $this->model_search->search($keyword);

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('member/search_user', $data);
	}

	public function detail_keranjang()
	{
		$data['title'] = 'Keranjang';
		$this->load->view('templates/auth_header', $data);
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('member/keranjang', $data);
	}

	public function tambah_keranjang($id)
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
		redirect('pengguna');
	}

	public function genderuser()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['barang'] = $this->db->get('barang')->result();
		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('member/genderuser', $data);
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('pengguna');
	}

	function pembayaran()
	{
		$data['title'] = 'Pembayaran';
		$this->load->view('templates/auth_header', $data);
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['barang'] = $this->db->get('barang')->row_array();
		$this->load->view('member/pembayaran', $data);
	}

	function detail_transaksi()
	{
		$this->load->model('model_transaksi');
		$is_processed = $this->model_transaksi->index();

		if ($is_processed) {
			$this->cart->destroy();
			$data['title'] = 'Pemberitahuan';
			$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
			$data['transaksi'] = $this->db->get('transaksi')->row_array();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('member/detail_transaksi');
		} else {
			echo ("Pesanan Anda Gagal Diproses");
		}
	}

	function invoice()
	{
		$this->load->model('model_bank');
		$is_processed = $this->model_bank->index();

		if ($is_processed) {
			$data['title'] = 'Pemberitahuan';
			$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('member/invoice');
		} else {
			echo ("Pesanan Anda Gagal Diproses");
		}
	}

	public function detail($id_brg)
	{
		$data['title'] = 'Toko Jam Surya';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['barang'] = $this->model_barang->detail_barang($id_brg);

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('member/detailuser', $data);
	}

	public function profil()
	{
		$data['title'] = 'My Profil';
		$this->load->view('templates/auth_header', $data);
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('auth/profil', $data);
	}

	public function change()
	{
		$data['title'] = 'Change Password';
		$this->load->view('templates/auth_header', $data);
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'current password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'new password', 'required|trim|min_length[8]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'new password', 'required|trim|min_length[8]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/change', $data);
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['login']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Wrong Current Password </div>');
				redirect('pengguna/change');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			New Password Cannot be the same as Current Password </div>');
					redirect('pengguna/change');
				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('login');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Your Password Changed! </div>');
					redirect('pengguna/change');
				}
			}
		}
	}


	public function edit()
	{
		$data['title'] = 'Edit Profil';
		$this->load->view('templates/auth_header', $data);
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'FirstName', 'required|trim');
		$this->form_validation->set_rules('nama_belakang', 'LastName', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/edit', $data);
		} else {
			$nama = $this->input->post('nama');
			$nama_belakang = $this->input->post('nama_belakang');
			$email = $this->input->post('email');

			$upload = $_FILES['image'];
			if ($upload) {
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profil';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old = $data['login']['image'];
					if ($old != 'defaul.jpg') {
						unlink(FCPATH . 'assets/img/profil/' . $old);
					}
					$new = $this->upload->data('file_name');
					$this->db->set('image', $new);
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					redirect('pengguna/profil');
				}
			}

			$this->db->set('nama', $nama);
			$this->db->set('nama_belakang', $nama_belakang);
			$this->db->where('email', $email);
			$this->db->update('login');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Your Profile has been Updated </div>');
			redirect('pengguna/profil');
		}
	}
}
