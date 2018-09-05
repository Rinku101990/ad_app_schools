<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	// INITIALIZE CONSTRUCTOR FUNCTION //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Students_activities_model','sam');
	}

	// LOAD STUDENTS DASHBOARD //
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

		// echo "<pre>";
		// print_r($data);die;

		$this->load->view('students/includes/header',$data);
		$this->load->view('students/includes/sidebar');
		$this->load->view('students/includes/top_header');
		$this->load->view('students/index');
		$this->load->view('students/includes/footer');
	}

	// VIEW ALL UNREAD NOTIFICATION //
	public function get_latest_notifications()
  	{
	    $reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$stu_id = $reference['cms_id'];
		$stu_role = $reference['cms_role'];
		
		$data['profile'] = $this->sam->get_students_profile_record($stu_id,$stu_role);
		$studentid 	 = $data['profile']->stud_id;
		$studentrole = $data['profile']->roles_id;

	    $result['newmsg'] = $this->sam->get_latest_last_notification($studentid,$studentrole);

	    // echo $system_dateTime = date('Y-m-d H:i:s');
	    // echo $notify_dateTime = $result['newmsg']->rpnt_created;
	    // //echo "<pre>";
	    // //print_r($notify_dateTime);die;
	    // die;

	    echo json_encode($result);
  	}

  	// GET ALL UNREAD NOTIFICATION LIST OF STUDENTS //
  	public function mark_read_notification_on_click()
  	{
  		
  	}
}
