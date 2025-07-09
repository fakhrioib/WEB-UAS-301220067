<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->model('user_model');
        if (!$this->session->userdata('user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->user_model->getById($user['id_login']);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('profil/index', $data);
        } else {
            $update = [
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'telpon' => $this->input->post('telpon'),
                'email' => $this->input->post('email'),
            ];
            if (!empty($_FILES['foto']['name'])) {
                $update['foto'] = $this->_uploadFoto($data['user']['foto']);
            }
            $this->user_model->update($user['id_login'], $update);
            $this->session->set_flashdata('success', 'Profil berhasil diupdate!');
            redirect('profil');
        }
    }

    public function password()
    {
        $user = $this->session->userdata('user');
        $this->form_validation->set_rules('password', 'Password Baru', 'required|min_length[4]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('profil/password');
        } else {
            $update = [
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $this->user_model->update($user['id_login'], $update);
            $this->session->set_flashdata('success', 'Password berhasil diubah!');
            redirect('profil');
        }
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
