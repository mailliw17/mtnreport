<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('login') != true) || ($this->session->userdata('role') == 'Teknisi')) {
			$this->session->set_flashdata('penyusup', 'warning');
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('M_admin');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['laporan'] = $this->M_admin->getAllLaporan();
		$data['hitung'] = $this->M_admin->hitungPermasalahan();
		// $data['laporanmodal'] = $this->M_admin->getAllLaporanModal();
		$judul['page_title'] = 'Dashboard Admin';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_dashboard_admin', $data);
		$this->load->view('templates/footer');
	}

	public function mechanical()
	{
		$data['laporan'] = $this->M_admin->getAllLaporan_Mechanical();
		$judul['page_title'] = 'Grup Mechanical';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_dashboard_admin_mechanicals', $data);
		$this->load->view('templates/footer');
	}

	public function civil()
	{
		$data['laporan'] = $this->M_admin->getAllLaporan_Civil();
		$judul['page_title'] = 'Grup Civil';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_dashboard_admin_civil', $data);
		$this->load->view('templates/footer');
	}

	public function automation()
	{
		$data['laporan'] = $this->M_admin->getAllLaporan_Automation();
		$judul['page_title'] = 'Grup Automation';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_dashboard_admin_automation', $data);
		$this->load->view('templates/footer');
	}

	public function electrical()
	{
		$data['laporan'] = $this->M_admin->getAllLaporan_Electrical();
		$judul['page_title'] = 'Grup Electrical';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_dashboard_admin_electrical', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id_laporan)
	{
		$data['detail'] = $this->M_admin->getDetail($id_laporan);
		$judul['page_title'] = 'Detail Pekerjaan';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_detail', $data);
		$this->load->view('templates/footer');
	}

	public function tambaharea()
	{
		$data['area'] = $this->M_admin->tampilarea();

		$judul['page_title'] = 'Tambah Area';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_tambah_area', $data);
		$this->load->view('templates/footer');
	}

	public function store_tambaharea()
	{
		$this->form_validation->set_rules(
			'area_baru',
			'Area_baru',
			'trim|required|is_unique[area.area]',
			array(
				'is_unique' => 'Area sudah terdaftar'
			)
		);

		// kalau form validation false, langsung kirim tampilarea() lagi
		$data['area'] = $this->M_admin->tampilarea();
		if ($this->form_validation->run() == false) {
			$judul['page_title'] = 'Data Barang';
			$this->load->view('templates/header', $judul);
			$this->load->view('V_tambah_area', $data);
			$this->load->view('templates/footer');
		} else {

			$data = [
				"area" => $this->input->post('area_baru', true),
			];

			$this->M_admin->tambaharea($data);

			//pindah ke halaman landingpage
			$this->session->set_flashdata('area_baru', 'oke');
			redirect('admin/tambaharea');
		}
	}

	public function hapusarea($id_area)
	{
		$this->M_admin->hapusarea($id_area);

		$this->session->set_flashdata('berhasil-hapus-area', 'oke');
		redirect('admin/tambaharea');
	}

	public function hapuslaporan($id_laporan)
	{
		$this->M_admin->hapuslaporan($id_laporan);


		$this->session->set_flashdata('berhasil-hapus', 'oke');
		redirect('admin');
	}

	public function editlaporan($id_laporan)
	{
		$data['laporan'] = $this->M_admin->ambildatalaporan($id_laporan);

		$this->form_validation->set_rules(
			'nama_teknisi',
			'Nama_teknisi',
			'trim|required'
		);

		if ($this->form_validation->run() == false) {
			//load tampilannya
			$judul['page_title'] = 'Ganti password';
			$this->load->view('templates/header', $judul);
			$this->load->view('V_edit_laporan_teknisi', $data);
			$this->load->view('templates/footer');
		} else {
			$this->M_admin->editlaporan();

			$this->session->set_flashdata('berhasil-edit', 'oke');
			redirect('admin');
		}
	}

	public function request()
	{
		$data['permasalahan'] = $this->M_admin->getAllPekerjaan();
		$judul['page_title'] = 'Request Pekerjaan';
		$this->load->view('templates/header_teknisi', $judul);
		$this->load->view('V_request_pekerjaan', $data);
		$this->load->view('templates/footer');
	}

	public function sortingrequest()
	{
		if ($this->input->get('keyword') !== FALSE) {
			$data['permasalahan'] = $this->M_admin->carirequest($this->input->get('keyword'));
		} else {
			$data['permasalahan'] = array();
		}
		$data['grup_apa'] = $this->input->get('keyword');

		$judul['page_title'] = 'Hasil Pencarian';
		$this->load->view('templates/header_teknisi', $judul);
		$this->load->view('V_request_pekerjaan_sorting', $data);
		$this->load->view('templates/footer');
	}

	public function terima($id_work_order)
	{
		$this->M_admin->selesaikanPekerjaan($id_work_order);

		$this->session->set_flashdata('berhasil', 'ok');
		redirect('admin/request');
	}

	// public function tolak($id_work_order)
	// {
	// 	$this->M_admin->tolakPekerjaan($id_work_order);

	// 	$this->session->set_flashdata('tolak', 'ok');
	// 	redirect('admin/request');
	// }

	public function tolak($id_work_order)
	{
		$data['permasalahan'] = $this->M_admin->ambildatapermasalahan($id_work_order);

		$this->form_validation->set_rules(
			'alasan',
			'Alasan',
			'trim|required'
		);

		if ($this->form_validation->run() == false) {
			//load tampilannya
			$judul['page_title'] = 'Alasan Penolakan';
			$this->load->view('templates/header_teknisi', $judul);
			$this->load->view('V_admin_alasan_tolak', $data);
			$this->load->view('templates/footer');
		} else {

			$alasan = $this->input->post('alasan', true);
			$this->M_admin->tolakPekerjaan($id_work_order, $alasan);
			$this->session->set_flashdata('tolak', 'ok');
			redirect('admin/request');
		}
	}

	public function edit($id)
	{
		$data['permasalahan'] = $this->M_supervisor->ambildatapermasalahan($id);

		$this->form_validation->set_rules(
			'permasalahan',
			'Permasalahan',
			'trim|required'
		);

		if ($this->form_validation->run() == false) {
			//load tampilannya
			$judul['page_title'] = 'Ganti password';
			$this->load->view('templates/header_teknisi', $judul);
			$this->load->view('V_admin_edit_permasalahan', $data);
			$this->load->view('templates/footer');
		} else {

			$this->M_admin->editpermasalahan();
			$this->session->set_flashdata('berhasil_edit', 'ok');
			redirect('admin/request');
		}
	}
}
