<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syllabus extends CI_Controller {
	
	//CALL CONSTRUCTOR FUNCTION //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Syllabus_model', 'sylls');
		$this->load->model('Schools_model', 'schl');
	}

	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data['schools'] = $this->schl->get_schools_information_list();
		$data['syllabus'] = $this->sylls->get_all_syllabus_list();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header',$data);
	 	$this->load->view('super/viewSyllabus');
	 	$this->load->view('super/includes/footer');
	}


	// GET CLASS LIST BY SCHOOL ID //
	public function get_class_list()
	{
		$schl_id = $this->input->post('schl_id');
		//print_r($schl_id);
		$result['cls_info']  = $this->sylls->get_class_by_school_id($schl_id);
		echo json_encode($result); 
	}

	// SAVE SYLLABUS //
	public function save_syllabus()
	{
		$data = $this->input->post();
		//print_r($data);
		if(!empty($data)){
			$school_name = $this->input->post('school_name');
			$class_name = $this->input->post('class_name');
			$syllabus_name = $this->input->post('syllabus_name');
			$syllabus_desc = $this->input->post('syllabus_desc');
			
			if(!empty($_FILES['userfile']['name'])){

	            $_FILES['file']['name']     = $_FILES['userfile']['name'];
	            $_FILES['file']['type']     = $_FILES['userfile']['type'];
	            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
	            $_FILES['file']['error']    = $_FILES['userfile']['error'];
	            $_FILES['file']['size']     = $_FILES['userfile']['size'];
	            
	            // File upload configuration
	            $uploadPath = 'downloads/syllabus/';
	            $config['upload_path'] = $uploadPath;
	            $config['allowed_types'] = 'jpg|jpeg|png|pdf|csv';
	            
	            // Load and initialize upload library
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            $this->upload->do_upload('file');
	            // Upload file to server

	            // Uploaded file data
	            $fileData = $this->upload->data();

	            $uploadData['schl_id'] = $school_name;
	            $uploadData['cls_id'] = $class_name;
	            $uploadData['slbs_name'] = $syllabus_name;
	            $uploadData['slbs_attachments'] = $uploadPath.''.$fileData['file_name'];
	            $uploadData['slbs_description'] = $syllabus_desc;
	            $uploadData['slbs_created'] = date("Y-m-d H:i:s");
	            
	            //print_r($uploadData);
	        	$result = $this->sylls->save_syllabus($uploadData);
	        	if($result){
	        		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Syllabus Uploaded Successfully.</span>');
	        		echo "upload";
	        	}else{
	        		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Syllabus Uploaded Failed.</span>');
	        		echo "failed";
	        	}
		    }
		}else{
			$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">fields are blank.</span>');
	    	echo "blank";
		}
	}

	// REMOVE SYLLABUS //
	public function remove_syllabus()
	{
		$syllabusid = $this->uri->segment(4);
		$result = $this->sylls->delete_syllabus_by_id($syllabusid);
    	if($result){
    		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 4px;">Syllabus deleted Successfully.</span>');
    		redirect('super/syllabus');
    	}else{
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">Syllabus not deleted.</span>');
    		redirect('super/syllabus');
    	}
	}

	// REMOVE MULTIPL SYLLABUS RECORD HERE //
	public function remove_multiple_syllabus_record()
	{
		$syllabus_array = $this->input->post('selected_syllabusid');

		$sylls_id = explode(",",$syllabus_array);

		$result = $this->sylls->delete_multiple_syllabus_record_by_ids($sylls_id);
		if($result){
			$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 4px;">Syllabus deleted Successfully.</span>');
    		echo "success";
		}else{
			$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">Syllabus deletion failed.</span>');
    		echo "failed";
		}
	}


}
