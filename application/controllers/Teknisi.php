<?php
defined('BASEPATH') or exit('No direct script access allowed');

class teknisi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_teknisi');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$judul['page_title'] = 'Teknisi';
		$this->load->view('templates/header_teknisi', $judul);
		$this->load->view('V_landingpage_teknisi');
		$this->load->view('templates/footer');
	}

	public function laporan()
	{
		// kirim datalist ke lapor-teknisi
		$data['area'] = $this->M_teknisi->getArea();
		$judul['page_title'] = 'Laporan';
		$this->load->view('templates/header_teknisi', $judul);
		$this->load->view('V_lapor_teknisi', $data);
		$this->load->view('templates/footer');
	}

	public function lihatlaporan()
	{
		// untuk teknisi melihat laporan kerja
		$data['laporan'] = $this->M_teknisi->laporankerja();
		$judul['page_title'] = 'Lihat Laporan';
		$this->load->view('templates/header_teknisi', $judul);
		$this->load->view('V_lihat_laporan_teknisi', $data);
		$this->load->view('templates/footer');
	}

	public function kirimlaporan()
	{
		$jam_mulai = $this->input->post('jam_mulai', true);
		$jam_mulai_ok = date("H:i:s", strtotime($jam_mulai));

		$jam_selesai = $this->input->post('jam_selesai', true);
		$jam_selesai_ok = date("H:i:s", strtotime($jam_selesai));

		$data = [
			"shift" => $this->input->post('shift', true),
			"tanggal" => $this->input->post('tanggal', true),
			"type_wo" => $this->input->post('type_wo', true),
			"grup" => $this->input->post('group', true),
			"area" => $this->input->post('area', true),
			"pekerjaan" => $this->input->post('pekerjaan', true),
			"analisis" => $this->input->post('analisis', true),
			"sparepart" => $this->input->post('sparepart', true),
			"jam_mulai" => $jam_mulai_ok,
			"jam_selesai" => $jam_selesai_ok,
			"durasi" => $this->input->post('durasi', true),
			"total_person" => $this->input->post('total_person', true),
			"nama_teknisi" => $this->input->post('nama_teknisi', true),
			"status" => $this->input->post('status', true),

		];

		$this->M_teknisi->kirimlaporan($data);

		//pindah ke halaman landingpage
		$this->session->set_flashdata('berhasil', 'ok');
		redirect('teknisi');
	}
}
