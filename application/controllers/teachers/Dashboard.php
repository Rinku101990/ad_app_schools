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
		$this->load->model('Teachers_activities_model','tam');
	}
	public function index()
	{   
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$tchr_id = $reference['cms_id'];
		$tchr_role = $reference['cms_role'];

		$data['profile'] = $this->tam->get_teacher_profile_record($tchr_id,$tchr_role);
		$data['menus'] = $this->tam->get_menu_role_permissions($tchr_role);

		// echo "<pre>";
		// print_r($data);die;

		$this->load->view('teachers/includes/header',$data);
		$this->load->view('teachers/includes/sidebar');
		$this->load->view('teachers/includes/top_header');
		$this->load->view('teachers/index');
		$this->load->view('teachers/includes/footer');
	}
}
