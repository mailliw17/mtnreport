<?php

class M_admin extends CI_Model
{
    public function getAllLaporan()
    {
        return $this->db->query("SELECT * FROM laporan ORDER BY tanggal DESC")->result_array();
    }

    // public function getAllLaporanModal()
    // {
    //     return $this->db->query("SELECT * FROM laporan")->result_array();
    // }

    public function getAllLaporan_Mechanical()
    {
        return $this->db->query("SELECT * FROM laporan WHERE grup='Mechanical' ORDER BY tanggal DESC")->result_array();
    }

    public function getAllLaporan_Civil()
    {
        return $this->db->query("SELECT * FROM laporan WHERE grup='Civil' ORDER BY tanggal DESC")->result_array();
    }

    public function getAllLaporan_Automation()
    {
        return $this->db->query("SELECT * FROM laporan WHERE grup='Automation' ORDER BY tanggal DESC")->result_array();
    }

    public function getAllLaporan_Electrical()
    {
        return $this->db->query("SELECT * FROM laporan WHERE grup='Electrical' ORDER BY tanggal DESC")->result_array();
    }

    public function getDetail($id_laporan)
    {
        return $this->db->query("SELECT * FROM laporan WHERE id_laporan = '$id_laporan'")->result_array();
    }

    public function tambaharea($data)
    {
        $this->db->insert('area', $data);
    }

    public function hapuslaporan($id_laporan)
    {
        $this->db->query("DELETE FROM laporan WHERE id_laporan = '$id_laporan'");
    }
}
