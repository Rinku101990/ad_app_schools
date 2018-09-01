<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachers_activities_model extends CI_Model { 


	// GET TEACHERS PROFILE DETAILS //
	public function get_teacher_profile_record($tchr_id,$tchr_role)
	{
		$this->db->select('*');
		$this->db->from('cms_teachers');
		$this->db->where('cms_id',$tchr_id);
		$this->db->where('roles_id',$tchr_role);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}


	// GET MENU LIST BASED ON ROLE PERMISSION 
	public function get_menu_role_permissions($tchr_role)
	{
		$this->db->select('mn.menu_name, mr.*');
		$this->db->from('cms_menu_role_permission mr');
		$this->db->join('cms_menu mn','mr.menu_id=mn.menu_id','left');
		$this->db->where('roles_id', $tchr_role);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

}