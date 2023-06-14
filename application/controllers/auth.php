<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->login_();
		}
	}

	private function login_()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$login = $this->db->get_where('login', ['email' => $email])->row_array();

		if ($login) {
			if ($login['is_active'] == 1) {
				if (password_verify($password, $login['password'])) {
					$data = [
						'email' => $login['email'],
						'role_id' => $login['role_id']
					];
					$this->session->set_userdata($data);
					if ($login['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('pengguna');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Wrong password </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			This email not has been activated </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not Registered </div>');
			redirect('auth');
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('nama1', 'FirstName', 'required|trim');
		$this->form_validation->set_rules('nama2', 'LastName', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[login.email]', [
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password To Short! (8 Character)'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registrasi');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama1', true)),
				'nama_belakang' => htmlspecialchars($this->input->post('nama2', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'image' => 'defaul.jpg',
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('login', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation! your account has been created. Please Login </div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			you have been logged out </div>');
		redirect('auth');
	}
}