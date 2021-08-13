<?php

class M_teknisi extends CI_Model
{
    public function getArea()
    {
        return $this->db->query("SELECT * FROM AREA")->result();
    }

    public function kirimlaporan($data)
    {
        $this->db->insert('laporan', $data);
    }

    public function laporankerja()
    {
        return $this->db->query("SELECT * FROM laporan ORDER BY tanggal DESC")->result_array();
    }

    public function getNamaTeknisi()
    {
        return $this->db->query("SELECT * FROM users WHERE role = 'Teknisi' ORDER BY nama ASC")->result_array();
    }

    public function carilaporan($keyword)
    {
        return $this->db->query("SELECT * FROM laporan WHERE 
        grup LIKE '%$keyword%' OR
        area LIKE '%$keyword%' OR
        pekerjaan LIKE '%$keyword%' OR
        analisis LIKE '%$keyword%' OR
        sparepart LIKE '%$keyword%' OR
        nama_teknisi LIKE '%$keyword%' OR
        made_by LIKE '%$keyword%' OR
        status LIKE '%$keyword%' ORDER BY tanggal DESC")->result_array();
    }

    public function getAllPekerjaan()
    {
        return $this->db->query("SELECT * FROM work_order WHERE wo_status = 2 ORDER BY waktu DESC")->result_array();
    }
}
