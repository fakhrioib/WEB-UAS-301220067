<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Denda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->model('denda_model');
        if (!$this->session->userdata('user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['denda'] = $this->denda_model->getAll();
        $this->form_validation->set_rules('denda', 'Harga Denda', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('mulai_tanggal', 'Mulai Tanggal', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('denda/index', $data);
        } else {
            $this->denda_model->insert([
                'denda' => $this->input->post('denda'),
                'status' => $this->input->post('status'),
                'mulai_tanggal' => $this->input->post('mulai_tanggal')
            ]);
            redirect('denda');
        }
    }

    public function edit($id)
    {
        $denda = $this->denda_model->getById($id);
        if (!$denda) redirect('denda');
        $this->form_validation->set_rules('denda', 'Harga Denda', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('mulai_tanggal', 'Mulai Tanggal', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['denda'] = $denda;
            $this->load->view('denda/edit', $data);
        } else {
            $this->denda_model->update($id, [
                'denda' => $this->input->post('denda'),
                'status' => $this->input->post('status'),
                'mulai_tanggal' => $this->input->post('mulai_tanggal')
            ]);
            redirect('denda');
        }
    }

    public function delete($id)
    {
        $this->denda_model->delete($id);
        redirect('denda');
    }
}
