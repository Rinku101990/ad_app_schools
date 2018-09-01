<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Section_model extends CI_Model { 

	
	// GET ALL SCHOOOLS INFORMATION LIST //
	public function get_all_school_list()
	{
		$this->db->select('*');
		$this->db->from('cms_schools');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// SAVE CLASS INFORMATION //
	public function save_sections_info($sectionArray)
	{
		 $this->db->insert('cms_sections', $sectionArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}
	// GET ALL CLASS INFORMATION LIST //
	public function get_all_class_list()
	{
		$this->db->select('*');
		$this->db->from('cms_classes');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET ALL SECTION INFORMATION LIST //
	public function get_all_section_list()
	{
		$this->db->select('*');
		$this->db->from('cms_sections');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET CLASSS INFORMATION BY SCHOOL ID //
	public function get_section_record_by_id($section_id)
	{
		$this->db->select('*');
		$this->db->from('cms_sections');
		$this->db->where('sect_id', $section_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	//  UPDATE CLASS APPLICATION BY ID //
	public function update_section_information($sectionid,$sectionUpdateArray)
	{
		$this->db->where('sect_id', $sectionid);
		$this->db->update('cms_sections', $sectionUpdateArray);
		return $sectionid;
	}
	// DELETE CLASS INFORMATION BY SCHOOL ID //
	public function delete_section_info_by_id($sectionid)
	{
		$this->db->where('sect_id', $sectionid);
		$this->db->delete('cms_sections');
		return $sectionid;
	}

}