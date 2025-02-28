<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public $data=array();

	public $login_redirect= '/user';
	public $dashboard_redirect= '/user/dashboard';
	public $change_password_redirect='user/change_password';
	public $employee_dashboard_redirect='user/dashboard';
	public $pwd_redirect='/user/change_password';

 	
 	public $header_page= 'user/includes/header';
	public $footer_Page= 'user/includes/footer';
	public $leftMenu='user/includes/left_menu';

	public $dashboard_Page= 'user/dashboard';
	public $change_password_page = 'user/change_password';


	function __construct()
	{
		parent::__construct();	
		$this->load->model('User_model','my_model');
		
	}

	public function index()
	{

		if($this->input->post('Submit')!='')
		{
				$checkEmail = $this->my_model->checkUserEmail($this->input->post('user_email'));
								//echo '<pre>';print_r($checkEmail);exit;

				if($checkEmail == 0)
				{
					$this->session->set_flashdata( 'message', 'Invalid User Email...' );
					redirect($this->login_redirect);
					
				}

				//Username And Password Check here
				$user_details = $this->my_model->checkUserEmailPassword($this->input->post('user_email'),$this->input->post('password'));
				if(!empty($user_details)){


				$user_details = $this->my_model->update_user_logintime($this->session->userdata('login_date_time'),$user_details['id']);
				//echo '<pre>';print_r($user_details);exit;
				$this->session->set_flashdata( 'message', 'User Successfully Login...' );
						//if($this->session->userdata('admin_id') == 'ADM0001'){
			    redirect($this->dashboard_redirect);
						//	}
							// else{
							// redirect($this->employee_dashboard_redirect);	
							// }
				}else{
					$this->session->set_flashdata( 'message', 'Invaild password...' );
					redirect($this->login_redirect);
				}
			}
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	

	public function registration()
	{
		
		
		if($this->input->post('Submit') !=''){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);

				$checkEmail = $this->my_model->checkUserEmail($this->input->post('email'));
								//echo '<pre>';print_r($checkEmail);exit;

				if($checkEmail != 0)
				{
					$this->session->set_flashdata( 'error', 'User Email Already Exists...' );
					redirect('user/registration');
					
				}

				$result=$this->my_model->register_user($post);
				if($result)
				{
					$this->session->set_flashdata( 'success', 'User registration succuesfull...' );
					redirect('user/registration');
					
				}
		}
		$this->load->view('header');
		$this->load->view('registration');
		$this->load->view('footer');
		
	}


	public function dashboard(){
		
		 checkUserLogin();

		if($this->uri->segment(4) == ''){
			 $this->data['search_date']=$search_date=date('Y-m-d');
			 $this->data['search_value']='today';
		}else{
			 $this->data['search_date']=$search_date=$this->uri->segment(4);
			 $this->data['search_value']='search';
		}
		 //echo '<pre>';print_r($search_date);exit;
		

		 $this->data['calendar'] = $this->my_model->generate_calendar();

         $this->setHeaderFooter($this->dashboard_Page,$this->data);
	}

	// Get slots for a particular date (AJAX)
    public function get_slots($date)
    {
        $slots = $this->my_model->get_available_slots($date);
        echo json_encode($slots);
    }

    // Handle AJAX request to fetch available slots for a selected date
    public function load_slots_for_date($date)
    {
        $slots = $this->my_model->get_slots_for_date($date);
        echo json_encode($slots);
    }

     // Handle the booking of the slot
    public function book_slot()
    {
        $this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
        $this->form_validation->set_rules('slot_id', 'Slot', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index(); // Reload the page with validation errors
        } else {
            $slot_id = $this->input->post('slot_id');
            $customer_name = $this->input->post('customer_name');

            // Book the slot
            $result = $this->my_model->book_slot($slot_id, $customer_name);
            if ($result) {
                $this->session->set_flashdata('message', 'Booking successful!');
            } else {
                $this->session->set_flashdata('message', 'This slot is already booked.');
            }
            redirect('user/dashboard'); // Redirect back to the booking page
        }
    }

	/*-----------start setting header and footer --------------*/

	public function setHeaderFooter($view, $data)
	{	

		$this->load->view($this->header_page, $data);
		$this->load->view($this->leftMenu, $data);
		$data['message']=$this->load->view('user/includes/message',$data,TRUE);
		$this->load->view($view, $data);
		$this->load->view($this->footer_Page);
	}

	public function change_password(){

		checkUserLogin();

		$this->data=array();
		if($this->input->post('submit')!='')
		{
						//echo '<pre>';print_r($this->input->post());exit;

			if($this->my_model->password_check() != 0)
			{ 
				//echo '<pre>';print_r($this->input->post());exit;

				if($this->input->post('conf_pwd') == $this->input->post('new_pwd')){
					$changepass=$this->my_model->change_password_2();
					
					if($changepass)
					{
						$this->session->set_flashdata('success', 'Password has been Changed Sucessfully...');
						redirect($this->pwd_redirect);
					}
					
				}else{
					$this->session->set_flashdata('error', 'You have entered new and cofirm password does not match');
				    redirect($this->pwd_redirect);
				}
			}
			else
			{		
				$this->session->set_flashdata('error', 'You have entered wrong Password,old records does not match..!');
				redirect($this->pwd_redirect);
			}
		
		}
		// if($this->session->userdata('user_id') != 'ADM0001'){
		//  $this->data['roleResponsible'] = $this->common_model->get_responsibilities();
	 //     }else{
		//  $this->data['roleResponsible'] = $this->common_model->get_default_responsibilities();
		//  }
		 $this->setHeaderFooter($this->change_password_page,$this->data);
	}

	public function logout(){
		$this->my_model->logout_time();
	    $user_data = $this->session->all_userdata();
			foreach ($user_data as $key => $value) {
				
					$this->session->unset_userdata($key);
			
			}
			
			$this->session->sess_destroy();
			$this->session->set_flashdata( 'message', 'Successfully Logout..' );
			//$this->data['logout_message']="Successfully Logout..";
            redirect(base_url('user'));
    }
  
   





}