<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Marks extends CI_Controller {

	// // LOAD CONSTRUCTOR FUNCTION TO INITIALIZE CLASS OBJECTS //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Students_activities_model', 'sam');

	}
	// // VIEW ALL UNREAD NOTIFICATION //
	public function index()
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

		$data['notify_list'] = $this->sam->get_all_notifications_list_read_unread($studentid,$studentrole);

		// echo "<pre>";
		// print_r($data);die;
		
		$this->load->view('students/includes/header', $data);
		$this->load->view('students/includes/sidebar');
		$this->load->view('students/includes/top_header');
		$this->load->view('students/viewMarksBySemister');
		$this->load->view('students/includes/footer');
  	}

}