<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timetable extends CI_Controller {

	//CALL CONSTRUCTOR FUNCTION //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TimeTable_model', 'tmtl');
		$this->load->model('Schools_model', 'schl');
	}

	public function index()
	{
	 	$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['schools'] = $this->schl->get_schools_information_list();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header',$data);
	 	$this->load->view('super/viewTimeTable');
	 	$this->load->view('super/includes/footer');
	}
	// FILTER CLASS BASED ON SCHOOL ID //
	public function get_class_list()
	{
		$schl_id = $this->input->post('schl_id');
		//print_r($schl_id);
		$result['cls_info']  = $this->tmtl->get_class_by_school_id($schl_id);
		echo json_encode($result); 
	}
	public function get_sections_list()
	{
		$cls_id = $this->input->post('cls_id');
		$result['sect_info']  = $this->tmtl->get_sect_by_school_id($cls_id);
		echo json_encode($result); 
	}
	// GET SECTION LIST //
	public function get_section_list_for_classs()
	{
		$cls_id = $this->input->post('classid');
		$result  = $this->tmtl->get_sect_by_school_id($cls_id);
		echo json_encode($result); 
	}
	// FILTER SUBJECTS LIST //
	public function get_subjects_list_for_school()
	{
		$schl_id = $this->input->post('schl_id');
		//print_r($schl_id);
		$result['subject_info']  = $this->tmtl->get_subjects_by_school_id($schl_id);
		echo json_encode($result);
	}

	// GET TEACHER LIST BY SCHOOL ID //
	public function get_teachers_list_for_school()
	{
		$schl_id = $this->input->post('schl_id');
		//print_r($schl_id);
		$result['teachers_info']  = $this->tmtl->get_teacher_by_school_id($schl_id);
		echo json_encode($result);
	}

	// SAVE TIME TABLE //
	public function save_time_table()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$tmtlArray = array(
				'schl_id' => $this->input->post('timeSchoolId'),
				'tmtl_session_year' => $this->input->post('session'),
				'cls_id' => $this->input->post('timeClassId'),
				'sect_id' => $this->input->post('sectionid'),
				'sub_id' => $this->input->post('subjectid'),
				'tmtl_days' => $this->input->post('days'),
				'tchr_id' => $this->input->post('teacherid'),
				'tmtl_time_from' => $this->input->post('timefrom'),
				'tmtl_time_to' => $this->input->post('timeto'),
				'tmtl_created' => date('Y-m-d H:i:s')
			);
			$result = $this->tmtl->save_timetable($tmtlArray);
        	if($result){
        		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Time Table Created Successfully.</span>');
        		echo "upload";
        	}else{
        		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 6px;">Time Table Created Failed.</span>');
        		echo "failed";
        	}		
		}else{
			$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">fields are blank.</span>');
	    	echo "blank";
		}
	}
	// GET STUDENTS LIST BY SCHOOL ID AND CLASS ID //
	public function get_timetable_search_result(){
		// $data = $this->input->post();
		// print_r($data);
		$srchSchlId = $this->input->post('srchSchlId');
		$srchClsId  = $this->input->post('srchClsId');
		$srchSecId  = $this->input->post('srchSecId');
		$data['tmtl_result'] = $this->tmtl->get_timetable_result_by_filter($srchSchlId, $srchClsId, $srchSecId);
		echo json_encode($data);
	}
	
}
