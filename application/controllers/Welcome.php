<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	// DEFAULT CONSTRUCTOR FUNCTION //
	public function __construct() { 
		parent::__construct(); 
		$this->load->model('Authentication','auth');
		//$this->load->helper('users_helper');
	}

	// LOAD DEFAULT LOGIN PAGE // 
	public function index()
	{
		$this->load->view('login');
	}

	// USERS LOGIN FUNCTIONS //
	public function login()
	{
		$this->form_validation->set_rules('username', ' Reference ID', 'required', array('is_unique' => 'Reference ID already exist.'));
		$this->form_validation->set_rules('userpass', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if($this->input->post('username') !='' && $this->input->post('userpass') !=''){
			if($this->form_validation->run() == FALSE) {   } else {

				$username = $this->input->post('username');
				$userpass = $this->input->post('userpass');

				$result = $this->auth->verification($username, $userpass);
				if($result > 0){
					if($result->cms_role=="super"){
						$userArray = array(
							'cms_id' 	=> $result->cms_id,
							'cms_ref_id'=> $result->cms_ref_id,
							'cms_email' => $result->cms_email,
							'cms_role' 	=> $result->cms_role,
							'logged_in' => TRUE
						);
						$data = $this->session->set_userdata('logged_in',$userArray);
						echo json_encode($data);
						//$this->session->set_userdata('profile_pic',$result->profile_picture);
						//echo "super";
						redirect('super/dashboard');
					}
	
					// if($result->cms_role=="subadmin"){
					// 	$userArray = array(
					// 		'cms_id' 	=> $result->cms_id,
					// 		'cms_ref_id'=> $result->cms_ref_id,
					// 		'cms_email' => $result->cms_email,
					// 		'cms_role' 	=> $result->cms_role,
					// 		'logged_in' => TRUE
					// 	);
					// 	$this->session->set_userdata('logged_in',$userArray);
					// 	//$this->session->set_userdata('profile_pic',$result->profile_picture);
					// 	//echo "subadmin";
					// 	redirect('subadmin/dashboard');
					// }
	
					// if($result->cms_role=="finance"){
					// 	$userArray = array(
					// 		'cms_id' 	=> $result->cms_id,
					// 		'cms_ref_id'=> $result->cms_ref_id,
					// 		'cms_email' => $result->cms_email,
					// 		'cms_role' 	=> $result->cms_role,
					// 		'logged_in' => TRUE
					// 	);
					// 	$this->session->set_userdata('logged_in',$userArray);
					// 	//$this->session->set_userdata('profile_pic',$result->profile_picture);
					// 	 //echo "finance";
					// 	 redirect('finance/dashboard');
					// }
	
					// if($result->cms_role=="hrd"){
					// 	$userArray = array(
					// 		'cms_id' 	=> $result->cms_id,
					// 		'cms_ref_id'=> $result->cms_ref_id,
					// 		'cms_email' => $result->cms_email,
					// 		'cms_role' 	=> $result->cms_role,
					// 		'logged_in' => TRUE
					// 	);
					// 	$this->session->set_userdata('logged_in',$userArray);
					// 	//$this->session->set_userdata('profile_pic',$result->profile_picture);
					// 	//echo "hrd";
					// 	 redirect('hrd/dashboard');
					// }
	
					if($result->cms_role==4){
						$userArray = array(
							'cms_id' 	=> $result->cms_id,
							'cms_ref_id'=> $result->cms_ref_id,
							'cms_email' => $result->cms_email,
							'cms_role' 	=> $result->cms_role,
							'logged_in' => TRUE
						);
						$this->session->set_userdata('logged_in',$userArray);
						//$this->session->set_userdata('profile_pic',$result->profile_picture);
						 //echo "teachers";
						 redirect('teachers/dashboard');
					}

					if($result->cms_role==5){
						$userArray = array(
							'cms_id' 	=> $result->cms_id,
							'cms_ref_id'=> $result->cms_ref_id,
							'cms_email' => $result->cms_email,
							'cms_role' 	=> $result->cms_role,
							'logged_in' => TRUE
						);
						$this->session->set_userdata('logged_in',$userArray);
						//$this->session->set_userdata('profile_pic',$result->profile_picture);
						//echo "parents";
						redirect('parents/dashboard');
					}
	
					if($result->cms_role==6){
						$userArray = array(
							'cms_id' 	=> $result->cms_id,
							'cms_ref_id'=> $result->cms_ref_id,
							'cms_email' => $result->cms_email,
							'cms_role' 	=> $result->cms_role,
							'logged_in' => TRUE
						);
						$this->session->set_userdata('logged_in',$userArray);
						//$this->session->set_userdata('profile_pic',$result->profile_picture);
						//echo "students";
						redirect('students/dashboard');
					}
	
					// if($result->cms_role=="transports"){
					// 	$userArray = array(
					// 		'cms_id' 	=> $result->cms_id,
					// 		'cms_ref_id'=> $result->cms_ref_id,
					// 		'cms_email' => $result->cms_email,
					// 		'cms_role' 	=> $result->cms_role,
					// 		'logged_in' => TRUE
					// 	);
					// 	$this->session->set_userdata('logged_in',$userArray);
					// 	//$this->session->set_userdata('profile_pic',$result->profile_picture);
					// 	//echo "transports";
					// 	redirect('transports/dashboard');
					// }
				}else{
					$this->session->set_flashdata('error','<span style="color:red">Invalid Reference ID And Password.</span>');
					redirect('welcome');
				}
			}
		}else{
				$this->session->set_flashdata('error','<span style="color:red">Fields are blank.</span>');
				redirect('welcome');
		}
	}
	
	// USERS LOGOUT FUNCTION HERE //
	public function logout()
	{
		// Removing session data
		$userdata = array(
			'id' => '',
			'reference' => '',
			'email' => ''
        );
		$this->session->set_userdata($userdata);
		redirect('','refresh');
	}
}
