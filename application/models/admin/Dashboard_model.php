<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Dashboard_model extends CI_Model {

	public function get_users_count(){

	    $this->db->select('id');
        $this->db->from('users');
        $query=$this->db->get();
        $result=$query->num_rows();
        return $result;
    }

    public function get_sports(){

	    $this->db->select('*');
        $this->db->from('sports');
        $this->db->where('status','Active');
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }

}?>
