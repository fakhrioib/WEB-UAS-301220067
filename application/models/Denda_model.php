<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Denda_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('tb_denda')->result_array();
    }
    public function getById($id)
    {
        return $this->db->get_where('tb_denda', ['id_denda' => $id])->row_array();
    }
    public function insert($data)
    {
        return $this->db->insert('tb_denda', $data);
    }
    public function update($id, $data)
    {
        $this->db->where('id_denda', $id);
        return $this->db->update('tb_denda', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_denda', $id);
        return $this->db->delete('tb_denda');
    }
    // Hitung denda otomatis berdasarkan keterlambatan (selisih hari)
    public function hitungDenda($tgl_balik, $tgl_kembali)
    {
        $selisih = (strtotime($tgl_kembali) - strtotime($tgl_balik)) / (60 * 60 * 24);
        if ($selisih > 0) {
            // Ambil denda aktif
            $denda = $this->db->where('status', 'Aktif')->order_by('mulai_tanggal', 'DESC')->get('tb_denda')->row_array();
            if ($denda) {
                return $selisih * intval($denda['denda']);
            }
        }
        return 0;
    }
}
