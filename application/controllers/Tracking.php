<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('login') != true) || ($this->session->userdata('role') == 'Teknisi')) {
			$this->session->set_flashdata('penyusup', 'warning');
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('M_tracking');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['belumlapor'] = $this->M_tracking->cek();
		$judul['page_title'] = 'Tracking Teknisi';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_tracking', $data);
		$this->load->view('templates/footer');
	}

	public function updatesudahlapor($nama_teknisi)
	{
		$tokped = count($nama_teknisi);

		for ($i = 0; $i < $tokped; $i++) {
			$this->db->query("UPDATE users SET is_lapor = 1, updated_at = 'CURDATE()' WHERE nama = '$nama_teknisi[$i]'");
		}
	}
}
