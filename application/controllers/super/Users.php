<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	// LOAD DEFAULT CONSTRUCTOR FUNCTION //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model', 'urs');
	}
	// LOAD DEFAULT INDEX PAGE //
	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$data['users'] = $this->urs->get_all_users_list();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/viewUsers',$data);
	 	$this->load->view('super/includes/footer');
	}
	// GENERATE USERNAME USING SCHOOL ID AND RANDOM FUNCTION //
	public function generateUserName()
	{
		$school_id = $this->input->post('school_id');
		$result['scode'] = $this->urs->get_school_code_by_id($school_id);
		$result['rcode'] = rand(100000, 999999);
		$result['spass'] = uniqid(999);
		if($result){
			echo json_encode($result);
		}else{

		}
	}
	// CHECK EMAIL ADDRESS FROM DATABASE //
	public function checkEmail()
	{
		$emailid = $this->input->post('email');
		if(!empty($emailid)){
			$result = $this->urs->check_users_email_availability($emailid);
			if($result){
				echo "fail";
			}else{
				echo "ok";
			}
		}
	}
	// ADD USER INFORMATION //
	public function add()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$master_id = $this->uri->segment(4);
		$user_id = $this->uri->segment(5);
		$data['users'] = $this->urs->get_user_info_by_id($user_id,$master_id);

		$data['schools'] = $this->urs->get_all_schools_list();
		$data['roles'] = $this->urs->get_all_roles_list();

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addUsers',$data);
		$this->load->view('super/includes/footer');
	}
	// SAVE USER INFORMATION //
	public function create()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$session_id = $reference['cms_ref_id'];

		$data = $this->input->post();
		if(!empty($data)){
			$masterArray = array(
				'cms_ref_id' => $this->input->post('userid'),
				'cms_email' => $this->input->post('user_email'),
				'cms_password' => $this->input->post('password'),
				'cms_role' => $this->input->post('roles'),
				'cms_status' => '0',
				'cms_create_date' => date('Y-m-d H:i:s')
			);
			$master_id = $this->urs->save_user_info_master_table($masterArray);
			// CREATE USER INFORMATION //
			$usersArray = array(
				'cms_id' => $master_id,
				'schl_id' => $this->input->post('school_name'),
				'urs_name' => $this->input->post('user_name'),
				'urs_email' => $this->input->post('user_email'),
				'urs_mobile' => $this->input->post('mobile_no'),
				'urs_address' => $this->input->post('address'),
				'urs_qualification' => $this->input->post('qualification'),
				'roles_id' => $this->input->post('roles'),
				'urs_username' => $this->input->post('userid'),
				'urs_password' => $this->input->post('password'),
				'urs_status' => '0',
				'urs_created_by_who' => $session_id,
				'urs_created' => date('Y-m-d H:i:s')
			);
			$result = $this->urs->save_users_information($usersArray);
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">User created successfully.</span>');
				redirect('super/users');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">User creation failed.</span>');
				redirect('super/roles/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">User information are blank.</span>');
			redirect('super/roles');
		}
	}
	// UPDATE USER RECORD BY USER ID AND MASTER ID //
	public function update()
	{
		$data = $this->input->post();
		//print_r($data);die;
		if(!empty($data)){

			$userid = $this->input->post('user_id');
			$masterid = $this->input->post('master_id');

			// CREATE USER INFORMATION //
			$masterUpdateArray = array(
				'cms_ref_id' => $this->input->post('userid'),
				'cms_email' => $this->input->post('user_email'),
				'cms_password' => $this->input->post('password'),
				'cms_role' => $this->input->post('roles'),
				'cms_updated' => date('Y-m-d H:i:s')
			);
			$update_id = $this->urs->update_user_info_master_table($masterid,$masterUpdateArray);

			// CREATE USER INFORMATION //
			$usersUpdateArray = array(
				'schl_id' => $this->input->post('school_name'),
				'urs_name' => $this->input->post('user_name'),
				'urs_email' => $this->input->post('user_email'),
				'urs_mobile' => $this->input->post('mobile_no'),
				'urs_address' => $this->input->post('address'),
				'urs_qualification' => $this->input->post('qualification'),
				'roles_id' => $this->input->post('roles'),
				'urs_username' => $this->input->post('userid'),
				'urs_password' => $this->input->post('password'),
				'urs_updated' => date('Y-m-d H:i:s')
			);
			$result = $this->urs->update_users_information($userid,$usersUpdateArray);
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">User Updated successfully.</span>');
				redirect('super/users');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">User updated failed.</span>');
				redirect('super/roles/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">User information are blank.</span>');
			redirect('super/roles');
		}
	}
	// DELETE USER RECORD FROM DATABASE //
	public function delete()
	{
		$master_id = $this->uri->segment(4);
		$user_id = $this->uri->segment(5);
		$master_table = $this->urs->delete_users_from_master($master_id);
		if($master_table){
			$result = $this->urs->delete_user_info($user_id, $master_id);
			if($result){
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">User Deleted successfully.</span>');
				redirect('super/users');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">User not removed.</span>');
				redirect('super/users');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">User delettion process failed.</span>');
			redirect('super/users');
		}
	}
}