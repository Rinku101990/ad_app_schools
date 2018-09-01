<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {

	// LOAD CONSTRUCTOR FUNCTION TO INITIALIZE CLASS OBJECTS //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Students_activities_model', 'sam');

	}
	// VIEW ALL UNREAD NOTIFICATION //
	public function new_unread_notification()
  {
    $reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
    // $login_id = $reference['cms_id'];
    // print_r($login_id);
    $unread = $this->input->post('unread');
    $result['message'] = $this->sam->get_all_unread_notification($unread);
    echo json_encode($result);
  }
}
