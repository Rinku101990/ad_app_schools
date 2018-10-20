<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {
	
	//CALL CONSTRUCTOR FUNCTION //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Subjects_model', 'subm');
		$this->load->model('Schools_model', 'schl');
	}

	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data['subjects'] = $this->subm->get_all_subjects();
		$data['schools'] = $this->schl->get_schools_information_list();

	 	$this->load->view('super/includes/header');
	 	$this->load->view('super/includes/sidebar');
	 	$this->load->view('super/includes/top_header', $data);
	 	$this->load->view('super/viewSubjects');
	 	$this->load->view('super/includes/footer');
	}
	// GET CLASS LIST BY SCHOOL ID //
	public function getClassListBySchoolId()
	{
		$schoolid = $this->input->post('schoolIdForSubject');
		$data = $this->subm->get_class_list_by_id($schoolid);
    	echo json_encode($data);
	}
	// UPDATED CLASS LIST FOR SUBJECT MODULE //
	public function getUpdatedClassListBySchoolId()
	{
		$schoolid = $this->input->post('schoolIdForSubject');
		$data = $this->subm->get_class_list_by_id($schoolid);
    	echo json_encode($data);
	}
	// SAVE NEW SUBJECT //
	public function save_subject(){

		$data = $this->input->post();
		if(!empty($data)){
			
			$subjectArray = array(
				'schl_id' => $this->input->post('schlidforSubject'),
				'cls_id' => $this->input->post('classidforSubject'),
				'sub_name' => $this->input->post('subject_name'),
				'sub_code' => $this->input->post('subject_code'),
				'sub_auth_name' => $this->input->post('subject_auth'),
				'sub_desc' => $this->input->post('subject_desc'),
				'sub_status' => '0',
				'sub_created' => date('Y-m-d H:i:s')
			);

			$result = $this->subm->save_subjects($subjectArray);
	    	if($result){
	    		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 4px;">Subject Added Successfully.</span>');
	    		echo "upload";
	    	}else{
	    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">Subject not saved.</span>');
	    		echo "failed";
	    	}
		}else{
			$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">fields are blank.</span>');
	    	echo "failed";
		}
	}

	// VIEW SUB CATEGORY BY ID //
	public function viewSubCategory()
	{
		$sub_id = $this->input->post('sub_id');
		$result['sub_info'] = $this->subm->getSubjectById($sub_id);
		//print_r($result);die;
		echo json_encode($result);
	}

	// UPDATE SUBJECT BY ID //
	public function update_subject()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$subjectid = $this->input->post('subject_id');
			$updateSubjectArray = array(
				'schl_id' => $this->input->post('updateSchlidforSubject'),
				'cls_id' => $this->input->post('updateClassidforSubject'),
				'sub_name' => $this->input->post('subject_name'),
				'sub_code' => $this->input->post('subject_code'),
				'sub_auth_name' => $this->input->post('subject_auth'),
				'sub_desc' => $this->input->post('subject_desc'),
				'sub_updated' => date('Y-m-d H:i:s')
			);

			$result = $this->subm->update_subjects($subjectid, $updateSubjectArray);
	    	if($result){
	    		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 4px;">Subject updated Successfully.</span>');
	    		echo "updated";
	    	}else{
	    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">Subject not updated.</span>');
	    		echo "failed";
	    	}
		}
	}

	// CHANGE SUBJECT STATUS OFF BY THEIR IDS //
	public function subject_status_off()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$subid = $this->input->post('subIdOff');
			$value['sub_status'] = $this->input->post('subValOff');
			//print_r($value);die;
			$result = $this->subm->off_subject_status_by_id($subid, $value);
			if($result){
				echo "Off";
			}else{
				echo "On";
			}
		}else{
			echo "empty";
		}
	}
	// CHANGE SUBJECT STATUS ON BY THEIR ID //
	public function subject_status_on()
	{
		$data = $this->input->post();
		if(!empty($data)){
			$subid = $this->input->post('subIdOn');
			$value['sub_status'] = $this->input->post('subValOn');
			$result = $this->subm->on_subject_status_by_id($subid, $value);
			if($result){
				echo "On";
			}else{
				echo "Off";
			}
		}else{
			echo "empty";
		}
	}

	// DISABLED MULTIPLE IDS OF SUBJECTS //
	public function disabled_subjects_multi_ids()
	{
		$subid = $this->input->post('subidForDisable');
		$selForDisableId = explode(",",$subid);
		$selStatus['sub_status'] = '1';
		$result = $this->subm->disabled_multiple_subject_by_id($selForDisableId, $selStatus);
		if($result){
			echo "Off";
		}else{
			echo "bad";
		}
	}
	// ENABLED MULTIPLE IDS OF SUBJECTS //
	public function enabled_subjects_multi_ids()
	{
		$subid = $this->input->post('subIdForEnable');
		$selForEnabledId = explode(",",$subid);
		$selStatus['sub_status'] = '0';
		$result = $this->subm->enabled_multiple_subject_by_id($selForEnabledId, $selStatus);
		if($result){
			echo "On";
		}else{
			echo "bad";
		}
	}

	public function remove_multiple_subjects_record()
	{

		$subject_array = $this->input->post('selected_sub_id');

		$sub_id = explode(",",$subject_array);

		$result = $this->subm->delete_multiple_subjects_record($sub_id);
		if($result){
			$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 4px;">Subject delete Successfully.</span>');
    		echo "success";
		}else{
			$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">Subject deletion failed.</span>');
    		echo "failed";
		}
	}

	// EXPORT EXCEL FILE FOR SUBJECT FILE //
	public function subject_excel()
	{
		//$this->load->model("Students_excel_report");
		$this->load->library("excel");
		$object = new PHPExcel();
		$object->setActiveSheetIndex(0);
		$table_columns = array("Subject Name", "Author Name", "Subject Code", "Subject Description", "Status", "Created On");
		//print_r($table_columns);die;
		$column = 0;
		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
		$subids = $this->input->post('subjectItem');
		//print_r($subids);die;
		$subject_list = $this->subm->get_students_list_by_id_in_excel($subids);
		$excel_row = 2;
		foreach($subject_list as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->sub_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->sub_auth_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sub_code);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->sub_desc);
			if($row->sub_status==0){
				$new_status = "Active";
				$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $new_status);
			}else{
				$new_status = "Inactive";
				$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $new_status);
			}
			$formated_date = date('d M-Y', strtotime($row->sub_created));
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $formated_date);
			$excel_row++;
		}
		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="subjects_list_'.date('y').'_'.date('m').'_'.date('d').'.xls"');
		$object_writer->save('php://output');

	}

	// REMOVE SUBJECT BY THEIR ID //
	public function remove_subjects()
	{
		$subid = $this->uri->segment(4);
		$result = $this->subm->delete_subjects_by_id($subid);
    	if($result){
    		$this->session->set_flashdata('message','<span class="alert alert-success" style="padding: 4px;">Subject delete Successfully.</span>');
    		redirect('super/subjects');
    	}else{
    		$this->session->set_flashdata('message','<span class="alert alert-danger" style="padding: 4px;">Subject not delete.</span>');
    		redirect('super/subjects');
    	}
	}


	public function add()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/addSubjects');
		$this->load->view('super/includes/footer');
	}

}
