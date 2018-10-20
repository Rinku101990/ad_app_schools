<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {

	// LOAD CONSTRUCTOR FUNCTION TO INITIALIZE CLASS OBJECTS //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Notification_model', 'ntm');

	}
	// ADD AND VIEW NOTIFICATION TEMPLATES //
	public function templates()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['templates'] = $this->ntm->get_all_notification_templates();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/addNotificationTemplates',$data);
	 	$this->load->view('super/includes/footer');
	}
	// ADD TEMPLATES //
	public function addTemplates()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$templateArray = array(
				'tmpl_name' => $this->input->post('template_name'),
				'tmpl_descriptions' => $this->input->post('template_description'),
				'tmpl_status' => '0',
				'tmpl_timestamp' => strtotime(date('Y-m-d H:i:s')),
				'tmpl_created' => date('Y-m-d H:i:s'),
			);

			$result = $this->ntm->save_notification_template($templateArray);
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Templates created successfully.</span>');
				redirect('super/notifications/templates');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Templates created Failed.</span>');
				redirect('super/notifications/templates');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Blank Fields.</span>');
			redirect('super/notifications/templates');
		}
	}
	// DELETE TEMPLATES //
	public function deleteTemplate()
	{
		$tmpl_id = $this->uri->segment(4);
		$result = $this->ntm->delete_template($tmpl_id);
		if($result){
			$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Templates Deleted successfully.</span>');
			redirect('super/notifications/templates');
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Templates deletion Failed.</span>');
			redirect('super/notifications/templates');
		}

	}
	// LOAD ALL NOTIFICATION  LIST HERE //
	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data['notify'] = $this->ntm->get_all_notification_list();
		$data['roles'] = $this->ntm->get_all_roles();
		
		// echo "<pre>";
		// print_r($data);die;

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/notificationLog', $data);
	 	$this->load->view('super/includes/footer');
	}

	// LOAD SEND NOTIFICATION PAGE TO PREPARE SEND NOTIFICATION //
	public function send()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$session_id = $reference['cms_id'];
		$data['schools'] = $this->ntm->get_all_school_list();
		$data['roles'] = $this->ntm->get_all_users_list();
		$data['templates'] = $this->ntm->get_all_templates();

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/sendNotification', $data);
		$this->load->view('super/includes/footer');
	}
	// GET TEMPLATE CONTENT BY SELECTION //
	public function get_templates_content()
	{
		$template_id = $this->input->post('tmplate_id');
		$result['description'] = $this->ntm->get_template_content_by_id($template_id);
		echo json_encode($result);
	}
	// GET NO OF RECIPIENTS //
	public function get_recipient()
	{
		$roleid = $this->input->post('role_id');
		$result = $this->ntm->get_recipient_by_role_id($roleid);

		$matches = [];
		$string = $result->cms_ref_id;

		if (preg_match("/[a-zA-Z]{3}/", $string, $matches)) 
		{

			if($matches[0]=="THR"){
				$teacher_role = $result->cms_role;
				$record['recipients'] = $this->ntm->get_teachers_by_role($teacher_role);
				//print_r($record);die;
				echo json_encode($record);
			}else if($matches[0]=="PRT"){
				$parents_role = $result->cms_role;
				$record['recipients'] = $this->ntm->get_parents_by_role($parents_role);
				echo json_encode($record);
			}else if($matches[0]=="STU"){
				$students_id = $result->cms_role;
				//$record['recipients'] = $this->ntm->get_students_by_role($students_id);
				$record['recipients'] = $this->ntm->get_all_class_list();
				echo json_encode($record);
			}else{
				$record['recipients'] = "0";
				echo json_encode($record);
			}
			
		}
		
	}
	// GET SECTION LIST BY CLASS ID //
	public function get_sections_content()
	{
		$cls_id = $this->input->post('cls_id');
		$record['sections'] = $this->ntm->get_all_sections_list_by_id($cls_id);
		echo json_encode($record);
	}
	// GET STUDENTS LIST BY SECTION ID //
	public function get_students_list()
	{
		$sect_id = $this->input->post('sect_id');
		$record['students'] = $this->ntm->get_all_students_by_section_by($sect_id);
		echo json_encode($record);
	}
	// CREATE PRIVATE NOTIFICATION //

	public function send_notifications()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$sender_id = $reference['cms_id'];
		$sender_ref_id = $reference['cms_ref_id'];

		$data = $this->input->post();

		// echo "<pre>";
		// print_r($data);die;

		if(!empty($data)){

			$notifyArray = array(
				'ntfn_sender_id' => $sender_id,
				'ntfn_sender_ref_id' => $sender_ref_id,
				'schl_id' => $this->input->post('school_name_id'),
				'roles_id' => $this->input->post('role_id'),
				'ntfn_notification_type' => $this->input->post('notification_type'),
				'ntfn_notification_message' => $this->input->post('notification_content'),
				'ntfn_status' => '0',
				'ntfn_timestamp' => strtotime(date('Y-m-d H:i:s')),
				'ntfn_created' => date('Y-m-d H:i:s')
			);
			$notify_id = $this->ntm->save_notification_message($notifyArray);

			// GET ALL RECEIVER LIST FOR NOTIFICATION //
			$receipent_id = $this->input->post('recipient_id');
			$receiverArray = array();
			for ($i=0; $i < count($receipent_id); $i++) {

	        $receiverArray[] = array(
						'ntfn_id' => $notify_id,
						'receiver_id' => $receipent_id[$i],
						'receiver_role' => $this->input->post('role_id'),
						'rpnt_status' => '0',
						'rpnt_created' => date('Y-m-d H:i:s')
		        );
		    }
		    $receiveid = $this->ntm->save_reciever_notification_list($receiverArray);

		    // SET NOTIFICATION CLASS LIST FOR STUDENTS //

		    $class_id = $this->input->post('class_name_id');

		    if(sizeof($class_id) > 1){

		    	$classArray = array();
				for ($i=0; $i < count($class_id); $i++) {

		        $classArray[] = array(
							'ntfn_id' => $notify_id,
							'cls_id' => $class_id[$i],
							'cnrc_status' => '0',
							'cnrc_created' => date('Y-m-d H:i:s')
			        );
			    }
			    $result = $this->ntm->save_batch_class_notification_list($classArray);

			    if($result){
					$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Notification Send successfully.</span>');
					redirect('super/notifications/send');
				}else{
					$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Notification Send Failed.</span>');
					redirect('super/notifications/send');
				}

		    }else if(sizeof($class_id)==1){

		    	$class_id = $this->input->post('class_name_id');

		    	for ($i=0; $i < count($class_id); $i++) {
			    	$clsArray = array(
			    		'ntfn_id' => $notify_id,
						'cls_id' => $class_id[$i],
						'cnrc_status' => '0',
						'cnrc_created' => date('Y-m-d H:i:s')
			    	);
			    }
		    	$clsID = $this->ntm->save_single_class_notification_list($clsArray);

		    	$sectid = $this->input->post('section_name_id');
			    $sectArray = array();
				for ($i=0; $i < count($sectid); $i++) {

		        $sectArray[] = array(
							'ntfn_id' => $notify_id,
							'cls_id' => $clsID,
							'sect_id' => $sectid[$i],
							'cnrb_status' => '0',
							'cnrb_created' => date('Y-m-d H:i:s')
			        );
			    }
			    $result = $this->ntm->save_section_notification_list($sectArray);

			    if($result){
					$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Notification Send successfully.</span>');
					redirect('super/notifications/send');
				}else{
					$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Notification Send Failed.</span>');
					redirect('super/notifications/send');
				}

		    }else{
		    	if($receiveid){
					$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Notification Send successfully.</span>');
					redirect('super/notifications/send');
				}else{
					$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Notification Send Failed.</span>');
					redirect('super/notifications/send');
				}
		    }

		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Blank Fields.</span>');
			redirect('super/notifications/send');
		}
	}

	// GET NOTIFICATION DETAIL //
	public function detail()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$ntfnid = $this->uri->segment(4);
		$roleid = $this->uri->segment(5);

		$data['details'] = $this->ntm->get_notification_detail_by_id($ntfnid, $roleid);
		$data['class'] = $this->ntm->get_all_class_list();
		$data['section'] = $this->ntm->get_all_section_list();

		$data['recipients'] = $this->ntm->get_no_of_recipient_list($ntfnid, $roleid);
		// echo "<pre>";
		// print_r($data);die;

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/notificationDetails', $data);
		$this->load->view('super/includes/footer');
	}
}