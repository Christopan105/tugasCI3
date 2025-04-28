<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_auth');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run('login') == false) {
            $this->load->view('login');
        } else {
            //code
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->M_auth->get_user_data($email);
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id' => $user['id']
                    ];
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {
                        // echo "halaman admin ";
                        redirect('dashboard');
                    } else {
                        // echo "halaman Mahasiswa ";
                        // $this->load->view('template');
                        redirect('mahasiswa');
                    }

                    $this->session->set_userdata($data);
                    // echo 'berhasil login';
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger"
            role="alert">Email is not registered!</div>');
                redirect('auth');
            }
        }
    }


    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|is_unique[account.email]',
            ['is_unique' => 'This email has already been registered!']
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[8]|matches[password2]',
            [
                'matches' => 'Password don\'t match!',
                'min_length' => 'Password too short!'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) { // Jika validasi gagal
            $this->load->view('register');
        } else { // Jika berhasil
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 2,
            ];

            // Simpan ke database
            $this->M_auth->insert_user_data($data);

            // Flash message sukses
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                Congratulations! Your account has been created.
            </div>'
            );

            // Redirect ke halaman login
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth', 'refresh');
    }
}
