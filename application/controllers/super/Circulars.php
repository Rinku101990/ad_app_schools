<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Circulars extends CI_Controller {

	/**
	 * HOLIDAYS RELATED FUNCTION HERE .
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Circulars_model', 'crcl');
	}

	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['circulars'] = $this->crcl->get_all_circulars_list();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar', $data);
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/viewCirculars');
	 	$this->load->view('super/includes/footer');
	}
	// SAVE HOLIDAY RECORD HERE //
	public function save_circulars()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data = $this->input->post();
		if(!empty($data)){
			$cicularsArray = array(
				'crcl_name' => $this->input->post('circulars_name'),
				'crcl_status' => $this->input->post('status'),
				'crcl_created' => date("Y-m-d H:i:s")
			);

		    $result = $this->crcl->save_circulars_records($cicularsArray);
        	if($result){
        		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Circular Created Successfully.</span>');
        		echo "saved";
        	}else{
        		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Circular Creation Failed.</span>');
        		echo "failed";
        	}
		}else{
			$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">fields are blank.</span>');
	    	echo "blank";
		}
	}

	// GET CIRCULARS DETAIL BY ID //
	public function get_circulars_detail()
	{
		$crcl_id = $this->input->post('crcl_id');
		$result['crcl_info'] = $this->crcl->get_circulars_details_by_id($crcl_id);
		echo json_encode($result); 
	}

	// UPDAE CIRCULARS //
	public function update_circulars()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data = $this->input->post();
		if(!empty($data)){
			$circl_id = $this->input->post('circulars_id');
			$updateCicularsArray = array(
				'crcl_name' => $this->input->post('circulars_name_update'),
				'crcl_status' => $this->input->post('status_update'),
				'crcl_updated' => date("Y-m-d H:i:s")
			);

		    $result = $this->crcl->update_circulars_records($circl_id, $updateCicularsArray);
        	if($result){
        		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Circular Updated Successfully.</span>');
        		echo "saved";
        	}else{
        		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Circular Updation Failed.</span>');
        		echo "failed";
        	}
		}else{
			$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">fields are blank.</span>');
	    	echo "blank";
		}
	}
	// CHANGE HOLIDAYS STATUS //
	public function circulars_status_off()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$crclid = $this->input->post('crclIdOff');
			$value['crcl_status'] = $this->input->post('crclValOff');
			//print_r($value);die;
			$result = $this->crcl->off_circulars_status_by_id($crclid, $value);
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
	public function circulars_status_on()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$crclid = $this->input->post('crclIdOn');
			$value['crcl_status'] = $this->input->post('crclValOn');
			$result = $this->crcl->on_circulars_status_by_id($crclid, $value);
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
		$crclid = $this->uri->segment(4);
		$result = $this->crcl->delete_circulars_info_by_id($crclid);
		if($result){
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Circular deleted Successfully.</span>');
			redirect('super/circulars');
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Circular not delete.</span>');
			redirect('super/circulars');
		}
	}
	
}
