<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->model('buku_model');
        if (!$this->session->userdata('user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['buku'] = $this->buku_model->getAll();
        $this->load->view('buku/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('buku_id', 'ID Buku', 'required|is_unique[tb_buku.buku_id]');
        $this->form_validation->set_rules('title', 'Judul Buku', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('buku/add');
        } else {
            $sampul = $this->_uploadFile('sampul');
            $lampiran = $this->_uploadFile('lampiran');
            $data = [
                'buku_id' => $this->input->post('buku_id'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_rak' => $this->input->post('id_rak'),
                'sampul' => $sampul,
                'isbn' => $this->input->post('isbn'),
                'lampiran' => $lampiran,
                'title' => $this->input->post('title'),
                'penerbit' => $this->input->post('penerbit'),
                'pengarang' => $this->input->post('pengarang'),
                'tahun_buku' => $this->input->post('tahun_buku'),
                'isi' => $this->input->post('isi'),
                'jumlah' => $this->input->post('jumlah'),
                'tgl_masuk' => date('Y-m-d')
            ];
            $this->buku_model->insert($data);
            redirect('buku');
        }
    }

    public function edit($id)
    {
        $buku = $this->buku_model->getById($id);
        if (!$buku) redirect('buku');
        $this->form_validation->set_rules('title', 'Judul Buku', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['buku'] = $buku;
            $this->load->view('buku/edit', $data);
        } else {
            $sampul = $this->_uploadFile('sampul', $buku['sampul']);
            $lampiran = $this->_uploadFile('lampiran', $buku['lampiran']);
            $update = [
                'id_kategori' => $this->input->post('id_kategori'),
                'id_rak' => $this->input->post('id_rak'),
                'sampul' => $sampul,
                'isbn' => $this->input->post('isbn'),
                'lampiran' => $lampiran,
                'title' => $this->input->post('title'),
                'penerbit' => $this->input->post('penerbit'),
                'pengarang' => $this->input->post('pengarang'),
                'tahun_buku' => $this->input->post('tahun_buku'),
                'isi' => $this->input->post('isi'),
                'jumlah' => $this->input->post('jumlah')
            ];
            $this->buku_model->update($id, $update);
            redirect('buku');
        }
    }

    public function detail($id)
    {
        $data['buku'] = $this->buku_model->getById($id);
        $this->load->view('buku/detail', $data);
    }

    public function delete($id)
    {
        $this->buku_model->delete($id);
        redirect('buku');
    }

    private function _uploadFile($field, $old = null)
    {
        if (!empty($_FILES[$field]['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = $field == 'sampul' ? 'jpg|jpeg|png' : 'pdf|doc|docx';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload($field)) {
                if ($old && file_exists('./uploads/' . $old)) {
                    unlink('./uploads/' . $old);
                }
                return $this->upload->data('file_name');
            }
        }
        return $old;
    }
}
