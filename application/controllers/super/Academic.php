<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academic extends CI_Controller {
	
	// LOAD CONSTRUCTOR FUNCTION //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Academic_model', 'aca');
	}

	// DEFAULT LOAD ACADEMIC LIST PAGE //
	public function index()
	{
		$data['years'] = $this->aca->get_all_academic_year();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/viewAcademic', $data);
	 	$this->load->view('super/includes/footer');
	}

	// ADD ACADMIC YEAR //
	public function add()
	{	
		$academic_id = $this->uri->segment(4);
		$data['year_update'] = $this->aca->get_academic_year_by_id($academic_id);

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addAcademic',$data);
		$this->load->view('super/includes/footer');
	}

	// SAVE ACADEMIC YEAR FOR SCHOOLS //
	public function save()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$academicArray = array(
				'acad_start_year' => $this->input->post('date_to'),
				'acad_end_year' => $this->input->post('date_from'),
				'acad_status' => '1',
				'acad_created' => date('Y-m-d H:i:s')
			);
			$result = $this->aca->save_academic_year($academicArray);
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Academic year saved successfully.</span>');
				redirect('super/academic/add');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Academic year not saved.</span>');
				redirect('super/academic/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Blank fields.</span>');
			redirect('super/academic/add');
		}
	}
	// UPDATED ACADEMIC YEAR //
	public function update()
	{
		$year_id = $this->input->post('year_id');
		$acadDateArry = array(
			'acad_start_year' => $this->input->post('udate_to'),
			'acad_end_year' => $this->input->post('udate_from'),
			'acad_updated' => date('Y-m-d H:i:s')
		);
		$result = $this->aca->update_academic_year($year_id,$acadDateArry);
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Academic year updated successfully.</span>');
				redirect('super/academic');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Academic year not updated.</span>');
				redirect('super/academic/add');
			}
	}

	// DELETE ACADEMIC YEAR //
	public function delete()
	{
		$year_id = $this->uri->segment(4);
		$result = $this->aca->delete_academic_year($year_id);
			if($result){
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Academic year deleted successfully.</span>');
				redirect('super/academic');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Academic year not delete.</span>');
				redirect('super/academic');
			}
	}

}