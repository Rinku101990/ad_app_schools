<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignments extends CI_Controller {
	/**
	 * Constructor for assignment model
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Assignments_model', 'asgn');
		$this->load->model('Schools_model', 'schl');
	}
	/**
	 * method for assignment index page
	 */
	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['schools'] = $this->schl->get_schools_information_list();
		$data['assignments'] = $this->asgn->get_all_assignments_list();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header', $data);
	 	$this->load->view('super/viewAssignments');
	 	$this->load->view('super/includes/footer');
	}

	// GET CLASS LIST BY SCHOOL ID //
	public function getClassListById()
	{
		$schl_id = $this->input->post('schoolid');
		$result['cls_info']  = $this->asgn->get_class_by_school_id($schl_id);
		echo json_encode($result); 
	}
	public function getsubjetcsListById()
	{
		$schl_id = $this->input->post('schoolid');
		$result['sub_info']  = $this->asgn->get_subjetcs_by_school_id($schl_id);
		echo json_encode($result); 
	}
	// GET ALL SECTION LIST BY CLASS ID //
	public function getSectionListById()
	{
		$classid = $this->input->post('classid');
		$result['sect_info']  = $this->asgn->get_section_by_school_id($classid);
		echo json_encode($result); 
	}
	public function getStudentListById()
	{
		$sectionid = $this->input->post('sectionid');
		$result['std_info']  = $this->asgn->get_students_by_school_id($sectionid);
		echo json_encode($result);
	}
	/**
	 * save assignments in database 
	 */
	public function save_assignments()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$session_id = $reference['cms_ref_id'];

		$data = $this->input->post();
		if(!empty($data)){
			$schlid 	= $this->input->post('asgn_school_id');
			$clsid 		= $this->input->post('asgn_class_id');
			$sectid 	= $this->input->post('asgn_section_id');
			$subid 		= $this->input->post('asgn_subject_id');
			$studid 	= $this->input->post('asgn_students_id');
			$asgnTitle  = $this->input->post('asgn_title');
			$asgnDesc   = $this->input->post('asgn_description');
			$asgnSubDate= $this->input->post('asgn_submission_date');

			if(!empty($_FILES['userfile']['name'])){

	            $_FILES['file']['name']     = $_FILES['userfile']['name'];
	            $_FILES['file']['type']     = $_FILES['userfile']['type'];
	            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
	            $_FILES['file']['error']    = $_FILES['userfile']['error'];
	            $_FILES['file']['size']     = $_FILES['userfile']['size'];
	            
	            // File upload configuration
	            $uploadPath = 'assignments/';
	            $config['upload_path'] = $uploadPath;
	            $config['allowed_types'] = 'jpg|jpeg|png|pdf|csv';
	            
	            // Load and initialize upload library
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            $this->upload->do_upload('file');
	            // Upload file to server

	            // Uploaded file data
	            $fileData = $this->upload->data();

	            $uploadData['schl_id'] = $schlid;
	            $uploadData['cls_id'] = $clsid;
	            $uploadData['sect_id'] = $sectid;
	            $uploadData['sub_id'] = $subid;
	            $uploadData['stud_id'] = $studid;
	            $uploadData['asgn_title'] = $asgnTitle;
	            $uploadData['asgn_atteched_file'] = $uploadPath.''.$fileData['file_name'];
	            $uploadData['asgn_description'] = $asgnDesc;
	            $uploadData['asgn_submission_date'] = $asgnSubDate;
	            $uploadData['asgn_assigned_by'] = $session_id;
	            $uploadData['asgn_created'] = date("Y-m-d H:i:s");
	            
	            //print_r($uploadData);die;

	        	$result = $this->asgn->save_assignment_records($uploadData);
	        	if($result){
	        		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Assignment Uploaded Successfully.</span>');
	        		echo "upload";
	        	}else{
	        		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 6px;">Assignment Uploaded Failed.</span>');
	        		echo "failed";
	        	}
		    }
		}else{
			$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">fields are blank.</span>');
	    	echo "blank";
		}
	}
	// CHANGE ASSIGNMENTS STATUS //
	public function assignments_status_off()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$asgnid = $this->input->post('asgnIdOff');
			$value['asgn_status'] = $this->input->post('asgnValOff');
			//print_r($value);die;
			$result = $this->asgn->off_assignments_status_by_id($asgnid, $value);
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
	public function assignments_status_on()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$asgnid = $this->input->post('asgnIdOn');
			$value['asgn_status'] = $this->input->post('asgnValOn');
			$result = $this->asgn->on_assignments_status_by_id($asgnid, $value);
			if($result){
				echo "On";
			}else{
				echo "Off";
			}
		}else{
			echo "empty";
		}
	}
	// REMOVE ASSIGNMENTS BY ID //
	public function remove()
	{
		$asgnid = $this->uri->segment(4);
		$result = $this->asgn->delete_assignment_info_by_id($asgnid);
		if($result){
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Assignment deleted Successfully.</span>');
			redirect('super/assignments');
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Assignment not delete.</span>');
			redirect('super/assignments');
		}
	}

	// SEARCH ASSIGNMENT BY MULTI PARAMETER //
	public function get_assignment_search_result()
	{
		$srchAsgnSchlId = $this->input->post('srchAsgnSchlId');
		$srchAsgnClsId  = $this->input->post('srchAsgnClsId');
		$srchAsgnSecId  = $this->input->post('srchAsgnSecId');
		$data['asgn_result'] = $this->asgn->get_assignments_result_by_filter($srchAsgnSchlId, $srchAsgnClsId, $srchAsgnSecId);
		echo json_encode($data);
	}
}

