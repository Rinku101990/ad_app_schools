<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importantlinks extends CI_Controller {
	
	/**
	 * Constructor for assignment model
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Importantlink_model', 'imprt');
		$this->load->model('Schools_model', 'schl');
	}

	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['schools'] = $this->schl->get_schools_information_list();
		$data['links'] = $this->imprt->get_all_important_links();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar', $data);
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/viewImportantlinks');
	 	$this->load->view('super/includes/footer');
	}
	// SAVE  IMPORTANT LINK //
	public function save_importantlinks()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$session_id = $reference['cms_ref_id'];

		$data = $this->input->post();
		if(!empty($data)){
			$imprtArray = array(
				'schl_id' => $this->input->post('imprt_school_id'),
				'imprt_name' => $this->input->post('imprt_name'),
				'imprt_url' => $this->input->post('imprt_url'),
				'imprt_status' => '0',
				'imprt_created_by' => $session_id,
				'imprt_created' => date("Y-m-d H:i:s")
			);

		    $result = $this->imprt->save_importantlinks_records($imprtArray);
        	if($result){
        		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Link Created Successfully.</span>');
        		echo "upload";
        	}else{
        		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Link Creation Failed.</span>');
        		echo "failed";
        	}
		}else{
			$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">fields are blank.</span>');
	    	echo "blank";
		}

	}

	// CHANGE ASSIGNMENTS STATUS //
	public function importantlinks_status_off()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$imprtid = $this->input->post('imprtIdOff');
			$value['imprt_status'] = $this->input->post('imprtValOff');
			//print_r($value);die;
			$result = $this->imprt->off_importantlinks_status_by_id($imprtid, $value);
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
	public function importantlinks_status_on()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$imprtid = $this->input->post('imprtIdOn');
			$value['imprt_status'] = $this->input->post('imprtValOn');
			$result = $this->imprt->on_importantlinks_status_by_id($imprtid, $value);
			if($result){
				echo "On";
			}else{
				echo "Off";
			}
		}else{
			echo "empty";
		}
	}

	// REMOVE IMPORTANT LINKS BY ID //
	public function remove()
	{
		$imprtid = $this->uri->segment(4);
		$result = $this->imprt->delete_importantlinks_info_by_id($imprtid);
		if($result){
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Links deleted Successfully.</span>');
			redirect('super/importantlinks');
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Links not delete.</span>');
			redirect('super/importantlinks');
		}
	}

}
