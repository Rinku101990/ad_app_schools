<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_attendance extends CI_Controller {

	// LOAD CONSTRUCTOR FUNCTION HERE //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Students_attendance_model', 'stdadnc');
		
	}

	public function index()
	{

	 	$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$session_id = $reference['cms_ref_id'];
		$data['schools'] = $this->stdadnc->get_school_list();
		
	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar',$data);
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/studentAttendance');
	 	$this->load->view('super/includes/footer');
	}
	// GET CLASS LIST BY SCHOOL ID //
	public function getClassListBySchoolId()
	{
		$schlid = $this->input->post('schoolid');
		$result['cls_info'] = $this->stdadnc->get_class_list_by_id($schlid);
		echo json_encode($result);
	}
	// GET SECTION LIST BY CLASS ID FOR STUDENT ATTENDANCE //
	public function getSectionListByClassId()
	{
		$classid = $this->input->post('classid');
		$result['sect_info'] = $this->stdadnc->get_section_list_by_id($classid);
		echo json_encode($result);
	}
	// SEARCH ATTENDANCE RELATED STUDENTS RECORD //
	public function search_attendance_records()
	{
		$data = $this->input->post();
		// /print_r($data);die;
		if(!empty($data)){
			$schlid = $this->input->post('school_name_id_attendance');
			$clsid = $this->input->post('class_name_id_attendance');
			$sectid = $this->input->post('section_name_id_attendance');
			$data['att_students'] = $this->stdadnc->get_attendnce_search_result($schlid, $clsid, $sectid);
			// echo "<pre>";
			// print_r($data);

			$this->load->view('super/includes/header');
		 	$this->load->view('super/includes/sidebar', $data);
		 	$this->load->view('super/includes/top_header');
		 	$this->load->view('super/viewStudentsForAttendance');
		 	$this->load->view('super/includes/footer');
		}else{
			redirect('super/students_attendance/add/');
		}
	}
	// MARK STUDENTS ATTENDANCE ONE BY ONE //
	public function mark_students_attendance_one_by_one()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$sessid = $reference['cms_ref_id'];

		$data = $this->input->post();
		if(!empty($data)){
			$studAtdnsArray = array(
				'stud_id' => $this->input->post('studid'),
				'cls_id' => $this->input->post('studcls'),
				'schl_id' => $this->input->post('studschl'),
				'sect_id' => $this->input->post('studSect'),
				'stdadc_present_status' => $this->input->post('studPresent'),
				'stdadc_present_type' => $this->input->post('studType'),
				'stdadc_created_by_attendance' => $sessid,
				'sub_id' => $this->input->post('studSub'),
				'stdadc_reason_for_leave' => $this->input->post('studReason'),
			);
			$result = $this->stdadnc->save_students_attendance_one_by_one($studAtdnsArray);
			if($result){
				echo "success";
			}else{
				echo "failed";
			}
		}
	}

	public function add()
	{

		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['schools'] = $this->stdadnc->get_school_list();

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar', $data);
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addStudAttendance');
		$this->load->view('super/includes/footer');
	}
	// GET STUDENTS ATTENDANCE SEARCH RESULT  //
	public function get_students_attendance_search_result()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$schlid = $this->input->post('school_id_filter_attendance');
			$clsid = $this->input->post('class_id_filter_attendance');
			$sectid = $this->input->post('section_id_filter_attendance');
			$attDate = $this->input->post('date_id_filter_attendance');
			$data['creator']  = $this->stdadnc->get_attendnce_creator_result($schlid, $clsid,$sectid);
			
			$data['totalStudents'] = $this->stdadnc->get_students_attendnce_search_result($schlid, $clsid, $sectid);
			
			$data['totalAttendance'] = $this->stdadnc->get_total_students_attendnce_search_result($schlid, $clsid, $sectid);
			if(empty($data['totalAttendance'])){
				redirect('super/students_attendance/');
			}else{
				$attendanceby = $data['totalAttendance'][0]->stdadc_created_by_attendance;
				//print_r($data);die;
				if($attendanceby=="ADM00001"){
					$data['admin'] = "Admin";
				}else{
					$data['attby'] = $this->stdadnc->get_name_attendance_by($attendanceby);
				}
				$this->load->view('super/includes/header');
				$this->load->view('super/includes/sidebar',$data);
				$this->load->view('super/includes/top_header');
				$this->load->view('super/viewStudentsSearchResult');
				$this->load->view('super/includes/footer');
			}
		}else{
			redirect('super/students_attendance/');
		}
	}
	public function view()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/viewStudent');
		$this->load->view('super/includes/footer');
	}
	public function month()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/stuMonthlyAttend');
		$this->load->view('super/includes/footer');
	}

}
