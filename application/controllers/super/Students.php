<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	// LOAD CONSTRUCTOR FUNCTION HERE //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Students_model', 'std');
	}
	// DEFAULT INDEX PAGE LOAD //
	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['students'] = $this->std->get_all_students_list();

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/viewStudents',$data);
		$this->load->view('super/includes/footer');
	}
	// GET CLASS LIST ACCORDING SCHOOL ID //
	public function getClassListBySchoolId($shoolid)
	{
		$data = $this->std->get_class_list_by_id($shoolid);
    	echo json_encode($data);
	}
	// GET SECTION LIST BY CLASS ID //
	public function getSectionListByClassId($classid)
	{
		$data = $this->std->get_section_list_by_id($classid);
    	echo json_encode($data);
	}
	// ADD STUDENTS PAGES //
	public function add()
	{   
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['ref_id']  = $this->std->getReferenceID();
		$data['schools'] = $this->std->get_school_list();
		$data['parents'] = $this->std->get_parents_list();
		$data['role'] = $this->std->get_student_role_id();
		// $data['classes'] = $this->std->get_class_list_by_id();
		// $data['section'] = $this->std->get_section_list();

		$stud_id = $this->uri->segment(4);
		$data['stud_info'] = $this->std->get_student_detail_by_id($stud_id);

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addStudents',$data);
		$this->load->view('super/includes/footer');
	}
	// CHECK EMAIL ADDRESS FROM DATABASE //
	public function checkStudentsEmail()
	{
		$emailid = $this->input->post('email');
		if(!empty($emailid)){
			$result = $this->std->check_student_email_availability($emailid);
			if($result){
				echo "fail";
			}else{
				echo "ok";
			}
		}
	}
	// CHECK MOBILE ADDRESS FROM DATABASE //
	public function checkStudentsMobile()
	{
		$mobile = $this->input->post('mobile');
		if(!empty($mobile)){
			$result = $this->std->check_student_mobile_availability($mobile);
			if($result){
				echo "fail";
			}else{
				echo "ok";
			}
		}
	}
	// CREATE STUDENTS PROFILE //
	public function create()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$session_id = $reference['cms_ref_id'];

		$data = $this->input->post();
		//print_r($data);die;
		if(!empty($data)){
			$masterArray = array(
				'cms_ref_id' => $this->input->post('student_username'),
				'cms_email' => $this->input->post('student_email'),
				'cms_password' => $this->input->post('student_password'),
				'cms_role' => $this->input->post('role_id'),
				'cms_status' => '0',
				'cms_create_date' => date('Y-m-d H:i:s')
			);
			$master_id = $this->std->save_student_info_master_table($masterArray);
			// CREATE USER INFORMATION //
			$studentsArray = array(

				'cms_id' => $master_id,
				'roles_id' => $this->input->post('role_id'),
				'schl_id' => $this->input->post('school_id'),
				'prnt_id' => $this->input->post('parents_id'),
				'cls_id' => $this->input->post('class_name'),
				'sect_id' => $this->input->post('section_name'),
				'stud_name' => $this->input->post('student_name'),
				'stud_dob' => $this->input->post('student_dob'),
				'stud_religion' => $this->input->post('student_religion'),
				'stud_place_of_birth' => $this->input->post('student_pob'),
				'stud_gender' => $this->input->post('gender'),
				'stud_blood_group' => $this->input->post('student_bgroup'),
				'stud_email' => $this->input->post('student_email'),
				'stud_mobile_no' => $this->input->post('student_mobile'),
				'stud_address' => $this->input->post('student_address'),
				'stud_country' => $this->input->post('country'),
				'stud_pincode' => $this->input->post('student_pcode'),
				'stud_about_yourself' => $this->input->post('student_remark'),
				'stud_ref_id' => $this->input->post('student_username'),
				'stud_password' => $this->input->post('student_password'),
				'stud_created_by_who' => $session_id,
				'stud_status' => '0',
				'stud_created_at' => date('Y-m-d H:i:s')

			);
			$student_id = $this->std->save_student_information($studentsArray);
			// SAVE PARENTS PROFILE PICTURE //
			if(!empty($_FILES['userfile']['name'])){

	            $_FILES['file']['name']     = $_FILES['userfile']['name'];
	            $_FILES['file']['type']     = $_FILES['userfile']['type'];
	            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
	            $_FILES['file']['error']    = $_FILES['userfile']['error'];
	            $_FILES['file']['size']     = $_FILES['userfile']['size'];
	            
	            // File upload configuration
	            $uploadPath = 'uploads/students/profile/';
	            $config['upload_path'] = $uploadPath;
	            $config['allowed_types'] = 'jpg|jpeg|png|gif';
	            
	            // Load and initialize upload library
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            $this->upload->do_upload('file');
	            // Upload file to server

	            // Uploaded file data
	            $fileData = $this->upload->data();
	            $uploadData['stud_picture'] = $uploadPath.''.$fileData['file_name'];
	            
	            //print_r($uploadData);die;
	        	$result = $this->std->save_student_profile_picture($uploadData,$student_id);
		    }
			// END OF PROFILE PICTURE //
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Student created successfully.</span>');
				redirect('super/students/add');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Student creation failed.</span>');
				redirect('super/students/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Student information are blank.</span>');
			redirect('super/students');
		}
	}
	// UPDATE STUDENT UPDATE //
	public function update()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data = $this->input->post();
		//print_r($data);die;
		if(!empty($data)){

			$student_id = $this->input->post('student_id');
			$masterid = $this->input->post('master_id');

			// CREATE USER INFORMATION //
			$masterUpdateArray = array(
				'cms_email' => $this->input->post('student_email'),
				'cms_updated' => date('Y-m-d H:i:s')
			);
			$update_id = $this->std->update_student_info_master_table($masterid, $masterUpdateArray);

			// CREATE USER INFORMATION //
			$studentsUpdateArray = array(

				'schl_id' => $this->input->post('school_id'),
				'prnt_id' => $this->input->post('parents_id'),
				'cls_id' => $this->input->post('class_name'),
				'sect_id' => $this->input->post('section_name'),
				'stud_name' => $this->input->post('student_name'),
				'stud_dob' => $this->input->post('student_dob'),
				'stud_religion' => $this->input->post('student_religion'),
				'stud_place_of_birth' => $this->input->post('student_pob'),
				'stud_gender' => $this->input->post('gender'),
				'stud_blood_group' => $this->input->post('student_bgroup'),
				'stud_email' => $this->input->post('student_email'),
				'stud_mobile_no' => $this->input->post('student_mobile'),
				'stud_address' => $this->input->post('student_address'),
				'stud_country' => $this->input->post('country'),
				'stud_pincode' => $this->input->post('student_pcode'),
				'stud_about_yourself' => $this->input->post('student_remark'),
				'stud_updated' => date('Y-m-d H:i:s')

			);
			$this->std->update_student_information($student_id, $studentsUpdateArray);
			// SAVE PARENTS PROFILE PICTURE //
			if(!empty($_FILES['userfile']['name'])){

	            $_FILES['file']['name']     = $_FILES['userfile']['name'];
	            $_FILES['file']['type']     = $_FILES['userfile']['type'];
	            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
	            $_FILES['file']['error']    = $_FILES['userfile']['error'];
	            $_FILES['file']['size']     = $_FILES['userfile']['size'];
	            
	            // File upload configuration
	            $uploadPath = 'uploads/students/profile/';
	            $config['upload_path'] = $uploadPath;
	            $config['allowed_types'] = 'jpg|jpeg|png|gif';
	            
	            // Load and initialize upload library
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            $this->upload->do_upload('file');
	            // Upload file to server

	            // Uploaded file data
	            $fileData = $this->upload->data();
	            $uploadData['stud_picture'] = $uploadPath.''.$fileData['file_name'];
	            
	            //print_r($uploadData);die;
	        	$result = $this->std->save_student_profile_picture($uploadData,$student_id);
		    }
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Student Updated successfully.</span>');
				redirect('super/students');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Student updated failed.</span>');
				redirect('super/students/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Student information are blank.</span>');
			redirect('super/students');
		}
	}

	// STUDENTS PROFILE VIEW //
	public function profile()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$student_id = $this->uri->segment(4);

		$data['std_profile'] = $this->std->get_student_profile_by_id($student_id);

		$parentid = $this->std->get_parent_id_student_id($student_id);
		$data['prnt_profile'] = $this->std->get_parent_profile_by_id($parentid, $student_id);

		$classid = $this->std->get_class_by_id_student_id($student_id);
		$data['classes'] = $this->std->get_class_by_studentid($student_id,$classid);

		$sectionid = $this->std->get_sectionby_id_student_id($student_id);
		$data['section'] = $this->std->get_section_by_studentid($student_id,$sectionid);

		// echo "<pre>";
		// print_r($data);die;

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/viewStudentsProfile',$data);
		$this->load->view('super/includes/footer');
	}
	// DELETE PARENTS RECORD FROM DATABASE //
	public function delete()
	{

		$master_id = $this->uri->segment(4);
		$student_id = $this->uri->segment(5);

		$master_table = $this->std->delete_student_from_master($master_id);

		if($master_table){
			$result = $this->std->delete_student_info($student_id, $master_id);
			if($result){
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Student Deleted successfully.</span>');
				redirect('super/students');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Student not removed.</span>');
				redirect('super/students');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Student delettion process failed.</span>');
			redirect('super/students');
		}
	}
}
