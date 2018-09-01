<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parents extends CI_Controller {
	
	// LOAD CONSTRUCTOR FUNCTION FOR OBJECT INITIALIZATION //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Parents_model', 'prt');
	}
	// DEFAULT PARENTS INDEX PAGE LOAD //
	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['parents'] = $this->prt->get_all_parents_lists();

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/viewParents',$data);
		$this->load->view('super/includes/footer');
	}
	// OPEN PARENT ADD SECTION TO ADD PARENTS //
	public function add()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['ref_id'] = $this->prt->getReferenceID();
		$prnt_id = $this->uri->segment(4);
		$data['prnt_info'] = $this->prt->get_parents_detail_by_id($prnt_id);
		$data['role'] = $this->prt->get_parents_role_id();

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addParents',$data);
		$this->load->view('super/includes/footer');
	}
	// CHECK EMAIL ADDRESS FROM DATABASE //
	public function checkParentsEmail()
	{
		$emailid = $this->input->post('email');
		if(!empty($emailid)){
			$result = $this->prt->check_parents_email_availability($emailid);
			if($result){
				echo "fail";
			}else{
				echo "ok";
			}
		}
	}
	// CHECK MOBILE ADDRESS FROM DATABASE //
	public function checkParentsMobile()
	{
		$mobile = $this->input->post('mobile');
		if(!empty($mobile)){
			$result = $this->prt->check_parents_mobile_availability($mobile);
			if($result){
				echo "fail";
			}else{
				echo "ok";
			}
		}
	}
	// CREATE PARENTS PROFILE //
	public function create()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$session_id = $reference['cms_ref_id'];

		$data = $this->input->post();
		//print_r($_POST);die;
		if(!empty($data)){
			$masterArray = array(
				'cms_ref_id' => $this->input->post('parent_username'),
				'cms_email' => $this->input->post('email_id'),
				'cms_password' => $this->input->post('parent_password'),
				'cms_role' => $this->input->post('parent_id'),
				'cms_status' => '0',
				'cms_create_date' => date('Y-m-d H:i:s')
			);
			$master_id = $this->prt->save_parents_info_master_table($masterArray);
			// CREATE USER INFORMATION //
			$parentsArray = array(

				'cms_id' => $master_id,
				'roles_id' => $this->input->post('parent_id'),
				'prnt_gaurdian_name' => $this->input->post('gaurdian_name'),
				'prnt_father_name' => $this->input->post('father_name'),
				'prnt_mother_name' => $this->input->post('mother_name'),
				'prnt_mobile_no' => $this->input->post('mobile_number'),
				'prnt_gender' => $this->input->post('gender'),
				'prnt_email' => $this->input->post('email_id'),
				'prnt_address' => $this->input->post('address'),
				'prnt_father_profession' => $this->input->post('father_profession'),
				'prnt_mother_profession' => $this->input->post('mother_profession'),
				'prnt_reference_id' => $this->input->post('parent_username'),
				'prnt_password' => $this->input->post('parent_password'),
				'prnt_created_by_who' => $session_id,
				'prnt_status' => '0',
				'prnt_created_at' => date('Y-m-d H:i:s')

			);
			$parent_id = $this->prt->save_parents_information($parentsArray);
			// SAVE PARENTS PROFILE PICTURE //
			if(!empty($_FILES['userfile']['name'])){

	            $_FILES['file']['name']     = $_FILES['userfile']['name'];
	            $_FILES['file']['type']     = $_FILES['userfile']['type'];
	            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
	            $_FILES['file']['error']    = $_FILES['userfile']['error'];
	            $_FILES['file']['size']     = $_FILES['userfile']['size'];
	            
	            // File upload configuration
	            $uploadPath = 'uploads/parents/profile/';
	            $config['upload_path'] = $uploadPath;
	            $config['allowed_types'] = 'jpg|jpeg|png|gif';
	            
	            // Load and initialize upload library
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            $this->upload->do_upload('file');
	            // Upload file to server

	            // Uploaded file data
	            $fileData = $this->upload->data();
	            $uploadData['prnt_picture'] = $uploadPath.''.$fileData['file_name'];
	            
	            //print_r($uploadData);die;
	        	$result = $this->prt->save_parents_profile_picture($uploadData,$parent_id);
		    }
			// END OF PROFILE PICTURE //
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Parent created successfully.</span>');
				redirect('super/parents');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Parent creation failed.</span>');
				redirect('super/parents/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Parent information are blank.</span>');
			redirect('super/parents');
		}
	}
	// UPDATE PARENTS UPDATE //
	public function update()
	{
		$data = $this->input->post();
		//print_r($data);die;
		if(!empty($data)){

			$parent_id = $this->input->post('parents_id');
			$masterid = $this->input->post('master_id');

			// CREATE USER INFORMATION //
			$masterUpdateArray = array(
				'cms_email' => $this->input->post('email_id'),
				'cms_updated' => date('Y-m-d H:i:s')
			);
			$update_id = $this->prt->update_parents_info_master_table($masterid, $masterUpdateArray);

			// CREATE USER INFORMATION //
			$parentsUpdateArray = array(

				'prnt_gaurdian_name' => $this->input->post('gaurdian_name'),
				'prnt_father_name' => $this->input->post('father_name'),
				'prnt_mother_name' => $this->input->post('mother_name'),
				'prnt_gender' => $this->input->post('gender'),
				'prnt_mobile_no' => $this->input->post('mobile_number'),
				'prnt_email' => $this->input->post('email_id'),
				'prnt_address' => $this->input->post('address'),
				'prnt_father_profession' => $this->input->post('father_profession'),
				'prnt_mother_profession' => $this->input->post('mother_profession'),
				'prnt_updated' => date('Y-m-d H:i:s')

			);
			$this->prt->update_parents_information($parent_id, $parentsUpdateArray);
			// SAVE PARENTS PROFILE PICTURE //
			if(!empty($_FILES['userfile']['name'])){

	            $_FILES['file']['name']     = $_FILES['userfile']['name'];
	            $_FILES['file']['type']     = $_FILES['userfile']['type'];
	            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
	            $_FILES['file']['error']    = $_FILES['userfile']['error'];
	            $_FILES['file']['size']     = $_FILES['userfile']['size'];
	            
	            // File upload configuration
	            $uploadPath = 'uploads/parents/profile/';
	            $config['upload_path'] = $uploadPath;
	            $config['allowed_types'] = 'jpg|jpeg|png|gif';
	            
	            // Load and initialize upload library
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            $this->upload->do_upload('file');
	            // Upload file to server

	            // Uploaded file data
	            $fileData = $this->upload->data();
	            $uploadData['prnt_picture'] = $uploadPath.''.$fileData['file_name'];
	            
	            //print_r($uploadData);die;
	        	$result = $this->prt->save_parents_profile_picture($uploadData,$parent_id);
		    }
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Parent Updated successfully.</span>');
				redirect('super/parents');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Parent updated failed.</span>');
				redirect('super/parents/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Parent information are blank.</span>');
			redirect('super/parents');
		}
	}
	// VIEW PARENT PRODILE BY ID //
	public function profile()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$prntid = $this->uri->segment(4);
		$data['profile'] = $this->prt->get_parent_profile($prntid);
		$data['stud_list'] = $this->prt->get_students_list($prntid);
		$data['class'] = $this->prt->get_class_name($prntid);
		$data['section'] = $this->prt->get_section_name($prntid);

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/viewParentProfile',$data);
		$this->load->view('super/includes/footer');
	}
	// DELETE PARENTS RECORD FROM DATABASE //
	public function delete()
	{

		$master_id = $this->uri->segment(4);
		$parents_id = $this->uri->segment(5);

		$master_table = $this->prt->delete_parents_from_master($master_id);

		if($master_table){
			$result = $this->prt->delete_parents_info($parents_id, $master_id);
			if($result){
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Parent Deleted successfully.</span>');
				redirect('super/parents');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Parent not removed.</span>');
				redirect('super/parents');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Parent delettion process failed.</span>');
			redirect('super/parents');
		}
	}

}