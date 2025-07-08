<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUserByUsername($username)
    {
        return $this->db->get_where('tb_admin', ['user' => $username])->row_array();
    }
}
