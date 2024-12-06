<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function login($email, $password) {
        $this->db->where('username', $email);
        $result = $this->db->get('user');

        if ($result->num_rows() === 1) {
            $admin = $result->row_array();

            // if (password_verify($password, $admin['password'])) {
                return $user;
            // }
        }
        return false;
    }
}