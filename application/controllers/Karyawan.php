<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('login') != true)) {
			$this->session->set_flashdata('penyusup', 'warning');
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('M_karyawan');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$judul['page_title'] = 'Karyawan';
		$this->load->view('templates/header_teknisi', $judul);
		$this->load->view('V_landingpage_karyawan');
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
			"request_by" => $this->input->post('request_by', true),
			"bagian_teknisi" => $this->input->post('bagian_teknisi', true),
			"wo_status" => 1,
			"photo" => $photo
		];

		// kirim data array ke model
		$this->M_karyawan->kirimlaporan($data);

		//pindah ke halaman landingpage
		$this->session->set_flashdata('berhasil', 'ok');
		redirect('karyawan');
	}
}
