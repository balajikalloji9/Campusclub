<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Slots extends CI_Controller {

	public $header_page= 'admin/includes/header';
	public $footer_Page= 'admin/includes/footer';
	public $leftMenu  = 'admin/includes/left_menu';
	public $calender_Page = 'admin/slots/list_calender';
	
	
	
	public function __construct()
	{
	parent::__construct();
	$this->load->model('admin/daily_sheet_model','my_model');
	$this->load->model('Common_model','common_model');
	checkAdminLogin();
	 // if($this->session->userdata('user_id') != 'ADM0001'){
	 // $this->data['roleResponsible'] = $this->common_model->get_responsibilities();
  //    }else{
	 // $this->data['roleResponsible'] = $this->common_model->get_default_responsibilities();
	 // }
	}

	public function index(){
		redirect(base_url().'admin/slots/calender');
	}

	public function calender(){
		if($this->uri->segment(4) == ''){
			 $this->data['search_date']=$search_date=date('Y-m-d');
			 $this->data['search_value']='today';
		}else{
			 $this->data['search_date']=$search_date=$this->uri->segment(4);
			 $this->data['search_value']='search';
		}
		 //echo '<pre>';print_r($search_date);exit;
		 // $this->data['daily_approved_incomes']=$this->my_model->get_daily_approved_incomes($search_date);
		 // $this->data['daily_approved_expenses']=$this->my_model->get_daily_approved_expenses($search_date);
		 //echo '<pre>';print_r($this->data['daily_approved_expenses']);exit;

		 $this->data['calendar'] = $this->my_model->generate_calendar();

		 $this->setHeaderFooter($this->calender_Page,$this->data);
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
            redirect('admin/slots'); // Redirect back to the booking page
        }
    }


	/*-----------start setting header and footer --------------*/

	public function setHeaderFooter($view, $data)
	{	

		$this->load->view($this->header_page, $data);
		$this->load->view($this->leftMenu, $data);
		$data['message']=$this->load->view('admin/includes/message',$data,TRUE);
		$this->load->view($view, $data);
		$this->load->view($this->footer_Page);
	}
  /*----------- stop setting header and footer --------------*/

}

?>