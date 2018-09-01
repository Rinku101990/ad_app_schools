<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parents_model extends CI_Model { 

	// GET PARENTS REFERENCE ID //
	public function getReferenceID()
	{
		$this->db->select('prnt_reference_id');
		$this->db->from('cms_parents');
		$this->db->order_by('prnt_id','desc');
		$this->db->limit('1');

		$query = $this->db->get();
		$EMPID = '';
		$LastInsertedID = 0;
		$countID = $query->num_rows();
		if($countID > 0){
			$result = $query->row();
			$EMPID = $result->prnt_reference_id;
		}else{
			$EMPID = 'PRT00000';
		}
		$LastInsertedID = substr($EMPID, 3, 5);
		$NEWIDS = 'PRT' . str_pad($LastInsertedID + 1, 5, '0', STR_PAD_LEFT);
		return $NEWIDS;

	}
	// GET PARENTS ROLE ID //
	public function get_parents_role_id()
	{
		$this->db->select('roles_id');
		$this->db->from('cms_roles');
		$this->db->where('roles_name','Parents');
		$query = $this->db->get();
		return $query->row();
	}
	// CHECK PARENTS EMAIL ADDRESS //
	public function check_parents_email_availability($emailid)
	{
		$this->db->select('cms_email');
		$this->db->from('cms_users');
		$this->db->where('cms_email',$emailid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// CHECK PARENTS EMAIL ADDRESS //
	public function check_parents_mobile_availability($mobile)
	{
		$this->db->select('prnt_mobile_no');
		$this->db->from('cms_parents');
		$this->db->where('prnt_mobile_no',$mobile);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
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
	public function save_parents_info_master_table($masterArray)
	{
		$this->db->insert('cms_users', $masterArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}
	// SAVE USER INFORMATION BY MASTER ID //
	public function save_parents_information($parentsArray)
	{
		$this->db->insert('cms_parents', $parentsArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}
	// SAVE PROFILE PICTURE BY ID //
	public function save_parents_profile_picture($uploadData,$parent_id)
	{
		$this->db->where('prnt_id', $parent_id);
		$this->db->update('cms_parents', $uploadData);
		return $parent_id;
	}
	// GET ALL SCHOOL LIST //
	public function get_all_parents_lists()
	{
		$this->db->select('*');
		$this->db->from('cms_parents');
		$this->db->where('prnt_status','0');
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
	public function get_parents_detail_by_id($prnt_id)
	{
		$this->db->where('prnt_id', $prnt_id);
		$this->db->from('cms_parents');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	public function get_parent_profile($prntid)
	{
		$this->db->where('prnt_id', $prntid);
		$this->db->from('cms_parents');
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
	public function update_parents_info_master_table($masterid, $masterUpdateArray)
	{
		$this->db->where('cms_id', $masterid);
		$this->db->update('cms_users', $masterUpdateArray);
		return $masterid;
	}
	// UPDATE PARENT TABLE BY ID //
	public function update_parents_information($parentsid, $parentsUpdateArray)
	{
		$this->db->where('prnt_id', $parentsid);
		$this->db->update('cms_parents', $parentsUpdateArray);
		return $parentsid;
	}
	// DELETE PARENT INFORMATION BY MASTER ID //
	public function delete_parents_from_master($master_id)
	{
		$this->db->where('cms_id', $master_id);
		$this->db->delete('cms_users');
		return $master_id;
	}
	// USER DELETE FROM DATABASE //
	public function delete_parents_info($parents_id, $master_id)
	{
		$this->db->where('prnt_id', $parents_id);
		$this->db->where('cms_id', $master_id);
		$this->db->delete('cms_parents');
		return $parents_id;
	}

}