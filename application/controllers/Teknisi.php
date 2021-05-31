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
		$data['nama_teknisi'] = $this->M_teknisi->getNamaTeknisi();
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
		// olah data array dari view
		$nama_teknisi = $this->input->post('nama_teknisi[]', true);
		$hasil_nama_teknisi = implode(", ", $nama_teknisi);

		$total_person   = explode(", ", $hasil_nama_teknisi);
		$hasil_total_person  = count($total_person);

		$jam_mulai = $this->input->post('jam_mulai', true);
		$jam_mulai_ok = date("H:i:s", strtotime($jam_mulai));

		$jam_selesai = $this->input->post('jam_selesai', true);
		$jam_selesai_ok = date("H:i:s", strtotime($jam_selesai));

		// array data utk kirim ke model
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
			"total_person" => $hasil_total_person,
			"nama_teknisi" => $hasil_nama_teknisi,
			"made_by" => $this->input->post('made_by', true),
			"status" => $this->input->post('status', true),
		];

		// kirim data array ke model
		$this->M_teknisi->kirimlaporan($data);

		// $dino ambil tanggal terbaru trigger dari tbl laporan (FITUR INI MASIH BUG)
		$dino = $this->M_tracking->ambilTanggal();
		$hasil_dino = strtotime($dino['updated_at']);

		// $temendino itu ambil tanggal hari ini
		$temendino = date("Y-m-d");
		$hasil_temendino = strtotime($temendino);

		// $ligamen itu tanggal sekarang - tanggal terbaru trigger dari tbl laporan
		$ligamen = $hasil_temendino - $hasil_dino;

		// $ligamen itu timestamp, lalu dibagi 3600 detik dan di bagi 24 jam
		$ligamen = $ligamen / 3600 / 24;

		// kalau udh ada trigger hari baru, langsung reset semua value ke null
		if ($ligamen >= 1)
			$this->M_tracking->resetIsDone();

		// set 1 ke yang udh lapor hari terbaru dengan tanggal terbaru 
		$this->M_tracking->updatesudahlapor($nama_teknisi);

		//pindah ke halaman landingpage
		$this->session->set_flashdata('berhasil', 'ok');
		redirect('teknisi');
	}
}
