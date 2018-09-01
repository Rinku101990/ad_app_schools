<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeAttendance extends CI_Controller {

	 public function index()
	 {
	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/employeeAttendance');
	 	$this->load->view('super/includes/footer');
	}
	public function add()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addEmployeeAttend');
		$this->load->view('super/includes/footer');
	}

	public function month()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/employeeMonthlyAttend');
		$this->load->view('super/includes/footer');
	}
}
