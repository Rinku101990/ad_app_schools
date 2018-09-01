<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Leaves extends CI_Controller {

	 public function index()
	 {
	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/leaveStuRequests');
	 	$this->load->view('super/includes/footer');
	 }
	public function addStuLeaves()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addStuLeave');
		$this->load->view('super/includes/footer');
	}
	public function addEmpLeaves()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addEmpLeave');
		$this->load->view('super/includes/footer');
	}
	public function leaveEmpRequests()
	{
	 $this->load->view('super/includes/header');
	 $this->load->view('super/includes/sidebar');
	 $this->load->view('super/includes/top_header');
	 $this->load->view('super/leaveEmpRequests');
	 $this->load->view('super/includes/footer');
	}
	public function addTeacherLeave()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addTeacherLeave');
		$this->load->view('super/includes/footer');
	}
	public function leaveTeacherRequests()
	{
	 $this->load->view('super/includes/header');
	 $this->load->view('super/includes/sidebar');
	 $this->load->view('super/includes/top_header');
	 $this->load->view('super/leaveTeacherRequest');
	 $this->load->view('super/includes/footer');
	}
	public function addLeaveType()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addLeaveTypes');
		$this->load->view('super/includes/footer');
	}
	public function leaveType()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/leaveTypes');
		$this->load->view('super/includes/footer');
	}
}
