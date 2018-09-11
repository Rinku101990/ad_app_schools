<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// DEFAULT CONSTRUCTOR FUNCTION //
	public function __construct() { 
		parent::__construct(); 
		$this->load->model('Authentication','auth');
		$this->load->library('Mobile_Detect');
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

				if(isset($result->cms_id) && ($result->cms_id > 0)){

					$token = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));

					if($result->cms_role=="super"){
						$userArray = array(
							'cms_id' 	=> $result->cms_id,
							'cms_ref_id'=> $result->cms_ref_id,
							'cms_email' => $result->cms_email,
							'cms_role' 	=> $result->cms_role,
							'token'     => $token,
							'logged_in' => TRUE

						);

						$detect = new Mobile_Detect();
					    if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
					    	echo json_encode($userArray);
					        //header("Location: ".$this->config->item('base_url')."/mobile"); exit;
					    }else{
					    	$data = $this->session->set_userdata('logged_in', $userArray);
					    	redirect('super/dashboard');
					    }
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

						$login_id = $result->cms_id;
						$tokenValue = array('cms_token'=>$token, 'cms_last_login_datetime'=>date('Y-m-d H:i:s'));
						$this->auth->save_token($login_id, $tokenValue); 

						$userArray = array(
							'cms_id' 	=> $result->cms_id,
							'cms_ref_id'=> $result->cms_ref_id,
							'cms_email' => $result->cms_email,
							'cms_role' 	=> $result->cms_role,
							'cms_token' => $token,
							'status'    => "200"
						);
						$detect = new Mobile_Detect();
					    if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
					    	
					    	echo json_encode($userArray);
					    }else{
					    	$reference = $this->session->set_userdata('logged_in', $userArray);
					    	redirect('students/dashboard');
					    }
						
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
					
					$detect = new Mobile_Detect();
				    if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
				    	$error = array(
				    		'status' => '204',
				    		'message'=> 'Invalid Reference ID And Password.'
				    	);
				    	echo json_encode($error);
				    }else{
				    	$this->session->set_flashdata('error','<span style="color:red">Invalid Reference ID And Password.</span>');
						redirect('welcome');
				    }
				}
			}
		}else{
				
			$detect = new Mobile_Detect();
		    if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
		    	$error = array(
		    		'status' => '204',
		    		'message'=> 'Fields are blank.'
		    	);
		    	echo json_encode($error);
		    }else{
		    	$this->session->set_flashdata('error','<span style="color:red">Fields are blank.</span>');
				redirect('welcome');
		    }
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