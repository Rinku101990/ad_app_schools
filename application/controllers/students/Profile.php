<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	// INITIALIZE CONSTRUCTOR FUNCTION //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Students_activities_model','sam');
	}

	// VIEW STUDENT PROFILE //
	public function edit($id='')
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$stu_id = $reference['cms_id'];
		$stu_role = $reference['cms_role'];

		$data['profile'] = $this->sam->get_students_profile_record($stu_id,$stu_role);
		$data['menus']   = $this->sam->get_menu_role_permissions($stu_role);

		$studentid 	 = $data['profile']->stud_id;
		$studentrole = $data['profile']->roles_id;

		$data['message'] = $this->sam->get_all_unread_notification($studentid,$studentrole);
		$data['msg_list'] = $this->sam->get_all_unread_notification_detail_list($studentid,$studentrole);

		$id = $this->uri->segment(4);
		$data['view_profile'] = $this->sam->view_students_profile($id);
		//echo json_encode($data);
		// echo "<pre>";
		// print_r($data);

		$this->load->view('students/includes/header',$data);
		$this->load->view('students/includes/sidebar');
		$this->load->view('students/includes/top_header');
		$this->load->view('students/viewProfile');
		$this->load->view('students/includes/footer');
	}

	// UPDATE STUDENT PROFILE //

	public function update($id=''){

		$id = $this->input->post('profile_id');
		$mid = $this->input->post('master_id');

		$cpassword  = $this->input->post('cpass');
		$npassword  = $this->input->post('npass');
		$cnpassword = $this->input->post('cfpass');

		$oldPass = $this->sam->verify_old_password($mid, $cpassword);
		if($oldPass){
			if($npassword==$cnpassword){
				$studMasterPassArray = array(
					'cms_password' => $npassword,
					'cms_updated' => date('Y-m-d H:i:s')
				);
				$update_id = $this->sam->update_students_master_login_pass($mid, $studMasterPassArray);
				if($update_id){
					$studPassArray = array(
						'stud_password' => $npassword,
						'stud_updated' => date('Y-m-d H:i:s')
					);
					$final_id = $this->sam->update_students_profile_password($id, $mid, $studPassArray);
					$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Profile Password Changed successfully.</span>');
					redirect('students/profile/edit/'.$id);
				}else{
					$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Your Password updation failed.</span>');
					redirect('students/profile/edit/'.$id);
				}
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">New Password and Confirm New Password are not match.</span>');
				redirect('students/profile/edit/'.$id);
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Current Password are not match.</span>');
			redirect('students/profile/edit/'.$id);
		}
	}
}