<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->model('kategori_model');
        if (!$this->session->userdata('user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['kategori'] = $this->kategori_model->getAll();
        $this->form_validation->set_rules('kategori_id', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('kategori/index', $data);
        } else {
            $this->kategori_model->insert(['kategori_id' => $this->input->post('kategori_id')]);
            redirect('kategori');
        }
    }

    public function edit($id)
    {
        $kategori = $this->kategori_model->getById($id);
        if (!$kategori) redirect('kategori');
        $this->form_validation->set_rules('kategori_id', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['kategori'] = $kategori;
            $this->load->view('kategori/edit', $data);
        } else {
            $this->kategori_model->update($id, ['kategori_id' => $this->input->post('kategori_id')]);
            redirect('kategori');
        }
    }

    public function delete($id)
    {
        $this->kategori_model->delete($id);
        redirect('kategori');
    }
}
