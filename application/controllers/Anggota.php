<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->model('anggota_model');
        if (!$this->session->userdata('user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['anggota'] = $this->anggota_model->getAll();
        $this->load->view('anggota/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('user', 'Username', 'required|is_unique[tb_admin.user]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('anggota/add');
        } else {
            $foto = $this->_uploadFoto();
            $data = [
                'user' => $this->input->post('user'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level' => 'Anggota',
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'telpon' => $this->input->post('telpon'),
                'email' => $this->input->post('email'),
                'tgl_bergabung' => date('Y-m-d'),
                'foto' => $foto
            ];
            $this->anggota_model->insert($data);
            redirect('anggota');
        }
    }

    public function edit($id)
    {
        $anggota = $this->anggota_model->getById($id);
        if (!$anggota) redirect('anggota');
        $this->form_validation->set_rules('user', 'Username', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['anggota'] = $anggota;
            $this->load->view('anggota/edit', $data);
        } else {
            $foto = $this->_uploadFoto($anggota['foto']);
            $update = [
                'user' => $this->input->post('user'),
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'telpon' => $this->input->post('telpon'),
                'email' => $this->input->post('email'),
                'foto' => $foto
            ];
            if ($this->input->post('password')) {
                $update['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
            $this->anggota_model->update($id, $update);
            redirect('anggota');
        }
    }

    public function detail($id)
    {
        $data['anggota'] = $this->anggota_model->getById($id);
        $this->load->view('anggota/detail', $data);
    }

    public function delete($id)
    {
        $this->anggota_model->delete($id);
        redirect('anggota');
    }

    private function _uploadFoto($old = null)
    {
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                if ($old && file_exists('./uploads/' . $old)) {
                    unlink('./uploads/' . $old);
                }
                return $this->upload->data('file_name');
            }
        }
        return $old;
    }
}
