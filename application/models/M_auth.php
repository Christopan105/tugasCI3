<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{

    public function get_user_data($email)
    {
        return $this->db->get_where('account', ['email' => $email])->row_array();
    }

    public function insert_user_data($data)
    {
        $this->db->insert('account', $data);
    }
}


?>