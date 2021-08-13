<?php

class M_karyawan extends CI_Model
{
    public function kirimlaporan($data)
    {
        $this->db->insert('work_order', $data);
    }
}
