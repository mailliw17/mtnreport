<?php

class M_auth extends CI_Model
{
    public function auth_user($username, $password)
    {
        $query = $this->db->query("SELECT * FROM users WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }

    public function register($data)
    {
        $query = $this->db->insert('users', $data);
        return $query;
    }

    public function getAllAccount()
    {
        return $this->db->query("SELECT * FROM users WHERE role = 'Teknisi' ORDER BY id DESC")->result_array();
    }

    public function getAllAccountSpvNonMtn()
    {
        return  $this->db->query("SELECT * FROM users WHERE role = 'Supervisor-NonMTN' ORDER BY id DESC")->result_array();
    }

    public function getAllAccountKaryawanNonMtn($grup)
    {
        return  $this->db->query("SELECT * FROM users WHERE role = 'Karyawan-NonMTN' AND grup = '$grup' ORDER BY id DESC")->result_array();
    }

    public function hapusakun($id)
    {
        $this->db->query("DELETE FROM users WHERE id = '$id'");
    }

    public function getAccInfo($id)
    {
        return $this->db->query("SELECT * FROM users WHERE id='$id' LIMIT 1")->row_array();
    }

    public function gantipassword($id)
    {

        $password_hash = md5($this->input->post('passwordBaru1', true));
        $this->db->query("UPDATE users SET password = '$password_hash' WHERE id = '$id'");
    }
}
