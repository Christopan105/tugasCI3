<?php
defined('BASEPATH') or exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
class Auth_api extends RestController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
    }
    public function register_post()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[users.email]'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]'
        );
        if ($this->form_validation->run() === FALSE) {
            $this->response([
                'status' => FALSE,
                'message' => validation_errors()
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

            ];
            if ($this->User_model->register($data)) {
                $this->response([
                    'status' => TRUE,
                    'message' => 'User registered successfully'
                ], RestController::HTTP_CREATED);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Failed to register user'
                ], RestController::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }
    public function login_post()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required'
        );
        if ($this->form_validation->run() === FALSE) {
            $this->response([
                'status' => FALSE,
                'message' => validation_errors()
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->User_model->getUserByEmail($email);
            if ($user && password_verify($password, $user->password)) {
                $token = bin2hex(random_bytes(32)); // Generate a random Ftoken

                $this->session->set_userdata([
                    'user_id' => $user->id,

                    'token' => $token
                ]);

                $this->response([
                    'status' => TRUE,
                    'message' => 'Login successful',
                    'data' => [
                        'user_id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'token' => $token // Send the token to the mobile app

                    ]
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Invalid email or password'
                ], RestController::HTTP_UNAUTHORIZED);
            }
        }
    }
}