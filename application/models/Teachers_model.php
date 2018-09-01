<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachers_model extends CI_Model { 

	// GET PARENTS REFERENCE ID //
	public function getReferenceID()
	{
		$this->db->select('tchr_reference_id');
		$this->db->from('cms_teachers');
		$this->db->order_by('tchr_id','desc');
		$this->db->limit('1');

		$query = $this->db->get();
		$EMPID = '';
		$LastInsertedID = 0;
		$countID = $query->num_rows();
		if($countID > 0){
			$result = $query->row();
			$EMPID = $result->tchr_reference_id;
		}else{
			$EMPID = 'THR00000';
		}
		$LastInsertedID = substr($EMPID, 3, 5);
		$NEWIDS = 'THR' . str_pad($LastInsertedID + 1, 5, '0', STR_PAD_LEFT);
		return $NEWIDS;

	}
	// GET TEACHERS ROLE ID //
	public function get_teachers_role_id()
	{
		$this->db->select('roles_id');
		$this->db->from('cms_roles');
		$this->db->where('roles_name','Teachers');
		$query = $this->db->get();
		return $query->row();
	}
	// GET ALL SCHOOL LIST //
	public function get_school_list()
	{
		$this->db->select('*');
		$this->db->from('cms_schools');
		$this->db->where('schl_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// CHECK PARENTS EMAIL ADDRESS //
	public function check_teachers_email_availability($emailid)
	{
		$this->db->select('cms_email');
		$this->db->from('cms_users');
		$this->db->where('cms_email',$emailid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	// CHECK PARENTS EMAIL ADDRESS //
	public function check_teacher_mobile_availability($mobile)
	{
		$this->db->select('tchr_mobile');
		$this->db->from('cms_teachers');
		$this->db->where('tchr_mobile',$mobile);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	// CHECK EMAIL ADDRESS //
	public function check_users_email_availability($emailid)
	{
		$this->db->select('cms_email');
		$this->db->from('cms_users');
		$this->db->where('cms_email',$emailid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET SCHOOL CODE BY SCHOOL ID //
	// public function get_school_code_by_id($school_id)
	// {
	// 	$this->db->select('schl_code');
	// 	$this->db->from('cms_schools');
	// 	$this->db->where('schl_id',$school_id);
	// 	$query = $this->db->get();
	// 	//echo $this->db->last_query();
	// 	return $query->row();
	// }
	// GET ALL ROLES LIST FROM DATABASE //
	// public function get_all_roles_list()
	// {
	// 	$this->db->select('roles_id,roles_name');
	// 	$this->db->from('cms_roles');
	// 	$this->db->where('roles_status','0');
	// 	$query = $this->db->get();
	// 	//echo $this->db->last_query();
	// 	return $query->result();
	// }
	//	SAVE INFORMATION IN MASTER TABLE //
	public function save_teachers_profile_in_master_table($teacherMasterArray)
	{
		$this->db->insert('cms_users', $teacherMasterArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}
	// SAVE USER INFORMATION BY MASTER ID //
	public function save_teacher_profile($teacherArray)
	{
		$this->db->insert('cms_teachers', $teacherArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}
	// SAVE PROFILE PICTURE BY ID //
	public function save_teacher_profile_picture($uploadData,$teacher_id)
	{
		$this->db->where('tchr_id', $teacher_id);
		$this->db->update('cms_teachers', $uploadData);
		return $teacher_id;
	}
	// GET ALL SCHOOL LIST //
	public function get_all_teachers_list()
	{
		$this->db->select('*');
		$this->db->from('cms_teachers');
		$this->db->where('tchr_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET ALL SCHOOOLS INFORMATION LIST //
	// public function get_all_users_list()
	// {
	// 	$this->db->select('role.roles_name, urs.*');
	// 	$this->db->from('cms_users_registered_by_master urs');
	// 	$this->db->join('cms_roles role','urs.roles_id=role.roles_id','left');
	// 	$query = $this->db->get();
	// 	//echo $this->db->last_query();
	// 	return $query->result();
	// }
	// GET PARENTS INFORMATION BY ID //
	public function get_teacher_detail_by_id($tchr_id)
	{
		$this->db->where('tchr_id', $tchr_id);
		$this->db->from('cms_teachers');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	public function get_teacher_profile_by_id($teachers_id)
	{
		$this->db->where('tchr_id', $teachers_id);
		$this->db->from('cms_teachers');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	// GET STUDENTS  LIST ACOORDING PARENTS ID //
	public function get_students_list($prntid)
	{
		$this->db->select('*');
		$this->db->from('cms_students');
		$this->db->where('prnt_id', $prntid);
		$query = $this->db->get();
		return $query->result();
	}
	// GET CLASS NAME BY PARENTS ID //
	public function get_class_name($prntid)
	{
		$this->db->select('cls.cls_name, std.*');
		$this->db->from('cms_students std');
		$this->db->join('cms_classes cls','std.cls_id=cls.cls_id','left');
		$this->db->where('std.prnt_id', $prntid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET SECTION NAME BY PARENTS ID //
	public function get_section_name($prntid)
	{
		$this->db->select('sec.sect_name, std.*');
		$this->db->from('cms_students std');
		$this->db->join('cms_sections sec','std.sect_id=sec.sect_id','left');
		$this->db->where('std.prnt_id', $prntid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// UPDATE MASTER TABLE BY ID //
	// public function update_parents_info_master_table($masterid, $masterUpdateArray)
	// {
	// 	$this->db->where('cms_id', $masterid);
	// 	$this->db->update('cms_users', $masterUpdateArray);
	// 	return $masterid;
	// }
	// UPDATE PARENT TABLE BY ID //
	public function update_teacher_information($teacher_id, $teacherUpdateArray)
	{
		$this->db->where('tchr_id', $teacher_id);
		$this->db->update('cms_teachers', $teacherUpdateArray);
		return $teacher_id;
	}
	// DELETE PARENT INFORMATION BY MASTER ID //
	public function delete_teacher_from_master($master_id)
	{
		$this->db->where('cms_id', $master_id);
		$this->db->delete('cms_users');
		return $master_id;
	}
	// USER DELETE FROM DATABASE //
	public function delete_teacher_info($teacher_id, $master_id)
	{
		$this->db->where('tchr_id', $teacher_id);
		$this->db->where('cms_id', $master_id);
		$this->db->delete('cms_teachers');
		return $teacher_id;
	}

}