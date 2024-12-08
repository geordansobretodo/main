<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
    public function __construct()
    {
            parent::__construct();

            $this->load->library('Set_views');

            $this->load->model('Home_model');
    }

    public function index() {
        $this->profile();
    }

    public function profile() {
        $result = $this->Home_model->get_db();
        $data = array(
            'user_id' => $result['user_id'],
            'imagePath' => isset($result['image_path']) ? $result['image_path'] : null,
            'name' => $result['fname'] . ' ' . $result['mname'] . ' ' . $result['lname'],
            'gender' => $result['gender'],
            'address' => $result['blkLot'] . ' ' . $result['phase'] . ' ' . $result['street'],
            'AccountStat' => $result['account_status'],
            'age' => $result['age'],
            'employStat' => $result['employStat']
        );

        $this->render($this->set_views->profile(), 'Profile', $data);
    }

}

