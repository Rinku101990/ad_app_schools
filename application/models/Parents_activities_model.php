<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parents_activities_model extends CI_Model { 


	// GET PARENTS PROFILE DETAILS //
	public function get_parent_profile_record($prt_id,$prt_role)
	{
		$this->db->select('*');
		$this->db->from('cms_parents');
		$this->db->where('cms_id',$prt_id);
		$this->db->where('roles_id',$prt_role);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}


	// GET MENU LIST BASED ON ROLE PERMISSION 
	public function get_menu_role_permissions($prt_role)
	{
		$this->db->select('mn.menu_name, mr.*');
		$this->db->from('cms_menu_role_permission mr');
		$this->db->join('cms_menu mn','mr.menu_id=mn.menu_id','left');
		$this->db->where('roles_id', $prt_role);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

}