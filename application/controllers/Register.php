<?php 

class Register extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		
        $this->load->library('Set_views');
        $this->load->model('User_model');
	}

    public function index() {
        $this->register_page();
    }

    public function register_page() {
        $this->render_login($this->set_views->register(), 'Register ');
    } 

    public function register() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('register_error', 'Invalid name or password');
            $this->render_login($this->set_views->register(), 'Register');
        } else {

            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'valid' => 1
            );


            $user = $this->User_model->register($data);

            if ($user) {
                // $user_data = array(
                //     'id' => $user['id'],
                //     'email' => $user['email'],
                // );

                // $this->session->set_userdata($user_data);
                // $this->session->set_userdata('log', 'logged');
                $this->session->set_flashdata('register_success', 'Account successfully created!');
                $this->render($this->set_views->home(), 'Home');
            } else {
                $this->session->set_flashdata('register_error', 'Account creation failed.');
                $this->render_login($this->set_views->register(), 'Register');
            }
        }
    }
}
?>