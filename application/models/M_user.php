<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_user extends CI_Model
{
    public function show_data($id = null)
    {
        if ($id === null) {
            $show_data = $this->db->get('account');
            return $show_data;
        } else {
            $this->db->where('id', $id);
            $show_data = $this->db->get('account');
            return $show_data;
        }
    }
    public function add_data($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }
    public function update($id, $table, $data)
    {
        $this->db->where($id);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
    public function delete($where, $table)
    {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }
}