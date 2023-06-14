<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kategori extends CI_Controller
{

	function pria()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['pria'] = $this->model_kategori->data_pria()->result();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('guest/pria', $data);
	}

	function wanita()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['wanita'] = $this->model_kategori->data_wanita()->result();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('guest/wanita', $data);
	}

	function unisex()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['unisex'] = $this->model_kategori->data_unisex()->result();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('guest/unisex', $data);
	}

	function aksessoris()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['aksessoris'] = $this->model_kategori->data_aksessoris()->result();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('guest/aksessoris', $data);
	}

	function mesin()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['mesin'] = $this->model_kategori->data_mesin()->result();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('guest/mesinjam', $data);
	}

	function dinding()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['dinding'] = $this->model_kategori->data_dinding()->result();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('guest/jamdinding', $data);
	}

	function pria_user()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['pria'] = $this->model_kategori->data_pria()->result();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('member/pria_user', $data);
	}

	function wanita_user()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['wanita'] = $this->model_kategori->data_wanita()->result();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('member/wanita_user', $data);
	}

	function unisex_user()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['unisex'] = $this->model_kategori->data_unisex()->result();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('member/unisex_user', $data);
	}

	function aksessoris_user()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['aksessoris'] = $this->model_kategori->data_aksessoris()->result();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('member/aksessoris_user', $data);
	}

	function mesin_user()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['mesin'] = $this->model_kategori->data_mesin()->result();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('member/mesinjam_user', $data);
	}

	function dinding_user()
	{
		$data['title'] = 'Toko Jam Surya';
		$data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
		$data['dinding'] = $this->model_kategori->data_dinding()->result();

		$this->load->view('templates/auth_header', $data);
		$this->load->view('templates/auth_footer', $data);
		$this->load->view('member/jamdinding_user', $data);
	}
}
