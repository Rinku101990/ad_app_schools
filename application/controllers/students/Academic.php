<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Academic extends CI_Controller {

	// // LOAD CONSTRUCTOR FUNCTION TO INITIALIZE CLASS OBJECTS //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Students_activities_model', 'sam');

	}
	// // VIEW ALL UNREAD NOTIFICATION //
	public function index()
  	{		
		$this->load->view('students/error_page');
  	}

}