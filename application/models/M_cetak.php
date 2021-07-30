<?php

class M_cetak extends CI_Model
{
    public function getDataCetak($id_laporan)
    {
        return $this->db->query("SELECT * FROM laporan WHERE id_laporan = '$id_laporan'")->row_array();
    }
}
