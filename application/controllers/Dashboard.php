<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        if (!$this->session->userdata('user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['anggota'] = $this->db->where('level', 'Anggota')->count_all_results('tb_admin');
        $data['kategori'] = $this->db->count_all('tb_kategori');
        $data['pinjam'] = $this->db->where('status', 'dipinjam')->count_all_results('tb_pinjam');
        $data['kembali'] = $this->db->where('status', 'dikembalikan')->count_all_results('tb_pinjam');
        $this->load->view('dashboard/index', $data);
    }
}
