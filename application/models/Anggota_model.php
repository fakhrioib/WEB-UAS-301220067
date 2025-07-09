<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get_where('tb_admin', ['level' => 'Anggota'])->result_array();
    }
    public function getById($id)
    {
        return $this->db->get_where('tb_admin', ['id_login' => $id, 'level' => 'Anggota'])->row_array();
    }
    public function insert($data)
    {
        return $this->db->insert('tb_admin', $data);
    }
    public function update($id, $data)
    {
        $this->db->where('id_login', $id);
        $this->db->where('level', 'Anggota');
        return $this->db->update('tb_admin', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_login', $id);
        $this->db->where('level', 'Anggota');
        return $this->db->delete('tb_admin');
    }
}
