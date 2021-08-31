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
        return $this->db->query("SELECT * FROM laporan WHERE grup='Mechanical' ORDER BY id_laporan DESC")->result_array();
    }

    public function getAllLaporan_Civil()
    {
        return $this->db->query("SELECT * FROM laporan WHERE grup='Civil' ORDER BY id_laporan DESC")->result_array();
    }

    public function getAllLaporan_Automation()
    {
        return $this->db->query("SELECT * FROM laporan WHERE grup='Automation' ORDER BY id_laporan DESC")->result_array();
    }

    public function getAllLaporan_Electrical()
    {
        return $this->db->query("SELECT * FROM laporan WHERE grup='Electrical' ORDER BY id_laporan DESC")->result_array();
    }

    public function getDetail($id_laporan)
    {
        return $this->db->query("SELECT * FROM laporan WHERE id_laporan = '$id_laporan'")->result_array();
    }

    public function tambaharea($data)
    {
        $this->db->insert('area', $data);
    }

    public function tampilarea()
    {
        return $this->db->query("SELECT * FROM area ORDER BY area ASC")->result_array();
    }

    public function hapusarea($id_area)
    {
        $this->db->query("DELETE FROM area WHERE id_area = '$id_area'");
    }

    public function hapuslaporan($id_laporan)
    {
        $this->db->query("DELETE FROM laporan WHERE id_laporan = '$id_laporan'");
    }

    public function ambildatalaporan($id_laporan)
    {
        return $this->db->get_where('laporan', ['id_laporan' => $id_laporan])->row_array();
    }

    public function editlaporan()
    {
        $jam_mulai = $this->input->post('jam_mulai', true);
        $jam_mulai_ok = date("H:i:s", strtotime($jam_mulai));

        $jam_selesai = $this->input->post('jam_selesai', true);
        $jam_selesai_ok = date("H:i:s", strtotime($jam_selesai));

        $data = [
            "shift" => $this->input->post('shift', true),
            "tanggal" => $this->input->post('tanggal', true),
            "type_wo" => $this->input->post('type_wo', true),
            "grup" => $this->input->post('group', true),
            "area" => $this->input->post('area', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "analisis" => $this->input->post('analisis', true),
            "sparepart" => $this->input->post('sparepart', true),
            "jam_mulai" => $jam_mulai_ok,
            "jam_selesai" => $jam_selesai_ok,
            "durasi" => $this->input->post('durasi', true),
            "total_person" => $this->input->post('total_person', true),
            "nama_teknisi" => $this->input->post('nama_teknisi', true),
            "status" => $this->input->post('status', true),

        ];

        $this->db->where('id_laporan', $this->input->post('id_laporan'));
        $this->db->update('laporan', $data);
    }

    public function getAllPekerjaan()
    {
        return $this->db->query("SELECT * FROM work_order WHERE wo_status = 2")->result_array();
    }

    public function hitungPermasalahan()
    {
        return $this->db->query("SELECT * FROM work_order WHERE wo_status = 2")->num_rows();
    }

    public function selesaikanPekerjaan($id_work_order)
    {
        $this->db->query("UPDATE work_order SET wo_status = 5 WHERE id_work_order = '$id_work_order'");

        $this->db->query("UPDATE detail_work_order SET execution = CURRENT_TIMESTAMP WHERE id_work_order = '$id_work_order'");
    }

    public function tolakPekerjaan($id_work_order, $alasan)
    {
        $this->db->query("UPDATE work_order SET wo_status = 4 WHERE id_work_order = '$id_work_order'");

        $this->db->query("DELETE from detail_work_order WHERE id_work_order = '$id_work_order'");

        $this->db->query("INSERT INTO work_order_ditolak (id_work_order, alasan) VALUES('$id_work_order', '$alasan')");
    }

    public function carirequest($keyword)
    {
        return $this->db->query("SELECT * FROM work_order WHERE bagian_teknisi='$keyword' AND wo_status=2")->result_array();
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
            "wo_status" => 2,
        ];

        $this->db->where('id_work_order', $this->input->post('id_work_order'));
        $this->db->update('work_order', $data);
    }

    public function ambildatapermasalahan($id)
    {
        return $this->db->query("SELECT * FROM work_order WHERE id_work_order = '$id'")->row_array();
    }
}
