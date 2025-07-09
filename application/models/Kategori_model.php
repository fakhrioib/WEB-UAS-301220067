<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('tb_kategori')->result_array();
    }
    public function getById($id)
    {
        return $this->db->get_where('tb_kategori', ['id_kategori' => $id])->row_array();
    }
    public function insert($data)
    {
        return $this->db->insert('tb_kategori', $data);
    }
    public function update($id, $data)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->update('tb_kategori', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->delete('tb_kategori');
    }
}
