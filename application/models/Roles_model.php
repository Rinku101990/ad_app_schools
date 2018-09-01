<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles_model extends CI_Model { 

	// SAVE SCHOOL INFORMATION //
	public function save_role_information($rolesArray)
	{
		 $this->db->insert('cms_roles', $rolesArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}
	// GET ALL SCHOOOLS INFORMATION LIST //
	public function get_role_information_list()
	{
		$this->db->select('*');
		$this->db->from('cms_roles');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// DELETE SCHOOL INFORMATION BY SCHOOL ID //
	public function delete_role_info_by_id($role_id)
	{
		$this->db->where('roles_id', $role_id);
		$this->db->delete('cms_roles');
		return $role_id;
	}

}