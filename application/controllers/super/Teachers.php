<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller {


	//CALL CONSTRUCTOR FUNCTION //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Teachers_model', 'tchr');
	}
	// LOAD ALL TEACHERS LIST  PAGE //
	public function index()
	{
	 	$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['teachers'] = $this->tchr->get_all_teachers_list();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/viewTeachers', $data);
	 	$this->load->view('super/includes/footer');
	}
	// FILL TEACHERS PROFILE CREATION FORM PAGE //
	public function add()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data['ref_id']  = $this->tchr->getReferenceID();
		$data['schools'] = $this->tchr->get_school_list();

		$tchr_id = $this->uri->segment(4);
		$data['tchr_info'] = $this->tchr->get_teacher_detail_by_id($tchr_id);

		$data['role'] = $this->tchr->get_teachers_role_id();

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addTeachers',$data);
		$this->load->view('super/includes/footer');
	}
	// CHECK TEACHER EMAIL AVAILABILITY //
	public function check_teachers_email()
	{
		$emailid = $this->input->post('email');
		if(!empty($emailid)){
			$result = $this->tchr->check_teachers_email_availability($emailid);
			if($result){
				echo "fail";
			}else{
				echo "ok";
			}
		}
	}
	// CHECK MOBILE ADDRESS FROM DATABASE //
	public function check_teacher_mobile()
	{
		$mobile = $this->input->post('mobile');
		if(!empty($mobile)){
			$result = $this->tchr->check_teacher_mobile_availability($mobile);
			if($result){
				echo "fail";
			}else{
				echo "ok";
			}
		}
	}
	// CREATE TEACHERS PROFILE //
	public function create()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$session_id = $reference['cms_ref_id'];

		$data = $this->input->post();
		
		if(!empty($data)){
			// TEACHER MASTER PROFILE INFORMATION //
			$teacherMasterArray = array(
				'cms_ref_id'=> $this->input->post('tchr_username'),
				'cms_password'=> $this->input->post('tchr_password'),
				'cms_email'=> $this->input->post('tchr_email'),
				'cms_role' => $this->input->post('teacher_id'),
				'cms_status'=> '0',
				'cms_create_date'=> date('Y-m-d'),
			);
			$master_id = $this->tchr->save_teachers_profile_in_master_table($teacherMasterArray);
			// TEACHER PROFILE INFORMATION //
			$teacherArray = array(
				'cms_id' 			=> $master_id,
				'roles_id' => $this->input->post('teacher_id'),
				'schl_id'		   	=> $this->input->post('school_name'),
				'tchr_name' 		=> $this->input->post('tchr_name'),
				'tchr_designation' 	=> $this->input->post('tchr_designation'),
				'tchr_dob' 			=> $this->input->post('tchr_dob'),
				'tchr_gender' 		=> $this->input->post('tchr_gender'),
				'tchr_religoin' 	=> $this->input->post('tchr_religoin'),
				'tchr_bloodGroup' 	=> $this->input->post('tchr_bgroup'),
				'tchr_mobile' 		=> $this->input->post('tchr_mobile'),
				'tchr_email' 		=> $this->input->post('tchr_email'),
				'tchr_address' 		=> $this->input->post('tchr_address'),
				'tchr_country' 		=> $this->input->post('tchr_country'),
				'tchr_qualification'=> $this->input->post('tchr_qualification'),
				'tchr_expertise'	=> $this->input->post('tchr_expertise'),
				'tchr_joiningDate' 	=> $this->input->post('tchr_joining'),
				'tchr_salary' 		=> $this->input->post('tchr_salary'),
				'tchr_reference_id' => $this->input->post('tchr_username'),
				'tchr_password' 	=> $this->input->post('tchr_password'),
				'tchr_created_by_who'=> $session_id,
				'tchr_status' 		=> '0',
				'tchr_created_at' 	=> date('Y-m-d H:i:s')
			);
			$teacher_id = $this->tchr->save_teacher_profile($teacherArray);
			// SAVE PARENTS PROFILE PICTURE //
			if(!empty($_FILES['userfile']['name'])){

	            $_FILES['file']['name']     = $_FILES['userfile']['name'];
	            $_FILES['file']['type']     = $_FILES['userfile']['type'];
	            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
	            $_FILES['file']['error']    = $_FILES['userfile']['error'];
	            $_FILES['file']['size']     = $_FILES['userfile']['size'];
	            
	            // File upload configuration
	            $uploadPath = 'uploads/teachers/profile/';
	            $config['upload_path'] = $uploadPath;
	            $config['allowed_types'] = 'jpg|jpeg|png|gif';
	            
	            // Load and initialize upload library
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            $this->upload->do_upload('file');
	            // Upload file to server

	            // Uploaded file data
	            $fileData = $this->upload->data();
	            $uploadData['tchr_picture'] = $uploadPath.''.$fileData['file_name'];
	            
	            //print_r($uploadData);die;
	        	$result = $this->tchr->save_teacher_profile_picture($uploadData,$teacher_id);
		    }
			// END OF PROFILE PICTURE //
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Teacher profile created successfully.</span>');
				redirect('super/teachers/add');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Teacher profile creation failed.</span>');
				redirect('super/teachers/add');
			}
		}else{

		}
	}
	// UPDATE TEACHER PROFILE //
	public function update()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data = $this->input->post();
		//print_r($data);die;
		if(!empty($data)){

			$teacher_id = $this->input->post('teacher_id');
			//$masterid = $this->input->post('master_id');

			// CREATE USER INFORMATION //
			// $masterUpdateArray = array(
			// 	'cms_email' => $this->input->post('student_email'),
			// 	'cms_updated' => date('Y-m-d H:i:s')
			// );
			// $update_id = $this->std->update_student_info_master_table($masterid, $masterUpdateArray);

			// CREATE USER INFORMATION //
			$teacherUpdateArray = array(

				'schl_id' => $this->input->post('school_name'),
				'tchr_name' => $this->input->post('tchr_name'),
				'tchr_designation' => $this->input->post('tchr_designation'),
				'tchr_dob' => $this->input->post('tchr_dob'),
				'tchr_gender' => $this->input->post('tchr_gender'),
				'tchr_religoin' => $this->input->post('tchr_religoin'),
				'tchr_bloodGroup' => $this->input->post('tchr_bgroup'),
				'tchr_address' => $this->input->post('tchr_address'),
				'tchr_country' => $this->input->post('tchr_country'),
				'tchr_expertise' => $this->input->post('tchr_expertise'),
				'tchr_qualification' => $this->input->post('tchr_qualification'),
				'tchr_joiningDate' => $this->input->post('tchr_joining'),
				'tchr_salary' => $this->input->post('tchr_salary'),
				'tchr_updated' => date('Y-m-d H:i:s')

			);
			$this->tchr->update_teacher_information($teacher_id, $teacherUpdateArray);
			// SAVE PARENTS PROFILE PICTURE //
			if(!empty($_FILES['userfile']['name'])){

	            $_FILES['file']['name']     = $_FILES['userfile']['name'];
	            $_FILES['file']['type']     = $_FILES['userfile']['type'];
	            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
	            $_FILES['file']['error']    = $_FILES['userfile']['error'];
	            $_FILES['file']['size']     = $_FILES['userfile']['size'];
	            
	            // File upload configuration
	            $uploadPath = 'uploads/teachers/profile/';
	            $config['upload_path'] = $uploadPath;
	            $config['allowed_types'] = 'jpg|jpeg|png|gif';
	            
	            // Load and initialize upload library
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            $this->upload->do_upload('file');
	            // Upload file to server

	            // Uploaded file data
	            $fileData = $this->upload->data();
	            $uploadData['tchr_picture'] = $uploadPath.''.$fileData['file_name'];
	            
	            //print_r($uploadData);die;
	        	$result = $this->tchr->save_teacher_profile_picture($uploadData,$teacher_id);
		    }
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Teacher Updated successfully.</span>');
				redirect('super/teachers');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Teacher updated failed.</span>');
				redirect('super/teachers/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Teacher information are blank.</span>');
			redirect('super/teachers');
		}
	}
	// VIEW TEACHER PROFILE BY ID //
	public function profile()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$teachers_id = $this->uri->segment(4);

		$data['tchr_profile'] = $this->tchr->get_teacher_profile_by_id($teachers_id);

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/viewTeacherProfile', $data);
		$this->load->view('super/includes/footer');
	}

	// DELETE TEACHERS PROFILE //
	public function delete()
	{

		$master_id = $this->uri->segment(4);
		$teacher_id = $this->uri->segment(5);

		$master_table = $this->tchr->delete_teacher_from_master($master_id);

		if($master_table){
			$result = $this->tchr->delete_teacher_info($teacher_id, $master_id);
			if($result){
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Teacher Deleted successfully.</span>');
				redirect('super/teachers');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Teacher not removed.</span>');
				redirect('super/teachers');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Teacher delettion process failed.</span>');
			redirect('super/teachers');
		}
	}
}