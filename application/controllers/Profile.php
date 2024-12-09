<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
    public function __construct()
    {
            parent::__construct();

            $this->load->library('Set_views');

            $this->load->model('Home_model');
            $this->load->model('User_model');
    }

    public function index() {
        $this->profile();
    }

    public function profile() {
        $id = $this->input->get('id');
        $results = $this->Home_model->get_db($id);
        $data = array(
            'user_id' => $results['user_id'],
            'imagePath' => isset($results['image_path']) ? $results['image_path'] : null,
            'name' => $results['fname'] . ' ' . $results['mname'] . ' ' . $results['lname'],
            'gender' => $results['gender'],
            'address' => $results['blkLot'] . ' ' . $results['phase'] . ' ' . $results['street'],
            'AccountStat' => $results['account_status'],
            'age' => $results['age'],
            'employStat' => $results['employStat'],
            'username' => isset($results['username']) ? $results['username'] : null,
            'email' => isset($results['email']) ? $results['email'] : null,
            'password' => isset($results['password']) ? $results['password'] : null
        );
        $this->render($this->set_views->profile(), 'Profile', $data);
    }
}

