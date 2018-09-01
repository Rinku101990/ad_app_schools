<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model { 

	// GET ALL SCHOOL LIST //
	public function get_all_schools_list()
	{
		$this->db->select('schl_id,schl_type_name,schl_name');
		$this->db->from('cms_schools');
		$this->db->where('schl_status','0');
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
	public function get_school_code_by_id($school_id)
	{
		$this->db->select('schl_code');
		$this->db->from('cms_schools');
		$this->db->where('schl_id',$school_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	// GET ALL ROLES LIST FROM DATABASE //
	public function get_all_roles_list()
	{
		$this->db->select('roles_id,roles_name');
		$this->db->from('cms_roles');
		$this->db->where('roles_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	//	SAVE INFORMATION IN MASTER TABLE //
	public function save_user_info_master_table($masterArray)
	{
		$this->db->insert('cms_users', $masterArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}
	// SAVE USER INFORMATION BY MASTER ID //
	public function save_users_information($usersArray)
	{
		$this->db->insert('cms_users_registered_by_master', $usersArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}
	// GET ALL SCHOOOLS INFORMATION LIST //
	public function get_all_users_list()
	{
		$this->db->select('role.roles_name, urs.*');
		$this->db->from('cms_users_registered_by_master urs');
		$this->db->join('cms_roles role','urs.roles_id=role.roles_id','left');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET USER INFORMATION BY USER ID AND MASTER ID //
	public function get_user_info_by_id($user_id,$master_id)
	{
		$this->db->where('urs_id', $user_id);
		$this->db->where('cms_id', $master_id);
		$this->db->from('cms_users_registered_by_master');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	// UPDATE MASTER TABLE BY ID //
	public function update_user_info_master_table($masterid,$masterUpdateArray)
	{
		$this->db->where('cms_id', $masterid);
		$this->db->update('cms_users', $masterUpdateArray);
		return $masterid;
	}
	// UPDATE USER TABLE BY ID //
	public function update_users_information($userid,$usersUpdateArray)
	{
		$this->db->where('urs_id', $userid);
		$this->db->update('cms_users_registered_by_master', $usersUpdateArray);
		return $userid;
	}
	// DELETE SCHOOL INFORMATION BY SCHOOL ID //
	public function delete_users_from_master($master_id)
	{
		$this->db->where('cms_id', $master_id);
		$this->db->delete('cms_users');
		return $master_id;
	}
	// USER DELETE FROM DATABASE //
	public function delete_user_info($user_id, $master_id)
	{
		$this->db->where('urs_id', $user_id);
		$this->db->where('cms_id', $master_id);
		$this->db->delete('cms_users_registered_by_master');
		return $user_id;
	}

}