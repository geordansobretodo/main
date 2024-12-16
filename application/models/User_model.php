<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database('user');
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
     
     public function get_users($search, $limit, $offset)
     {
         $this->db->select('*');
         $this->db->where('valid', 1);
         $this->db->from('user');
 
         if (!empty($search)) {
             $this->db->like('email', $search);
             $this->db->or_like('username', $search);
             $this->db->or_like('id', $search);
         }
 
         $this->db->limit($limit, $offset);
         $query = $this->db->get();
         return $query->result_array();
     }

     public function count_users($search)
     {
         $this->db->select('COUNT(*) as count');
         $this->db->from('user');
 
         if (!empty($search)) {
             $this->db->like('email', $search);
             $this->db->or_like('username', $search);
         }
 
         $query = $this->db->get();
         return $query->row()->count;
     }

     public function delete($id) 
     {
         $this->db->set('valid', 0);
         $this->db->where('id', $id);
         $this->db->update('user');
     }
}