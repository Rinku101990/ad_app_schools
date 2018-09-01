<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

	// LOAD ROLE BASE CONSTRUCTOR //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Roles_model', 'role');
	}
	// LOAD ROLE LIST OF DEPARTMENTS //
	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data['roles'] = $this->role->get_role_information_list();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/viewRoles',$data);
	 	$this->load->view('super/includes/footer');
	}
	// ADD ROLE FOR DEPARTMENTS //
	public function add()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addRoles');
		$this->load->view('super/includes/footer');
	}
	// SAVE ROLE INFORMATION //
	public function create()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data = $this->input->post();
		if(!empty($data)){
			$rolesArray = array(
				'roles_name' => $this->input->post('role_name'),
				'roles_status' => '0',
				'roles_created' => date('Y-m-d H:i:s')
			);
			$result = $this->role->save_role_information($rolesArray);
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Role created successfully.</span>');
				redirect('super/roles/add');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Role creation failed.</span>');
				redirect('super/roles/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Role information are blank.</span>');
			redirect('super/roles');
		}
	}
	
	// // DELETE SCHOOL INFORMATION //
	public function delete()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$role_id = $this->uri->segment(4);
		
		$result = $this->role->delete_role_info_by_id($role_id);
		if($result){
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Role deleted successfully.</span>');
			redirect('super/roles');
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Role not delete.</span>');
			redirect('super/roles');
		}
	}

}