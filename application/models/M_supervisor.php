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

    public function hitung_ongoing($grup)
    {
        return $this->db->query("SELECT * FROM work_order WHERE grup ='$grup' AND wo_status = 2")->num_rows();
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
        return $this->db->query("SELECT detail_work_order.id_work_order, detail_work_order.approved_order as mulai, detail_work_order.execution as eksekusi, detail_work_order.approved_work as acc, work_order.id_work_order, work_order.grup, work_order.area, work_order.permasalahan , work_order.request_by, work_order.approved_by, work_order.wo_status FROM work_order INNER JOIN detail_work_order ON  work_order.id_work_order = detail_work_order.id_work_order WHERE grup ='$grup' AND wo_status = 6")->result_array();
    }

    public function hitung_selesai($grup)
    {
        return $this->db->query("SELECT detail_work_order.id_work_order, detail_work_order.approved_work as finish, work_order.id_work_order, work_order.grup, work_order.area, work_order.permasalahan , work_order.request_by, work_order.approved_by, work_order.wo_status FROM work_order INNER JOIN detail_work_order ON  work_order.id_work_order = detail_work_order.id_work_order WHERE grup ='$grup' AND wo_status = 6")->num_rows();
    }

    public function ambildatapermasalahan($id)
    {
        return $this->db->query("SELECT * FROM work_order WHERE id_work_order = '$id'")->row_array();
    }

    public function editpermasalahan()
    {
        $data = [
            "id_work_order" => $this->input->post('id_work_order', true),
            "waktu" => $this->input->post('waktu', true),
            "grup" => $this->input->post('grup', true),
            "area" => $this->input->post('area', true),
            "permasalahan" => $this->input->post('permasalahan', true),
            "bagian_teknisi" => $this->input->post('bagian_teknisi', true),
            "request_by" => $this->input->post('request_by', true),
            "approved_by" => $this->input->post('approved_by', true),
            "wo_status" => 1,
        ];

        $this->db->where('id_work_order', $this->input->post('id_work_order'));
        $this->db->update('work_order', $data);
    }

    public function getAllPekerjaanDitolak($grup)
    {
        return $this->db->query("SELECT work_order.id_work_order, work_order.grup, work_order.area, work_order.permasalahan, work_order.bagian_teknisi, work_order_ditolak.alasan FROM work_order INNER JOIN work_order_ditolak ON work_order.id_work_order = work_order_ditolak.id_work_order WHERE grup ='$grup' AND wo_status = 4")->result_array();
    }

    public function hitung_ditolak($grup)
    {
        return $this->db->query("SELECT * FROM work_order WHERE grup ='$grup' AND wo_status = 4")->num_rows();
    }
}
