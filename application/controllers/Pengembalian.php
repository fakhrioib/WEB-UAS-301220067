<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->model('pengembalian_model');
        if (!$this->session->userdata('user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['pengembalian'] = $this->pengembalian_model->getAllPengembalian();
        $this->load->view('pengembalian/index', $data);
    }

    public function form($id)
    {
        $pinjam = $this->pengembalian_model->getPinjamById($id);
        if (!$pinjam) redirect('pengembalian');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['pinjam'] = $pinjam;
            $this->load->view('pengembalian/form', $data);
        } else {
            $this->pengembalian_model->prosesPengembalian($id, $this->input->post('tgl_kembali'));
            redirect('pengembalian');
        }
    }
}
