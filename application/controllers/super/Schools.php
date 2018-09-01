<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends CI_Controller {
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

	// LOAD CONSTRUCTOR FUNCTION  //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Schools_model', 'schl');
	}
	public function index()
	{
	 	$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data['schools'] = $this->schl->get_schools_information_list();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/viewSchools',$data);
	 	$this->load->view('super/includes/footer');
	}
	public function add()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$school_id = $this->uri->segment(4);
		$data['school_info'] = $this->schl->get_school_information_by_id($school_id);
		// echo "<pre>";
		// print_r($data);die;

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addSchools',$data);
		$this->load->view('super/includes/footer');
	}
	// SAVE SCHOOL INFORMATION //
	public function create()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$session_id = $reference['cms_ref_id'];

		$data = $this->input->post();
		if(!empty($data)){
			$schoolArray = array(
				'schl_type_name' => $this->input->post('schools_type'),
				'schl_code' => $this->input->post('schools_code'),
				'schl_name' => $this->input->post('schools_name'),
				'schl_phone_number' => $this->input->post('school_phone_no'),
				'schl_email_id' => $this->input->post('school_email_id'),
				'schl_web_url' => $this->input->post('school_web'),
				'schl_address' => $this->input->post('school_address'),
				'schl_country' => $this->input->post('school_country'),
				'schl_created_by_who' => $session_id,
				'schl_status' => '0',
				'schl_created' => date('Y-m-d H:i:s')
			);
			$result = $this->schl->save_school_information($schoolArray);
			if($result){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">School Registraton successfully.</span>');
				redirect('super/schools/add');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">School Registraton failed.</span>');
				redirect('super/schools/add');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">schools information are blank.</span>');
			redirect('super/schools');
		}
	}
	// UPDATE SCHOOL INFORMATION  BY ID //
	public function update()
	{
		$school_id = $this->input->post('school_id');
		$schoolArray = array(
			'schl_type_name' => $this->input->post('schools_type'),
			'schl_code' => $this->input->post('schools_code'),       
			'schl_name' => $this->input->post('schools_name'),
			'schl_phone_number' => $this->input->post('school_phone_no'),
			'schl_email_id' => $this->input->post('school_email_id'),
			'schl_web_url' => $this->input->post('school_web'),
			'schl_address' => $this->input->post('school_address'),
			'schl_country' => $this->input->post('school_country'),
			'schl_updated' => date('Y-m-d H:i:s')
		);
		$result = $this->schl->update_school_info_by_id($school_id,$schoolArray);
		if($result){
			$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">School updated successfully.</span>');
			redirect('super/schools');
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">School not updated.</span>');
			redirect('super/schools/add/'.$school_id);
		}
	}
	// DELETE SCHOOL INFORMATION //
	public function delete()
	{
		$school_id = $this->uri->segment(4);
		$result = $this->schl->delete_school_info_by_id($school_id);
		if($result){
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">School deleted successfully.</span>');
			redirect('super/schools');
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">School not delete.</span>');
			redirect('super/school');
		}
	}

	public function edit()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/editSchool');
		$this->load->view('super/includes/footer');
	}

}