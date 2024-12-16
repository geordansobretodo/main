<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		
        $this->load->library('Set_views');
        $this->load->model('Option_list_model');
        $this->load->model('Admin_model');
        $this->load->model('User_model');
	}

	public function index() {
        $this->admin_dashboard();
	}

    public function admin_dashboard() {
        if ($this->session->userdata('log') != 'logged') {
            redirect('Admin/login');
        }

        $data = array(
            'totalUsers' => $this->Admin_model->count_user()
        );

        $this->render_admin($this->set_views->admin_dashboard(), 'Admin Dashboard', $data);
    }

    public function users() {
        if ($this->session->userdata('log') != 'logged') {
            redirect('Admin/login');
        }

        $this->render_admin($this->set_views->admin_users(), 'Users');
    }

    public function fetch_user_data()
    {
        $search = $this->input->get('search');
        $page = $this->input->get('page');
        $entriesPerPage = 5;
        $offset = ($page - 1) * $entriesPerPage;

        $data['users'] = $this->User_model->get_users($search, $entriesPerPage, $offset);
        $data['total_rows'] = $this->User_model->count_users($search);
        $data['total_pages'] = ceil($data['total_rows'] / $entriesPerPage);

        echo json_encode($data);
    }

    public function delete($user_id)
    {
        if ($this->User_model->delete($user_id)) {
            $this->session->set_flashdata('success', 'User deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete user.');
        }
        redirect('Admin/users');
    }

    public function option_list() {
        if ($this->session->userdata('log') != 'logged') {
            redirect('Admin/login');
        }

        $this->render_admin($this->set_views->admin_option_list(), 'Option Management');        
    }

    public function add_option()
    {
        $option_type = $this->input->post('option_type');
        $option_name = $this->input->post('option_name');

        if ($option_name && $option_type) {
            $result = $this->Option_list_model->add_option($option_name, $option_type);

            if ($result) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }

    public function get_options($type)
    {
        $options = $this->Option_list_model->get_options($type);
        echo json_encode($options);
    }

    public function delete_option()
    {
        $id = $this->input->post('id');

        if ($id) {
            $result = $this->Option_list_model->delete_option($id);
            echo $result ? 'success' : 'error';
        } else {
            echo 'error';
        }
    }

    public function login() {
        $this->render_admin_login($this->set_views->admin_login(), 'Admin Login');
    }

	public function admin_login() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('login_error', 'Invalid name or password');
            $this->render_admin_login($this->set_views->admin_login(), 'Login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->login($email, $password);

            if ($user) {
                $user_data = array(
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'username' => $user['username']
                );

                $data = array(
                    'totalUsers' => $this->Admin_model->count_user()
                );

                $this->session->set_userdata($user_data);
                $this->session->set_userdata('log', 'logged');
                $this->session->set_flashdata('login_success', 'You are now logged in!');
                $this->render_admin($this->set_views->admin_dashboard(), 'Admin Dashboard', $data);
            } else {
                $this->session->set_flashdata('login_error', 'Invalid name or password');
                $this->render_admin_login($this->set_views->admin_login(), 'Login');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('log');
        $this->session->sess_destroy();

        $this->session->set_flashdata('logout_success', 'Logged out successfully!');
        $this->render_admin_login($this->set_views->admin_login(), 'Admin');
    }
}