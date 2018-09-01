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
		$this->load->model('Parents_activities_model','pam');
	}
	public function index()
	{   
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$prt_id = $reference['cms_id'];
		$prt_role = $reference['cms_role'];

		$data['profile'] = $this->pam->get_parent_profile_record($prt_id,$prt_role);
		$data['menus'] = $this->pam->get_menu_role_permissions($prt_role);

		// echo "<pre>";
		// print_r($data);die;

		$this->load->view('parents/includes/header',$data);
		$this->load->view('parents/includes/sidebar');
		$this->load->view('parents/includes/top_header');
		$this->load->view('parents/index');
		$this->load->view('parents/includes/footer');
	}
}
