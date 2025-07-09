<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cari extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->model('buku_model');
    }

    public function index()
    {
        $data['hasil'] = [];
        if ($this->input->get('q')) {
            $keyword = $this->input->get('q');
            $data['hasil'] = $this->buku_model->searchBuku($keyword);
            $data['keyword'] = $keyword;
        } else {
            $data['keyword'] = '';
        }
        $this->load->view('cari/index', $data);
    }
}
