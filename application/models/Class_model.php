<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_model extends CI_Model { 

	
	// GET ALL SCHOOOLS INFORMATION LIST //
	public function get_schools_information_list()
	{
		$this->db->select('*');
		$this->db->from('cms_schools');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// SAVE CLASS INFORMATION //
	public function save_class_info($classArray)
	{
		 $this->db->insert('cms_classes', $classArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();
	}
	// GET ALL CLASS INFORMATION LIST //
	public function get_all_classes()
	{
		$this->db->select('schl.schl_name,cls.*');
		$this->db->from(' cms_classes cls');
		$this->db->join('cms_schools schl','cls.schl_id=schl.schl_id','left');
		$this->db->where('cls_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET CLASSS INFORMATION BY SCHOOL ID //
	public function get_class_info_by_id($class_id)
	{
		$this->db->select('*');
		$this->db->from('cms_classes');
		$this->db->where('cls_id', $class_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	//  UPDATE CLASS APPLICATION BY ID //
	public function update_class_information($classid,$classUpdateArray)
	{
		$this->db->where('cls_id', $classid);
		$this->db->update('cms_classes', $classUpdateArray);
		return $classid;
	}
	// DELETE CLASS INFORMATION BY SCHOOL ID //
	public function delete_class_info_by_id($classid)
	{
		$this->db->where('cls_id', $classid);
		$this->db->delete('cms_classes');
		return $classid;
	}

}