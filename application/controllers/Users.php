<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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
        $data['users'] = $this->user_model->getAll();
        $this->load->view('users/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('user', 'Username', 'required|is_unique[tb_admin.user]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('users/add');
        } else {
            $foto = $this->_uploadFoto();
            $data = [
                'user' => $this->input->post('user'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level' => $this->input->post('level'),
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
            $this->user_model->insert($data);
            redirect('users');
        }
    }

    public function edit($id)
    {
        $user = $this->user_model->getById($id);
        if (!$user) redirect('users');
        $this->form_validation->set_rules('user', 'Username', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $user;
            $this->load->view('users/edit', $data);
        } else {
            $foto = $this->_uploadFoto($user['foto']);
            $update = [
                'user' => $this->input->post('user'),
                'level' => $this->input->post('level'),
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
            $this->user_model->update($id, $update);
            redirect('users');
        }
    }

    public function detail($id)
    {
        $data['user'] = $this->user_model->getById($id);
        $this->load->view('users/detail', $data);
    }

    public function delete($id)
    {
        $this->user_model->delete($id);
        redirect('users');
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
