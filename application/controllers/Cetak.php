<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('login') != true) || ($this->session->userdata('role') == 'Teknisi')) {
			$this->session->set_flashdata('penyusup', 'warning');
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('M_cetak');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['laporan'] = $this->M_admin->getAllLaporan();
		// $data['laporanmodal'] = $this->M_admin->getAllLaporanModal();
		$judul['page_title'] = 'Cetak Laporan';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_dashboard_cetak', $data);
		$this->load->view('templates/footer');
	}

	public function pilih($id_laporan)
	{
		$data['cetak'] = $this->M_cetak->getDataCetak($id_laporan);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-kerja-maintenance.pdf";
		$this->pdf->load_view('V_cetak_pdf', $data);
	}
}
