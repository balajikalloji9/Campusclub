<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class User_model extends CI_Model{

    public $users = 'users';

    public function __construct()
    {
     parent::__construct();
    
     $this->db = $this->load->database('default', TRUE);
     
    }

    public function checkUserEmail($user_email){
        $where="(email = '".$user_email."' AND status='Active')";
        $this->db->select('id');
        $this->db->from($this->users);
        $this->db->where($where);
        $result=$this->db->get();
        $result=$result->num_rows();
        //echo $this->db->last_query();exit;
        return $result;
    }

    public function checkUserEmailPassword($user_email,$password){
        $encode_password=md5($password);

        $where="(email = '".$user_email."' AND status='Active' AND password='".$encode_password."')";
        $this->db->select('id,user_name,email,password,status,login_time');
        $this->db->from($this->users);
        $this->db->where($where);
        $query=$this->db->get(); 
        $num_rows=$query->num_rows();
        $result = $query->row_array();
        //echo '<pre>';print_ln($this->db->);exit;
        //echo $this->db->last_query();exit;
        if($result){
                //set session values here
                $this->session->set_userdata('user_id', $result['id']);
                $this->session->set_userdata('user_name', $result['user_name']);
                $this->session->set_userdata('type', 'user');
                
                $this->session->set_userdata('ip_address', $_SERVER['REMOTE_ADDR']);
                $this->session->set_userdata('logged_in', "CampusClubMS_user");
                $this->session->set_userdata('last_logged_in', $result['login_time']);
                $this->session->set_userdata('login_date_time',date('Y-m-d H:i:s'));                                 
                $this->session->set_userdata('login_state', TRUE);
                //$user_data = $this->session->all_userdata();
                
            }
        return $result;
        
    }

    public function update_user_logintime($login_time,$user_id){
        
        $login_st_data = array(
            'login_time'      => $login_time,  
        );
        //echo '<pre>';print_r($login_st_data);exit;
        $this->db->where('id',$user_id);
        $admin_result=$this->db->update($this->users, $login_st_data);
        return $admin_result;
    }
    public function register_user($post){

    	$user_name= $post['firstname']." ".$post['lastname'];
    	$insert=array(
    					'user_name'=> $user_name,
    					'mobile'=> $post['mobile'],
    					'email'=> $post['email'],
    					'password'=> md5($post['password']),
    					'gender'=> $post['gender'],
    					'address'=> $post['address'],
    					'created_date'=> date('Y-m-d H:i:s'),
    					'created_by'=>'student'
    	   			 );
    	//echo '<pre>';print_r($insert);
    	$res=$this->db->insert('users',$insert);
        //echo '<pre>';print_r($this->db->last_query());exit;
    	return $res;
    }

    public function logout_time()
    {
        $login_st_data = array(
            'logout_time'      => date('Y-m-d H:i:s'),  
        );
        
        $this->db->where('id',$this->session->userdata('user_id'));
        $admin_result=$this->db->update($this->users, $login_st_data);
        //echo $this->db->last_query();exit;
        return $admin_result;
    }

    public function change_password_2()
    {

        
        $normal_password =  $this->input->post('conf_pwd');
        $encode_password = md5($normal_password);
        
        $data = array(
                    //  'password'=>$this->input->post('conf_pwd')
                        'password'=>$encode_password,
                        //'modified_by'=>$this->session->userdata('admin_id'),
                        'updated_date'=>date('Y-m-d H:i:s')
                    );
        $this->db->where('id',$this->session->userdata('user_id'));
        $result = $this->db->update($this->users, $data);
                        //echo '<pre>';print_r($this->db->last_query());exit;

        return $result;
    }

// Function to Check Current Password Current or Not
    public function password_check()
    {
        
        $normal_password =  $this->input->post('cur_pwd');
        $encode_password = md5($normal_password);
        
        
        $this->db->select('*');
        $this->db->from($this->users);
        $this->db->where('password',$encode_password);
        $this->db->where('id',$this->session->userdata('user_id'));     
        $result=$this->db->get();

        return $result->num_rows(); 
    }

     public function generate_calendar()
    {
        $this->load->helper('date');
        $current_month = date('Y-m');
        $start_date = $current_month . '-01';
        $end_date = date('Y-m-t', strtotime($start_date));

        // Fetch all available time slots for the current month
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $slots = $this->db->get('time_slots')->result_array();

        $calendar = [];
        foreach ($slots as $slot) {
            $calendar[$slot['date']][] = $slot;
        }

        return $calendar;
    }

    // Fetch available slots for a specific date
    public function get_available_slots($date)
    {
        $this->db->where('date', $date);
        $this->db->where('status', 'Available');
        return $this->db->get('time_slots')->result_array();
    }

    // Get all slots for a given date (to show the status of each slot)
    public function get_slots_for_date($date)
    {
        $this->db->where('date', $date);
        return $this->db->get('time_slots')->result_array();
    }

    // Book a slot for a customer
    public function book_slot($post,$day,$sport_id,$no_of_bookings,$day_no,$selected_date)
    {
       
            $data = [
                'sport_id' => $sport_id,
                'slot_id' => $post['slot_id'],
                'days'=>$day,
                'status'=>'Booked',
                'user_id'=> $this->session->userdata('user_id'),
                'booking_date'=> date('Y-m-d H:i:s'),
                'day_no'=> $day_no,
                'selected_date'=>$selected_date
            ];
           //echo '<pre>';print_r($data);exit;
            $result=$this->db->insert('bookings', $data);

            //$this->db->where('id', $slot_id);
            $this->db->update('time_slots', array('no_of_bookings' => $no_of_bookings),array('id'=>$post['slot_id']));

            return $result;
       
    }

    public function get_slot($slot_id){
        $this->db->where('id', $slot_id);
        //$this->db->where('status', 'Available');
         $slot = $this->db->get('time_slots')->row_array();
         return $slot;
    }

    public function check_how_many_users_booking($slot_id,$day_no,$to_date){
    $this->db->select('*');
    $this->db->from('bookings');
    $this->db->where('slot_id', $slot_id);
    $this->db->where('day_no', $day_no);
    $this->db->where('selected_date <=', $to_date); // Directly passing the date string

    $query = $this->db->get();
    //echo $this->db->last_query();exit;
    $result = $query->num_rows();
    return $result;
    }


}