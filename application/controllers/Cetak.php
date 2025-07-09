<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url']);
        $this->load->model('anggota_model');
        if (!$this->session->userdata('user')) {
            redirect('auth');
        }
    }

    public function kartu($id)
    {
        $data['anggota'] = $this->anggota_model->getById($id);
        $this->load->view('cetak/kartu', $data);
    }
}
