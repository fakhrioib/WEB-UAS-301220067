<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rak_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('tb_rak')->result_array();
    }
    public function getById($id)
    {
        return $this->db->get_where('tb_rak', ['id_rak' => $id])->row_array();
    }
    public function insert($data)
    {
        return $this->db->insert('tb_rak', $data);
    }
    public function update($id, $data)
    {
        $this->db->where('id_rak', $id);
        return $this->db->update('tb_rak', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_rak', $id);
        return $this->db->delete('tb_rak');
    }
}
