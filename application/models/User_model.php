<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        // $this->load->database();
        $this->load->database('local');
    }

    public function login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $result = $this->db->get('user');

        if ($result->num_rows() === 1) {
            $user = $result->row_array();

            // if (password_verify($password, $admin['password'])) {
                return $user;
            // }
        }
        return false;
    }

     public function register($data) {
        $this->db->insert('user', $data);
        return ($this->db->affected_rows() > 0);
     }
}