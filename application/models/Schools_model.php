<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schools_model extends CI_Model { 

	// SAVE SCHOOL INFORMATION //
	public function save_school_information($schoolArray)
	{
		 $this->db->insert('cms_schools', $schoolArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}
	// GET ALL SCHOOOLS INFORMATION LIST //
	public function get_schools_information_list()
	{
		$this->db->select('*');
		$this->db->from('cms_schools');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET SCHOOL INFORMATION BY SCHOOL ID //
	public function get_school_information_by_id($school_id)
	{
		$this->db->select('*');
		$this->db->from('cms_schools');
		$this->db->where('schl_id', $school_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	//  UPDATE SCHOOL APPLICATION BY ID //
	public function update_school_info_by_id($school_id,$schoolArray)
	{
		$this->db->where('schl_id', $school_id);
		$this->db->update('cms_schools', $schoolArray);
		return $school_id;
	}
	// DELETE SCHOOL INFORMATION BY SCHOOL ID //
	public function delete_school_info_by_id($school_id)
	{
		$this->db->where('schl_id', $school_id);
		$this->db->delete('cms_schools');
		return $school_id;
	}

}