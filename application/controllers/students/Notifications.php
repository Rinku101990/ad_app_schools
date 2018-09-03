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
		$session_id = $reference['cms_ref_id'];
		echo $session_id;
	    $unread = $this->input->post('unread');
	    $result['message'] = $this->sam->get_all_unread_notification($unread);
	    echo json_encode($result);
  	}

  	public function trigger_event()
	{
		// Load the library.
		// You can also autoload the library by adding it to config/autoload.php
		$this->load->library('ci_pusher');

		$pusher = $this->ci_pusher->get_pusher();

		// Set message
		$data['message'] = 'This message was sent at ' . date('Y-m-d H:i:s');

		// Send message
		$event = $pusher->trigger('test_channel', 'my_event', $data);

		if ($event === TRUE)
		{
			echo 'Event triggered successfully!';
		}
		else
		{
			echo 'Ouch, something happend. Could not trigger event.';
		}
	}
}
