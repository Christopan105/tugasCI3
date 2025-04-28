<?php
use chriskacerguis\RestServer\RestController;
defined('BASEPATH') or exit('No direct script access allowed');
class User_api extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }
    public function index_get()
    {
        // Fetch data from the model
        $id = $this->get('id');
        $data = $this->M_user->show_data($id)->result_array();
        if ($data) {
            $this->response([
                'status' => TRUE,
                'message' => 'Berhasil mendapatkan Data',
                'result' => $data
            ], self::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], self::HTTP_NOT_FOUND);
        }
    }
    public function index_post()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('birthday', 'Birthday', 'required');
        $this->form_validation->set_rules(
            'telepon',
            'Telepon',
            'required|numeric'
        );
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->response([
                'status' => false,
                'message' => validation_errors()
            ], self::HTTP_BAD_REQUEST);
            return;
        }

        $data = [
            'name' => $this->post('name'),
            'gender' => $this->post('gender'),
            'birthday' => $this->post('birthday'),
            'telepon' => $this->post('telepon'),
            'alamat' => $this->post('alamat')
        ];
        $test = $this->M_user->add_data('account', $data);
        if ($test > 0) {
            $this->response([
                'status' => TRUE,
                'message' => 'Data berhasil ditambahkan',
                'result' => $data
            ], self::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data gagal ditambahkan'
            ], self::HTTP_BAD_REQUEST);
        }
    }
    public function index_put()
    {
        // Validate input data
        $this->form_validation->set_data($this->put());
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('birthday', 'Birthday', 'required');
        $this->form_validation->set_rules(
            'telepon',
            'Telepon',
            'required|numeric'
        );
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->response([
                'status' => false,
                'message' => validation_errors()
            ], self::HTTP_BAD_REQUEST);
            return;
        }
        // Proceed with updating data
        $data = [
            'name' => $this->put('name'),
            'gender' => $this->put('gender'),
            'birthday' => $this->put('birthday'),
            'telepon' => $this->put('telepon'),
            'alamat' => $this->put('alamat')
        ];
        $id = $this->put('id');
        if ($this->M_user->update(['id' => $id], 'account', $data)) {
            $this->response([
                'status' => TRUE,
                'message' => 'Data berhasil diupdate',
                'result' => $data
            ], self::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data gagal diupdate'
            ], self::HTTP_BAD_REQUEST);
        }
    }
    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'Kode user tidak ditemukan'
            ], self::HTTP_NOT_FOUND);
        } else {
            $deleted = $this->M_user->delete(['id' => $id], 'account');
            if ($deleted > 0) {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Data berhasil dihapus'
                ], self::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Data gagal dihapus'
                ], self::HTTP_BAD_REQUEST);
            }
        }
    }
}

?>