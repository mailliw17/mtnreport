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
		$data['hitung_ongoing'] = $this->M_supervisor->hitung_ongoing($grup);
		$data['hitung_selesai'] = $this->M_supervisor->hitung_selesai($grup);
		$data['hitung_ditolak'] = $this->M_supervisor->hitung_ditolak($grup);
		// $data['hitung_ditolak'] = $this->M_supervisor->hitung_ditolak($grup);

		$judul['page_title'] = 'Supervisor / Manager';
		$this->load->view('templates/header_teknisi', $judul);
		$this->load->view('V_landingpage_spv', $data);
		$this->load->view('templates/footer');
	}

	public function lapor_permasalahan()
	{
		$judul['page_title'] = 'Lapor Permasalahan';
		$this->load->view('templates/header_teknisi', $judul);
		$this->load->view('V_lapor_spv');
		$this->load->view('templates/footer');
	}

	public function kirimlaporan()
	{
		// untuk foto
		$photo = $_FILES['photo'];
		if ($photo = '') {
		} else {
			$config['upload_path'] = './uploads/work_order';
			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('photo')) {
				echo "Upload Gagal, silahkan upload file berupa gambar...";
				die();
			} else {
				$photo = $this->upload->data('file_name');
			}
		}

		$data = [
			"id_work_order" => $this->input->post('id_work_order', true),
			"waktu" => $this->input->post('waktu', true),
			"grup" => $this->input->post('grup', true),
			"area" => $this->input->post('area', true),
			"permasalahan" => $this->input->post('permasalahan', true),
			"bagian_teknisi" => $this->input->post('bagian_teknisi', true),
			"request_by" => $this->input->post('request_by', true),
			"approved_by" => $this->input->post('approved_by', true),
			"wo_status" => 2,
			"photo" => $photo
		];

		// kirim data array ke model
		$this->M_karyawan->kirimlaporan($data);

		//pindah ke halaman landingpage
		$this->session->set_flashdata('berhasil', 'ok');
		redirect('supervisor/pekerjaan_ongoing');
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
			$this->load->view('V_landingpage_karyawan_edit', $data);
			$this->load->view('templates/footer');
		} else {

			$this->M_supervisor->editpermasalahan();
			$this->session->set_flashdata('berhasil_edit', 'ok');
			redirect('supervisor');
		}
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

	public function pekerjaan_ditolak()
	{
		$grup = $this->session->userdata('grup');
		$data['ditolak'] = $this->M_supervisor->getAllPekerjaanDitolak($grup);
		$judul['page_title'] = 'Supervisor / Manager';
		$this->load->view('templates/header_teknisi', $judul);
		$this->load->view('V_pekerjaan_ditolak', $data);
		$this->load->view('templates/footer');
	}
}
