<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_auth');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');

		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		//validasi login
		if ($this->form_validation->run() == false) {
			$judul['page_title'] = 'Halaman Login';
			$this->load->view('templates/header_login', $judul);
			$this->load->view('V_login');
			$this->load->view('templates/footer');
		} else {
			//kalau berhasil login
			$this->_login();
		}
	}

	private function _login()
	{
		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('password'));

		$cek_user = $this->M_auth->auth_user($username, $password);

		if ($cek_user->num_rows() != 0) {
			$data = $cek_user->row_array();
			$nama = $data['nama'];
			$username = $data['username'];
			$role = $data['role'];
			$this->session->set_userdata('nama', $nama);
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('role', $role);
			$this->session->set_userdata('login', TRUE);
			if ($role == 'Admin') {
				redirect('admin');
			} else {
				redirect('teknisi');
			}
		} else {
			$this->session->set_flashdata('gagal_login', 'warning');
			redirect('auth');
		}
	}

	public function logout()
	{
		//bersihkan session dan kembalikan ke halaman login
		$this->session->sess_destroy();

		//pindah ke halaman landingpage
		$this->session->set_flashdata('logout', 'success');
		redirect('auth');
	}

	public function kelolaakun()
	{
		$data['akun'] = $this->M_auth->getAllAccount();
		$judul['page_title'] = 'Kelola Akun';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_kelola_akun', $data);
		$this->load->view('templates/footer');
	}

	public function register()
	{
		$this->form_validation->set_rules(
			'username',
			'Username',
			'trim|required|is_unique[users.username]',
			array(
				'is_unique' => 'Pembuatan Akun Gagal karena username sudah terdaftar'
			)
		);

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
			'matches' => 'Password tidak sama dengan kolom di bawah'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
			'matches' => 'Password tidak sama  dengan kolom di atas'
		]);

		if ($this->form_validation->run() == false) {
			$judul['page_title'] = 'Register Akun';
			$this->load->view('templates/header', $judul);
			$this->load->view('V_register_akun');
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => md5($this->input->post('password1', true)),
				'role' => htmlspecialchars($this->input->post('role', true)),
				'grup' => htmlspecialchars($this->input->post('grup', true))
			];

			//insert ke database
			$this->M_auth->register($data);


			//pindah ke halaman landingpage
			$this->session->set_flashdata('register_berhasil', 'oke');
			redirect('auth/kelolaakun');
		}
	}

	public function hapusakun($id)
	{
		$this->M_auth->hapusakun($id);

		//pindah ke halaman landingpage
		$this->session->set_flashdata('hapus_akun_berhasil', 'oke');
		redirect('auth/kelolaakun');
	}

	public function gantipassword($id)
	{
		$info['akun'] = $this->M_auth->getAccInfo($id);

		$this->form_validation->set_rules('passwordBaru1', 'Password Baru', 'required|trim|matches[passwordBaru2]', [
			'matches' => 'Password tidak sama dengan kolom di bawah'
		]);

		$this->form_validation->set_rules('passwordBaru2', 'Confirm Password', 'required|trim|matches[passwordBaru1]', [
			'matches' => 'Password tidak sama dengan kolom di atas'
		]);

		if ($this->form_validation->run() == false) {
			//load tampilannya
			$judul['page_title'] = 'Ganti password';
			$this->load->view('templates/header', $judul);
			$this->load->view('V_lupa_password_teknisi', $info);
			$this->load->view('templates/footer');
		} else {
			//password sudah oke

			$this->M_auth->gantipassword($id);

			$this->session->set_flashdata('ganti_password_berhasil', 'oke');
			redirect('auth/kelolaakun');
		}
	}
}
