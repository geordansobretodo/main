<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database('local');
    }

    public function count_user() {
        $this->db->where('valid', 1);
        return $this->db->count_all_results('user');
    }
}