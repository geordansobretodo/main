<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_province_data() {
        $this->db->where(array(
            'type' => 'province',
            'valid' => 1
        ));
        $result = $this->db->get('data');
        return $result->result_array();
    }

    public function get_place_data() {
        $this->db->where(array(
            'type' => 'place',
            'valid' => 1
        ));
        $result = $this->db->get('data');
        return $result->result_array();
    }

    public function get_budget_data() {
        $this->db->where(array(
            'type' => 'budget',
            'valid' => 1
        ));
        $result = $this->db->get('data');
        return $result->result_array();
    }

    public function get_filter_data() {
        $this->db->where(array(
            'type' => 'filter',
            'valid' => 1
        ));
        $result = $this->db->get('data');
        return $result->result_array();
    }
}