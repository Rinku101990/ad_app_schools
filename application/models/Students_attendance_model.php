<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students_attendance_model extends CI_Model { 

	// GET SCHOOL CODE BY SCHOOL ID //
	public function get_school_list()
	{
		$this->db->select('*');
		$this->db->from('cms_schools');
		$this->db->where('schl_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
	// GET ALL CLASS LIST //
	public function get_class_list_by_id($shoolid)
	{
		$this->db->select('*');
		$this->db->from('cms_classes');
		$this->db->where('schl_id', $shoolid);
		$this->db->where('cls_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET SECTION LIST BY ID //
	public function get_section_list_by_id($classid)
	{
		$this->db->select('*');
		$this->db->from('cms_sections');
		$this->db->where('cls_id', $classid);
		$this->db->where('sect_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET STUDENT RECORD FOR ATTENDANCE //
	public function get_attendnce_search_result($schlid, $clsid, $sectid)
	{
		$this->db->select('schl.schl_name,cls.cls_name,sect.sect_name,std.*');
		$this->db->from('cms_students std');
		$this->db->join('cms_schools schl','std.schl_id=schl.schl_id','left');
		$this->db->join('cms_classes cls','std.cls_id=cls.cls_id','left');
		$this->db->join('cms_sections sect','std.sect_id=sect.sect_id','left');
		$this->db->where('std.schl_id', $schlid);
		$this->db->where('std.cls_id', $clsid);
		$this->db->where('std.sect_id', $sectid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// SUBJECT LIST FOR SPECIFIC SCHOOL AND CLASS //
	public function get_subject_list_for_specific_school_class_and_section($schlid, $clsid)
	{
		$this->db->select('sub_id,sub_name');
		$this->db->from('cms_subjects');
		$this->db->where('schl_id', $schlid);
		$this->db->where('cls_id', $clsid);
		$this->db->where('sub_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET TOTAL STUDENTS ID CLASS AND SECTION WISE //
	public function get_students_attendnce_search_result($schlid, $clsid, $sectid)
	{
		$this->db->select('COUNT(sect_id) AS Total_studends');
		$this->db->from('cms_students');
		$this->db->where('schl_id', $schlid);
		$this->db->where('cls_id', $clsid);
		$this->db->where('sect_id', $sectid);
		$query = $this->db->get();
		$count = $query->row_array();
		return $count;
	}
	// SAVE STUDENTS ATTENDANCE ONE BY ONE //
	public function save_students_attendance_one_by_one($studAtdnsArray)
	{
		$this->db->insert('cms_student_attendance', $studAtdnsArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}

	// GET SECTION CLASSS AND SCHOOL DETAIL FOR ATTENDANCE //
	public function get_attendnce_creator_result($schlid, $clsid,$sectid)
	{
		$this->db->select('schl.schl_name,cls.cls_name, secta.*');
		$this->db->from('cms_sections secta');
		$this->db->join('cms_schools schl','secta.schl_id=schl.schl_id','left');
		$this->db->join('cms_classes cls','secta.cls_id=cls.cls_id','left');
		$this->db->where('secta.schl_id', $schlid);
		$this->db->where('secta.cls_id', $clsid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	// GET NAME TO WJO TAKE A ATTENDANCE //
	public function get_name_attendance_by($attendanceby)
	{
		$this->db->select('tchr_name');
		$this->db->from('cms_teachers');
		$this->db->where('tchr_reference_id', $attendanceby);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	// GET ATTENDANCE RECORD OF STUDENTS BY CURRENT DATA AND TIME //
	public function get_total_students_attendnce_search_result($schlid, $clsid, $sectid, $attDate)
	{
		$this->db->select('schl.schl_name,cls.cls_name,sect.sect_name,std.stud_name,sub.sub_name,stdatt.*');
		$this->db->from('cms_student_attendance stdatt');
		$this->db->join('cms_schools schl','stdatt.schl_id=schl.schl_id','left');
		$this->db->join('cms_classes cls','stdatt.cls_id=cls.cls_id','left');
		$this->db->join('cms_sections sect','stdatt.sect_id=sect.sect_id','left');
		$this->db->join('cms_students std','stdatt.stud_id=std.stud_id','left');
		$this->db->join('cms_subjects sub','stdatt.sub_id=sub.sub_id','left');
		$this->db->where('stdatt.schl_id', $schlid);
		$this->db->where('stdatt.cls_id', $clsid);
		$this->db->where('stdatt.sect_id', $sectid);
		$this->db->where('stdatt.stdadc_created', $attDate);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET STUDENTS CURRENTS HALF DAY COUNTER //
	public function get_current_whole_days($schlid, $clsid, $sectid)
	{
		$this->db->select('COUNT(stdadc_id) AS whole_Days');
		$this->db->from('cms_student_attendance');
		$this->db->where('schl_id', $schlid);
		$this->db->where('cls_id', $clsid);
		$this->db->where('sect_id', $sectid);
		$this->db->where('stdadc_present_type','WD');
		$query = $this->db->get();
		$count = $query->row_array();
		return $count;
	}
	public function get_current_half_days($schlid, $clsid, $sectid)
	{
		$this->db->select('COUNT(stdadc_id) AS Half_Days');
		$this->db->from('cms_student_attendance');
		$this->db->where('schl_id', $schlid);
		$this->db->where('cls_id', $clsid);
		$this->db->where('sect_id', $sectid);
		$this->db->where('stdadc_present_type','HD');
		$query = $this->db->get();
		$count = $query->row_array();
		return $count;
	}
	// GET STUDENTS PRESENT OR NOT //
	public function get_current_present_days($schlid, $clsid, $sectid)
	{
		$this->db->select('COUNT(stdadc_id) AS Present_Days');
		$this->db->from('cms_student_attendance');
		$this->db->where('schl_id', $schlid);
		$this->db->where('cls_id', $clsid);
		$this->db->where('sect_id', $sectid);
		$this->db->where('stdadc_present_status','P');
		$query = $this->db->get();
		$count = $query->row_array();
		return $count;
	}
	// GET STUDENTS CURRENT ABSENT IN CLASS //
	public function get_current_absent_days($schlid, $clsid, $sectid)
	{
		$this->db->select('COUNT(stdadc_id) AS absent_Days');
		$this->db->from('cms_student_attendance');
		$this->db->where('schl_id', $schlid);
		$this->db->where('cls_id', $clsid);
		$this->db->where('sect_id', $sectid);
		$this->db->where('stdadc_present_status','A');
		$query = $this->db->get();
		$count = $query->row_array();
		return $count;
	}
	// GET STUDENTS LATE PRESENTS IN CLASS //
	public function get_current_late_present_days($schlid, $clsid, $sectid)
	{
		$this->db->select('COUNT(stdadc_id) AS late_present_Days');
		$this->db->from('cms_student_attendance');
		$this->db->where('schl_id', $schlid);
		$this->db->where('cls_id', $clsid);
		$this->db->where('sect_id', $sectid);
		$this->db->where('stdadc_present_status','LP');
		$query = $this->db->get();
		$count = $query->row_array();
		return $count;
	}
	// GET STUDENTS STUDENTS ON LEAVE OR NOT //
	public function get_current_leave_days($schlid, $clsid, $sectid)
	{
		$this->db->select('COUNT(stdadc_id) AS leave_Days');
		$this->db->from('cms_student_attendance');
		$this->db->where('schl_id', $schlid);
		$this->db->where('cls_id', $clsid);
		$this->db->where('sect_id', $sectid);
		$this->db->where('stdadc_present_status','L');
		$query = $this->db->get();
		$count = $query->row_array();
		return $count;
	}
}