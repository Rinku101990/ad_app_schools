<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sections extends CI_Controller {
	
	// LOAD CONSTRUCTOR  FUNCTION //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Section_model','sct');
	}
	// LOAD DEFAULT PAGE //	
	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data['sections'] = $this->sct->get_all_section_list();

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/viewSection',$data);
		$this->load->view('super/includes/footer');
	}
	// ADD SECTION PAGE //
	public function add()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$section_id = $this->uri->segment(4);
		$data['section_data'] = $this->sct->get_section_record_by_id($section_id);

		$data['schools'] = $this->sct->get_all_school_list();
		$data['classes'] = $this->sct->get_all_class_list();

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addSections',$data);
		$this->load->view('super/includes/footer');
	}
	// SAVE SECTION DETAIL IN DATABASE //
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
			$sectionArray = array(
				'schl_id' => $this->input->post('school_name'),
				'cls_id' => $this->input->post('class_name'),
				'sect_name' => $this->input->post('section_name'),
				'sect_category' => $this->input->post('category_name'),
				'sect_capacity' => $this->input->post('section_capacity'),
				'sect_created_by_who' => $session_id,
				'sect_status' => '0',
				'sect_created' => date('Y-m-d H:i:s')
			);
			$result = $this->sct->save_sections_info($sectionArray);
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Section created successfully.</span>');
				redirect('super/sections/add');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Section creation failed.</span>');
				redirect('super/sections/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Section information are blank.</span>');
			redirect('super/sections');
		}
	}
	// UPDATE CLASS INFORMATION //
	public function update()
	{
		$data = $this->input->post();
		//print_r($data);die;
		if(!empty($data)){

			$sectionid = $this->input->post('section_id');

			// CREATE USER INFORMATION //
			$sectionUpdateArray = array(
				'schl_id' => $this->input->post('school_name'),
				'cls_id' => $this->input->post('class_name'),
				'sect_name' => $this->input->post('section_name'),
				'sect_category' => $this->input->post('category_name'),
				'sect_capacity' => $this->input->post('section_capacity'),
				'sect_updated' => date('Y-m-d H:i:s')
			);
			$result = $this->sct->update_section_information($sectionid,$sectionUpdateArray);
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Section Updated successfully.</span>');
				redirect('super/sections');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Section updated failed.</span>');
				redirect('super/sections/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Section information are blank.</span>');
			redirect('super/sections');
		}
	}
	// DELETE CLASS INFORMATION //
	public function delete()
	{
		$sectionid = $this->uri->segment(4);
		$result = $this->sct->delete_section_info_by_id($sectionid);
		if($result){
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Section deleted successfully.</span>');
			redirect('super/sections');
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Section not delete.</span>');
			redirect('super/sections');
		}
	}
}