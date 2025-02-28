<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login_model extends CI_Model {


	public $users = 'admins';

	public function __construct()

	{

		parent::__construct();

	

	}

	public function checkUserEmailAndUserID($user_email){
		$where="(email = '".$user_email."' AND status='Active') OR (admin_id = '".$user_email."' AND status='Active')";
		$this->db->select('id,type');
		$this->db->from($this->users);
		$this->db->where($where);
		$result=$this->db->get();
		$result=$result->num_rows();
		//echo $this->db->last_query();exit;
		return $result;
	}


	public function checkUserEmailPassword($user_email,$password){
		$encode_password=md5($password);

		$where="(email = '".$user_email."' AND status='Active' AND password='".$encode_password."') OR (admin_id = '".$user_email."' AND status='Active' AND password='".$encode_password."')";
		$this->db->select('id,admin_id,type,username,email,password,status,login_time');
		$this->db->from($this->users);
		$this->db->where($where);
		$query=$this->db->get(); 
		$num_rows=$query->num_rows();
		$result = $query->row_array();
		//echo '<pre>';print_ln($this->db->);exit;
		//echo $this->db->last_query();exit;
		if($result){
				//set session values here
				$this->session->set_userdata('admin_id', $result['admin_id']);
				$this->session->set_userdata('username', $result['username']);
				$this->session->set_userdata('type', $result['type']);
				
				$this->session->set_userdata('ip_address', $_SERVER['REMOTE_ADDR']);
				$this->session->set_userdata('logged_in', "CampusClubMS");
				$this->session->set_userdata('last_logged_in', $result['login_time']);
				$this->session->set_userdata('login_date_time',date('Y-m-d H:i:s'));								 
				$this->session->set_userdata('login_state', TRUE);
				//$user_data = $this->session->all_userdata();
				
			}
		return $result;
		
	}

	public function update_admin_logintime($login_time,$admin_id){
		
		$login_st_data = array(
			'login_time'      => $login_time,  
		);
		//echo '<pre>';print_r($login_st_data);exit;
		$this->db->where('admin_id',$admin_id);
		$admin_result=$this->db->update($this->users, $login_st_data);
		return $admin_result;
	}

	public function logout_time()
	{
		$login_st_data = array(
			'logout_time'      => date('Y-m-d H:i:s'),  
		);
		
		$this->db->where('admin_id',$this->session->userdata('admin_id'));
		$admin_result=$this->db->update($this->users, $login_st_data);
		//echo $this->db->last_query();exit;
		return $admin_result;
	}
}

?>