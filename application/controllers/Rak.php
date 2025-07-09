<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->model('rak_model');
        if (!$this->session->userdata('user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['rak'] = $this->rak_model->getAll();
        $this->form_validation->set_rules('nama_rak', 'Nama Rak', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('rak/index', $data);
        } else {
            $this->rak_model->insert(['nama_rak' => $this->input->post('nama_rak')]);
            redirect('rak');
        }
    }

    public function edit($id)
    {
        $rak = $this->rak_model->getById($id);
        if (!$rak) redirect('rak');
        $this->form_validation->set_rules('nama_rak', 'Nama Rak', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['rak'] = $rak;
            $this->load->view('rak/edit', $data);
        } else {
            $this->rak_model->update($id, ['nama_rak' => $this->input->post('nama_rak')]);
            redirect('rak');
        }
    }

    public function delete($id)
    {
        $this->rak_model->delete($id);
        redirect('rak');
    }
}
