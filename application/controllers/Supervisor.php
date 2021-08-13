<?php
defined('BASEPATH') or exit('No direct script access allowed');

class supervisor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('login') != true)) {
			$this->session->set_flashdata('penyusup', 'warning');
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('M_supervisor');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$grup = $this->session->userdata('grup');
		$data['permasalahan'] = $this->M_supervisor->getAllPekerjaan($grup);

		$judul['page_title'] = 'Supervisor / Manager';
		$this->load->view('templates/header_teknisi', $judul);
		$this->load->view('V_landingpage_spv', $data);
		$this->load->view('templates/footer');
	}

	public function terima($id_work_order)
	{
		$nama = $this->session->userdata('nama');
		$this->M_supervisor->terimaPekerjaan($id_work_order, $nama);

		$this->session->set_flashdata('berhasil', 'ok');
		redirect('supervisor');
	}

	public function tolak($id_work_order)
	{
		$nama = $this->session->userdata('nama');
		$this->M_supervisor->tolakPekerjaan($id_work_order, $nama);

		$this->session->set_flashdata('tolak', 'ok');
		redirect('supervisor');
	}

	public function pekerjaan_ongoing()
	{
		$grup = $this->session->userdata('grup');
		$data['permasalahan'] = $this->M_supervisor->getAllPekerjaanOngoing($grup);
		$data['selesai'] = $this->M_supervisor->getAllPekerjaanSelesai($grup);
		$judul['page_title'] = 'Supervisor / Manager';
		$this->load->view('templates/header_teknisi', $judul);
		$this->load->view('V_pekerjaan_ongoing_spv', $data);
		$this->load->view('templates/footer');
	}

	public function konfirmasiselesai($id_work_order)
	{
		$nama = $this->session->userdata('nama');
		$this->M_supervisor->pekerjaanSelesai($id_work_order, $nama);

		$this->session->set_flashdata('pekerjaan-selesai', 'ok');
		redirect('supervisor/pekerjaan_selesai');
	}

	public function pekerjaan_selesai()
	{
		$grup = $this->session->userdata('grup');
		$data['selesai'] = $this->M_supervisor->getAllPekerjaanFinish($grup);
		$judul['page_title'] = 'Supervisor / Manager';
		$this->load->view('templates/header_teknisi', $judul);
		$this->load->view('V_pekerjaan_finish_spv', $data);
		$this->load->view('templates/footer');
	}
}
