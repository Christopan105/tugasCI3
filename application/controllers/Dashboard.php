<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mahasiswa');
    }
    public function index()
    {
        $data['content'] = 'admin/content';
        $this->load->view('template', $data);
    }
    public function data_mhs()
    {
        $data['tbl_mahasiswa'] = $this->M_mahasiswa->show_data()->result();
        $data['content'] = 'admin/data_mahasiswa';
        $this->load->view('template', $data);
    }
    public function form_mhs()
    {
        $data['content'] = 'admin/form_mahasiswa';
        $this->load->view('template', $data);
    }
    public function add_data()
    {
        $data['nim'] = $this->input->post('nim');
        $data['nama'] = $this->input->post('nama');
        $data['alamat'] = $this->input->post('alamat');
        $data['tgl_lahir'] = $this->input->post('tanggal');
        $data['jk'] = $this->input->post('jk');
        $data['email'] = $this->input->post('email');
        // upload a picture
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = '500000';
        $config['file_name'] = time();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
            $error_image = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error_image);
            redirect('dashboard/data_mhs');
        } else {
            $img = $this->upload->data();
        }
        $data['foto'] = './uploads/' . time() . $img['file_ext'];
        $this->M_mahasiswa->add_data('tbl_mahasiswa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
role="alert">Congratulation! Data has been created.</div>');
        redirect('dashboard/data_mhs', 'refresh');
    }
    public function edit_data($id_mhs)
    {
        $where = array('id_mhs' => $id_mhs);
        $data['tbl_mahasiswa'] = $this->M_mahasiswa->edit_data(
            'tbl_mahasiswa',
            $where
        )->result();
        $data['content'] = 'admin/edit_mahasiswa';
        $this->load->view('template', $data);
    }
    public function update($id_mhs)
    {
        $data['nim'] = $this->input->post('nim');
        $data['nama'] = $this->input->post('nama');
        $data['alamat'] = $this->input->post('alamat');
        $data['tgl_lahir'] = $this->input->post('tanggal');
        $data['jk'] = $this->input->post('jk');
        $data['email'] = $this->input->post('email');
        // upload a picture
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = '500000';
        $config['file_name'] = time();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
            $error_image = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error_image);
            redirect('dashboard/data_mhs');
        } else {
            $img = $this->upload->data();
        }
        $data['foto'] = './uploads/' . time() . $img['file_ext'];
        $where = array('id_mhs' => $id_mhs);
        $this->M_mahasiswa->update($where, $data, 'tbl_mahasiswa');
        redirect('dashboard/data_mhs', 'refresh');
    }
    public function delete($id_mhs)
    {
        $where = array('id_mhs' => $id_mhs);
        $this->M_mahasiswa->delete($where);
        redirect('dashboard/data_mhs', 'refresh');
    }

    public function export_pdf()
    {
        $this->load->library('mypdfgenerator');
        $data['title'] = "Data Mahasiswa";
        $data['tbl_mahasiswa'] = $this->M_mahasiswa->show_data()->result();
        $this->mypdfgenerator->generate('admin/laporan_pdf', $data);
    }

    public function print_mahasiswa($id_mhs)
    {
        $this->load->library('mypdfgenerator');
        $data['title'] = "Detail Mahasiswa";
        $where = array('id_mhs' => $id_mhs);
        $data['tbl_mahasiswa'] = $this->M_mahasiswa->edit_data('tbl_mahasiswa', $where)->result();
        $this->mypdfgenerator->generate('admin/print_mahasiswa', $data);
    }
}