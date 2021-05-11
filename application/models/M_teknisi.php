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
        return $this->db->query("SELECT * FROM laporan ORDER BY id_laporan DESC")->result_array();
    }

    public function getNamaTeknisi()
    {
        return $this->db->query("SELECT * FROM users WHERE role = 'Teknisi' ORDER BY nama ASC")->result_array();
    }
}
