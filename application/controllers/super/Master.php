<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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
	public function __construct()
    {
    	parent::__construct();
    	$this->load->model('AdminProfile', 'adProfile');
    }
    // LOAD SUPER ADMIN PROFILE PAGE //
	public function view()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$sid = $reference['cms_id']; // GET SESSION ID FOR SUPER ADMIN //
		$data['profile'] = $this->adProfile->get_admin_profile_information($sid);

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/viewMaster',$data);
		$this->load->view('super/includes/footer');
	}
	// public function add()
	// {
	// 	$reference = $this->session->userdata('logged_in');
	// 	if(empty($reference)){
	// 		redirect('','refresh');
	// 	}

	// 	$this->load->view('super/includes/header');
	// 	$this->load->view('super/includes/sidebar');
	// 	$this->load->view('super/includes/top_header');
	// 	$this->load->view('super/addMaster');
	// 	$this->load->view('super/includes/footer');
	// }

	// UPDATE SUPER ADMIN PROFILE INFORMARTION //
	public function update()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$sid = $reference['cms_id'];
		$password = $this->adProfile->get_session_password($sid);

		$default_password = $password->cms_password; // DEFAULT PASSWORD
		$current_password = $this->input->post('cpass'); // CURRENT PASSWORD

		if($current_password==$default_password){
			$profile_id = $this->input->post('profile_id');
			$profileArray = array(
				'adpro_fname' => $this->input->post('name'),
				'adpro_contact' => $this->input->post('mobile'),
				'adpro_updated' => date('Y-m-d H:i:s')
			);
			$updated_id = $this->adProfile->update_super_admin_profile($profile_id, $profileArray);

			// UPDATE MASTER TABLE CREDENTIAL //
			$masterArry = array(
				'cms_password' => md5($this->input->post('npass')),
				'cms_updated' =>date('Y-m-d H:i:s')
			);
			$result = $this->adProfile->update_master_admin_profile($sid, $masterArry);

			// AFETR SUCCESS THEN REDIRCT //
			if($updated_id){
				$this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Profile updated successfully.</span>');
				redirect('super/master/view');
			}else{
				$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Profile not updated.</span>');
				redirect('super/master/view');
			}
		}else{
			$this->session->set_flashdata('message','<span class="text-danger pull-right" style="font-weight:bold">Wrong password.</span>');
			redirect('super/master/view');
		}
	}
}