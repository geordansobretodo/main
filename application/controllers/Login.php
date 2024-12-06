<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		
        $this->load->library('Set_views');
        $this->load->model('User_model');
	}

	public function index() {
        $this->login_page();
	}

    public function login_page() {
        $this->render_login($this->set_views->login(), 'Login');
    }

	public function login() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('login_error', 'Invalid name or password');
            $this->render_login($this->set_views->login(), 'Login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->login($email, $password);

            if ($user) {
                $user_data = array(
                    'id' => $user['id'],
                    'email' => $user['email'],
                );

                $this->session->set_userdata($user_data);
                $this->session->set_userdata('log', 'logged');
                $this->session->set_flashdata('login_success', 'You are now logged in!');
                $this->render($this->set_views->home(), 'Home');
            } else {
                $this->session->set_flashdata('login_error', 'Invalid name or password');
                $this->render_login($this->set_views->login(), 'Login');
            }   
        }
    }

    public function logout() {
        $this->session->unset_userdata('log');
        $this->session->sess_destroy();

        $this->render($this->set_views->home(), 'Home');
    }
}