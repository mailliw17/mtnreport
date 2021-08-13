<?php

class M_supervisor extends CI_Model
{
    public function getAllPekerjaan($grup)
    {
        return $this->db->query("SELECT * FROM work_order WHERE grup = '$grup' AND wo_status = 1")->result_array();
    }

    public function terimaPekerjaan($id_work_order, $nama)
    {
        $this->db->query("UPDATE work_order SET approved_by = '$nama', wo_status = 2 WHERE id_work_order = '$id_work_order'");

        $this->db->query("INSERT INTO detail_work_order (id_work_order, approved_order) VALUES ('$id_work_order', CURRENT_TIMESTAMP )");
    }

    public function tolakPekerjaan($id_work_order, $nama)
    {
        $this->db->query("UPDATE work_order SET approved_by = '$nama', wo_status = 3 WHERE id_work_order = '$id_work_order'");
    }

    public function getAllPekerjaanOngoing($grup)
    {
        return $this->db->query("SELECT * FROM work_order WHERE grup ='$grup' AND wo_status = 2")->result_array();
    }

    public function getAllPekerjaanSelesai($grup)
    {
        return $this->db->query("SELECT * FROM work_order WHERE grup ='$grup' AND wo_status = 5")->result_array();
    }

    public function pekerjaanSelesai($id_work_order, $nama)
    {
        $this->db->query("UPDATE work_order SET approved_by = '$nama', wo_status = 6 WHERE id_work_order = '$id_work_order'");

        $this->db->query("UPDATE detail_work_order SET approved_work = CURRENT_TIMESTAMP WHERE id_work_order = '$id_work_order'");
    }

    public function getAllPekerjaanFinish($grup)
    {
        return $this->db->query("SELECT detail_work_order.id_work_order, detail_work_order.approved_work as finish, work_order.id_work_order, work_order.grup, work_order.area, work_order.permasalahan , work_order.request_by, work_order.approved_by, work_order.wo_status FROM work_order INNER JOIN detail_work_order ON  work_order.id_work_order = detail_work_order.id_work_order WHERE grup ='$grup' AND wo_status = 6")->result_array();
    }
}
