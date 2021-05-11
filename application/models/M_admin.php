<?php

class M_admin extends CI_Model
{
    public function getAllLaporan()
    {
        return $this->db->query("SELECT * FROM laporan ORDER BY id_laporan DESC")->result_array();
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
}
