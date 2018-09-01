<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {
	
	// LOAD CONSTRUCTOR FUNCTION //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Class_model', 'cls');
	}
	// LOAD DEFAULT PAGE //
	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data['classes'] = $this->cls->get_all_classes();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/viewClasses',$data);
	 	$this->load->view('super/includes/footer');
	}
	// ADD CLASS INFORMATION IN DATABASE //
	public function add()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$class_id = $this->uri->segment(4);
		$data['classes'] = $this->cls->get_class_info_by_id($class_id);

		$data['schools'] = $this->cls->get_schools_information_list();

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addClasses',$data);
		$this->load->view('super/includes/footer');
	}
	// SAVE CLASS INFORMATION //
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
			$classArray = array(
				'schl_id' => $this->input->post('school_name'),
				'cls_name' => $this->input->post('class_name'),
				'cls_created_by_who' => $session_id,
				'cls_status' => '0',
				'cls_created' => date('Y-m-d H:i:s')
			);
			$result = $this->cls->save_class_info($classArray);
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Class created successfully.</span>');
				redirect('super/classes/add');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Class creation failed.</span>');
				redirect('super/classes/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Class information are blank.</span>');
			redirect('super/classes');
		}
	}
	// UPDATE CLASS INFORMATION //
	public function update()
	{
		$data = $this->input->post();
		//print_r($data);die;
		if(!empty($data)){

			$classid = $this->input->post('class_id');

			// CREATE USER INFORMATION //
			$classUpdateArray = array(
				'schl_id' => $this->input->post('school_name'),
				'cls_name' => $this->input->post('class_name'),
				'cls_updated' => date('Y-m-d H:i:s')
			);
			$result = $this->cls->update_class_information($classid,$classUpdateArray);
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Class Updated successfully.</span>');
				redirect('super/classes');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Class updated failed.</span>');
				redirect('super/classes/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Class information are blank.</span>');
			redirect('super/classes');
		}
	}
	// DELETE CLASS INFORMATION //
	public function delete()
	{
		$classid = $this->uri->segment(4);
		$result = $this->cls->delete_class_info_by_id($classid);
		if($result){
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Class deleted successfully.</span>');
			redirect('super/classes');
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Class not delete.</span>');
			redirect('super/classes');
		}
	}
}