<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Holidays extends CI_Controller {

	/**
	 * HOLIDAYS RELATED FUNCTION HERE .
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Holidays_model', 'hlds');
		$this->load->model('Schools_model', 'schl');
	}

	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['schools'] = $this->schl->get_schools_information_list();
		$data['circulars'] = $this->hlds->get_circulars_information_list();
		$data['holidays'] = $this->hlds->get_all_holidays_list();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar', $data);
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/viewHolidays');
	 	$this->load->view('super/includes/footer');
	}
	// SAVE HOLIDAY RECORD HERE //
	public function save_holidays()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$session_id = $reference['cms_ref_id'];

		$data = $this->input->post();
		if(!empty($data)){
			$holidaysArray = array(
				'schl_id' => $this->input->post('holidays_schl_id'),
				'crcl_id' =>  $this->input->post('holidays_crcl_id'),
				'hldy_name' => $this->input->post('holidays_name'),
				'hldy_from_date' => $this->input->post('holidays_from_date'),
				'hldy_till_date' => $this->input->post('holidays_till_date'),
				'hldy_description' => $this->input->post('holidays_desciption'),
				'hldy_status' => '1',
				'hldy_created_by' => $session_id,
				'hldy_timestamps' => strtotime(date("Y-m-d H:i:s")),
				'hldy_created' => date("Y-m-d H:i:s")
			);

		    $result = $this->hlds->save_holidays_records($holidaysArray);
        	if($result){
        		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Holiday Created Successfully.</span>');
        		echo "saved";
        	}else{
        		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Holiday Creation Failed.</span>');
        		echo "failed";
        	}
		}else{
			$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">fields are blank.</span>');
	    	echo "blank";
		}
	}

	// CHANGE HOLIDAYS STATUS //
	public function holidays_status_off()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$hldyid = $this->input->post('hldyIdOff');
			$value['hldy_status'] = $this->input->post('hldyValOff');
			//print_r($value);die;
			$result = $this->hlds->off_holidays_status_by_id($hldyid, $value);
			if($result){
				echo "Off";
			}else{
				echo "On";
			}
		}else{
			echo "empty";
		}
	}
	// CHANGE ASSIGNMENTS STATUS ON BY THEIR ID //
	public function holidays_status_on()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$hldyid = $this->input->post('hldyIdOn');
			$value['hldy_status'] = $this->input->post('hldyValOn');
			$result = $this->hlds->on_holidays_status_by_id($hldyid, $value);
			if($result){
				echo "On";
			}else{
				echo "Off";
			}
		}else{
			echo "empty";
		}
	}

	// REMOVE HOLIDAY BY IDS //
	public function remove()
	{
		$hldyid = $this->uri->segment(4);
		$result = $this->hlds->delete_holidays_info_by_id($hldyid);
		if($result){
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Holiday deleted Successfully.</span>');
			redirect('super/holidays');
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Holiday not delete.</span>');
			redirect('super/holidays');
		}
	}
	
}
