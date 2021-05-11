<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('login') != true) || ($this->session->userdata('role') == 'Teknisi')) {
			$this->session->set_flashdata('penyusup', 'warning');
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('M_laporan');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		// $data['laporan'] = $this->M_admin->getAllLaporan();
		$judul['page_title'] = 'Download Laporan';
		$this->load->view('templates/header', $judul);
		$this->load->view('V_download');
		$this->load->view('templates/footer');
	}

	public function download()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Tanggal');
		$sheet->setCellValue('C1', 'Type WO');
		$sheet->setCellValue('D1', 'Grup');
		$sheet->setCellValue('E1', 'Area');
		$sheet->setCellValue('F1', 'Pekerjaan');
		$sheet->setCellValue('G1', 'Analisis');
		$sheet->setCellValue('H1', 'Sparepart');
		$sheet->setCellValue('I1', 'Mulai');
		$sheet->setCellValue('J1', 'Selesai');
		$sheet->setCellValue('K1', 'Durasi');
		$sheet->setCellValue('L1', 'Shift');
		$sheet->setCellValue('M1', 'Teknisi');
		$sheet->setCellValue('N1', 'Total Person');
		$sheet->setCellValue('O1', 'Dilaporkan');
		$sheet->setCellValue('P1', 'Status');

		$laporan = $this->M_laporan->downloadLaporanFilterTanggal();
		$no = 1;
		$x = 2;
		foreach ($laporan as $row) {
			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $row->tanggal);
			$sheet->setCellValue('C' . $x, $row->type_wo);
			$sheet->setCellValue('D' . $x, $row->grup);
			$sheet->setCellValue('E' . $x, $row->area);
			$sheet->setCellValue('F' . $x, $row->pekerjaan);
			$sheet->setCellValue('G' . $x, $row->analisis);
			$sheet->setCellValue('H' . $x, $row->sparepart);
			$sheet->setCellValue('I' . $x, $row->jam_mulai);
			$sheet->setCellValue('J' . $x, $row->jam_selesai);
			$sheet->setCellValue('K' . $x, $row->durasi);
			$sheet->setCellValue('L' . $x, $row->shift);
			$sheet->setCellValue('M' . $x, $row->nama_teknisi);
			$sheet->setCellValue('N' . $x, $row->total_person);
			$sheet->setCellValue('O' . $x, $row->made_by);
			$sheet->setCellValue('P' . $x, $row->status);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-maintenance';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
