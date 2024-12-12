<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Home_model extends CI_Model
{
    public function __construct()
    {
        // $this->load->database('sample_live');
        $this->load->database('sample');
    }

    public function get_db($id) {
        $this->db->where('user_id', $id);
        $result = $this->db->get('user_accounts');
        return $result->row_array();
    }
}