<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students_model extends CI_Model { 

	// GET PARENTS REFERENCE ID //
	public function getReferenceID()
	{
		$this->db->select('stud_ref_id');
		$this->db->from('cms_students');
		$this->db->order_by('stud_id','desc');
		$this->db->limit('1');

		$query = $this->db->get();
		$EMPID = '';
		$LastInsertedID = 0;
		$countID = $query->num_rows();
		if($countID > 0){
			$result = $query->row();
			$EMPID = $result->stud_ref_id;
		}else{
			$EMPID = 'STU00000';
		}
		$LastInsertedID = substr($EMPID, 3, 5);
		$NEWIDS = 'STU' . str_pad($LastInsertedID + 1, 5, '0', STR_PAD_LEFT);
		return $NEWIDS;

	}
	// GET STUDENTS ROLE ID //
	public function get_student_role_id()
	{
		$this->db->select('roles_id');
		$this->db->from('cms_roles');
		$this->db->where('roles_name','Students');
		$query = $this->db->get();
		return $query->row();
	}
	// CHECK PARENTS EMAIL ADDRESS //
	public function check_student_email_availability($emailid)
	{
		$this->db->select('cms_email');
		$this->db->from('cms_users');
		$this->db->where('cms_email',$emailid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// CHECK PARENTS EMAIL ADDRESS //
	public function check_student_mobile_availability($mobile)
	{
		$this->db->select('stud_mobile_no');
		$this->db->from('cms_students');
		$this->db->where('stud_mobile_no',$mobile);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
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
	// GET ALL ROLES LIST FROM DATABASE //
	public function get_parents_list()
	{
		$this->db->select('*');
		$this->db->from('cms_parents');
		$this->db->where('prnt_status','0');
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
	//	SAVE INFORMATION IN MASTER TABLE //
	public function save_student_info_master_table($masterArray)
	{
		$this->db->insert('cms_users', $masterArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}
	// SAVE STUDENT INFORMATION BY MASTER ID //
	public function save_student_information($studentsArray)
	{
		$this->db->insert('cms_students', $studentsArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}
	// SAVE PROFILE PICTURE BY ID //
	public function save_student_profile_picture($uploadData,$student_id)
	{
		$this->db->where('stud_id', $student_id);
		$this->db->update('cms_students', $uploadData);
		return $student_id;
	}
	// GET ALL SCHOOL LIST //
	public function get_all_students_list()
	{
		$this->db->select('prt.prnt_gaurdian_name, std.*');
		$this->db->from('cms_students std');
		$this->db->join('cms_parents prt','std.prnt_id=prt.prnt_id','left');
		$this->db->where('std.stud_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
	// GET STUDENT INFORMATION BY ID //
	public function get_student_detail_by_id($stud_id)
	{
		$this->db->where('stud_id', $stud_id);
		$this->db->from('cms_students');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	public function get_student_profile_by_id($student_id)
	{
		$this->db->where('stud_id', $student_id);
		$this->db->from('cms_students');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	// GET PARENTS ID BY STUDENTS ID //
	public function get_parent_id_student_id($student_id)
	{
		$this->db->select('prnt_id');
		$this->db->from('cms_students');
		$this->db->where('stud_id', $student_id);
		$query = $this->db->get();
		return $query->row();
	}
	// GET CLASS ID BY STUDENT ID //
	public function get_class_by_id_student_id($student_id)
	{
		$this->db->select('cls_id');
		$this->db->from('cms_students');
		$this->db->where('stud_id', $student_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function get_class_by_studentid($student_id,$classid)
	{
		$this->db->select('cls.cls_name,std.*');
		$this->db->from('cms_students std');
		$this->db->join('cms_classes cls','std.cls_id=cls.cls_id','left');
		$this->db->where('std.stud_id', $student_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	// GET CLASS ID BY STUDENT ID //
	public function get_sectionby_id_student_id($student_id)
	{
		$this->db->select('sect_id');
		$this->db->from('cms_students');
		$this->db->where('stud_id', $student_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function get_section_by_studentid($student_id,$sectionid)
	{
		$this->db->select('sec.sect_name,std.*');
		$this->db->from('cms_students std');
		$this->db->join('cms_sections sec','std.sect_id=sec.sect_id','left');
		$this->db->where('std.stud_id', $student_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}

	// GET PARENT PROFILE DETAILS //
	public function get_parent_profile_by_id($parentid, $student_id)
	{
		$this->db->select('prt.prnt_gaurdian_name,prt.prnt_father_name,prt.prnt_mother_name,prt.prnt_email,prt.prnt_mobile_no,prt.prnt_father_profession,prt.prnt_mother_profession,prt.prnt_reference_id, std.*');
		$this->db->from('cms_students std');
		$this->db->join('cms_parents prt','std.prnt_id=prt.prnt_id','left');
		$this->db->where('std.stud_id', $student_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();

	}
	// UPDATE MASTER TABLE BY ID //
	public function update_student_info_master_table($masterid, $masterUpdateArray)
	{
		$this->db->where('cms_id', $masterid);
		$this->db->update('cms_users', $masterUpdateArray);
		return $masterid;
	}
	// UPDATE STUDENT TABLE BY ID //
	public function update_student_information($student_id, $studentsUpdateArray)
	{
		$this->db->where('stud_id', $student_id);
		$this->db->update('cms_students', $studentsUpdateArray);
		return $student_id;
	}
	// DELETE STUDENT INFORMATION BY MASTER ID //
	public function delete_student_from_master($master_id)
	{
		$this->db->where('cms_id', $master_id);
		$this->db->delete('cms_users');
		return $master_id;
	}
	// STUDENT DELETE FROM DATABASE //
	public function delete_student_info($student_id, $master_id)
	{
		$this->db->where('stud_id', $student_id);
		$this->db->where('cms_id', $master_id);
		$this->db->delete('cms_students');
		return $student_id;
	}

}