<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transport extends CI_Controller {

	 public function index()
	 {
	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header');
	 	$this->load->view('super/routeSchedules');
	 	$this->load->view('super/includes/footer');
	 }
	public function route()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/routes');
		$this->load->view('super/includes/footer');
	}
	public function addRoute()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addRoute');
		$this->load->view('super/includes/footer');
	}
	public function vehicles()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/vehicles');
		$this->load->view('super/includes/footer');
	}
	public function addVehicle()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addVehicle');
		$this->load->view('super/includes/footer');
	}
	public function addDriver()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addDriver');
		$this->load->view('super/includes/footer');
	}
	public function drivers()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/drivers');
		$this->load->view('super/includes/footer');
	}
	public function addSchedules()
	{
		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addRouteSchedules');
		$this->load->view('super/includes/footer');
	}

}
