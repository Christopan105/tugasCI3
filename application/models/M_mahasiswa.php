<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_mahasiswa extends CI_Model
{
    public function show_data()
    {
        $show_data = $this->db->get('tbl_mahasiswa');
        return $show_data;
    }
    //kode Create
    public function add_data($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function edit_data($table, $id_mhs)
    {
        $edit = $this->db->get_where($table, $id_mhs);
        return $edit;
    }
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function delete($where)
    {
        $this->db->delete('tbl_mahasiswa', $where);
    }
}