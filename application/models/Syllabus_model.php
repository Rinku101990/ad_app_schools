<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Syllabus_model extends CI_Model{ 

	// GET ALL SUBJECT LIST //
	public function get_all_subjects()
	{
		$this->db->select('*');
        $this->db->from('cms_subjects');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
	}
	// VIEW SUBJECT BY ID //
	public function get_class_by_school_id($schl_id)
	{
		$this->db->select('cls_id,cls_name');
        $this->db->from('cms_classes');
        $this->db->where('schl_id', $schl_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
	}

	// SAVE SYLLABUS DETAILS //
	public function save_syllabus($uploadData)
	{
		$this->db->insert('cms_syllabus', $uploadData);
        return $this->db->insert_id();
	}
	// GET SYLLABUSLIS //
	public function get_all_syllabus_list()
	{
	    $this->db->select('*');
        $this->db->from('cms_syllabus');
	    $query = $this->db->get();
		return $query->result();
	}
	
	// DELETE SUBJECT BY ID //
	public function delete_syllabus_by_id($syllabusid)
	{
		$this->db->where('slbs_id', $syllabusid);
        $this->db->delete('cms_syllabus');
        return $syllabusid;
	}

	// REMOVE MULTIPLE RECORD OF SYLLABUS BY THIER IDS //
	public function delete_multiple_syllabus_record_by_ids($sylls_id)
	{
		$sylls_id1 = $sylls_id;
		$count = 0;
        foreach ($sylls_id1 as $syllsid){
           $syllsid1 = intval($syllsid).'';
		   $this->db->where('slbs_id', $syllsid1);
		   $this->db->delete('cms_syllabus');
           $count = $count+1;
        }
		//echo $this->db->last_query();
		return $sylls_id;
	}
}