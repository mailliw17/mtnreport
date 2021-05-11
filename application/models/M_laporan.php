<?php

class M_laporan extends CI_Model
{
    public function downloadLaporanFilterTanggal()
    {
        $tanggal = explode(" - ", $this->input->post('range_tanggal', true));
        $start = date('Y-m-d', strtotime($tanggal[0]));
        $end = date('Y-m-d', strtotime($tanggal[1]));

        return $this->db->query("SELECT * FROM laporan WHERE tanggal BETWEEN '$start' AND '$end'")->result();
    }
}
