<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentsExcel extends CI_Controller {

	// GET EXCEL FILE OF STUDENTS BY THEIR IDS //
	public function student_list()
	{
		$this->load->model("Students_excel_report");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("Student Name", "Mobile Number", "Email Address", "Roll No", "Student Reference ID","Parent Name", "Address");

		//print_r($table_columns);die;
		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}
		$studentsids = $this->input->post('checkitem');
		//print_r($studentsids);die;
		$students_list = $this->Students_excel_report->get_students_list_by_id_in_excel($studentsids);

		$excel_row = 2;

		foreach($students_list as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->stud_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->stud_mobile_no);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->stud_email);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->stud_id);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->stud_ref_id);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->prnt_gaurdian_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->stud_address.','.$row->stud_pincode);
			
			
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Students_list_'.date('y').'_'.date('m').'_'.date('d').'.xls"');
		$object_writer->save('php://output');
	}
	
	
}