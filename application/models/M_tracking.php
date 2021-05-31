<?php

class M_tracking extends CI_Model
{
    public function cek()
    {
        // $tanggal = explode(" - ", $this->input->post('range_tanggal', true));
        // $start = date('Y-m-d', strtotime($tanggal[0]));
        // $end = date('Y-m-d', strtotime($tanggal[1]));

        return $this->db->query("SELECT nama, grup FROM users WHERE role = 'Teknisi' AND is_lapor = 0 ORDER BY nama ASC")->result_array();

        // cek anggota yang sudah melapor berdasarkan input tanggal
        // $anggotamelapor = $this->db->query("SELECT nama_teknisi, grup FROM laporan WHERE tanggal BETWEEN '$start' AND '$end'")->result_array();
    }

    public function resetIsDone()
    {
        $this->db->query("UPDATE users SET is_lapor = 0, updated_at = NULL");
    }

    public function ambilTanggal()
    {
        return $this->db->query("SELECT updated_at FROM users WHERE is_lapor = 1")->row_array();
    }

    public function updatesudahlapor($nama_teknisi)
    {
        $tokped = count($nama_teknisi);

        for ($i = 0; $i < $tokped; $i++) {
            $this->db->query("UPDATE users SET is_lapor = 1, updated_at = CURDATE() WHERE nama = '$nama_teknisi[$i]'");
        }
    }
}
