<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian_model extends CI_Model
{
    public function getAllPengembalian()
    {
        $this->db->select('tb_pinjam.*, tb_admin.nama, tb_buku.title');
        $this->db->from('tb_pinjam');
        $this->db->join('tb_admin', 'tb_pinjam.anggota_id = tb_admin.user', 'left');
        $this->db->join('tb_buku', 'tb_pinjam.buku_id = tb_buku.buku_id', 'left');
        $this->db->where('tb_pinjam.status', 'dikembalikan');
        return $this->db->get()->result_array();
    }
    public function getPinjamById($id)
    {
        $this->db->select('tb_pinjam.*, tb_admin.nama, tb_buku.title');
        $this->db->from('tb_pinjam');
        $this->db->join('tb_admin', 'tb_pinjam.anggota_id = tb_admin.user', 'left');
        $this->db->join('tb_buku', 'tb_pinjam.buku_id = tb_buku.buku_id', 'left');
        $this->db->where('tb_pinjam.id_pinjam', $id);
        return $this->db->get()->row_array();
    }
    public function prosesPengembalian($id, $tgl_kembali)
    {
        // Update status pinjam
        $this->db->where('id_pinjam', $id);
        $this->db->update('tb_pinjam', [
            'status' => 'dikembalikan',
            'tgl_kembali' => $tgl_kembali
        ]);
        // Update stok buku
        $pinjam = $this->getPinjamById($id);
        if ($pinjam) {
            $this->db->set('jumlah', 'jumlah+1', FALSE);
            $this->db->where('buku_id', $pinjam['buku_id']);
            $this->db->update('tb_buku');
        }
    }
}
