<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('tb_buku')->result_array();
    }
    public function getById($id)
    {
        return $this->db->get_where('tb_buku', ['id_buku' => $id])->row_array();
    }
    public function insert($data)
    {
        return $this->db->insert('tb_buku', $data);
    }
    public function update($id, $data)
    {
        $this->db->where('id_buku', $id);
        return $this->db->update('tb_buku', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_buku', $id);
        return $this->db->delete('tb_buku');
    }

    public function searchBuku($keyword)
    {
        $this->db->like('title', $keyword);
        $this->db->or_like('pengarang', $keyword);
        $this->db->or_like('penerbit', $keyword);
        return $this->db->get('tb_buku')->result_array();
    }
}
