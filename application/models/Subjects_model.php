<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subjects_model extends CI_Model{ 

	// GET ALL CLASS LIST //
	public function get_class_list_by_id($schoolid)
	{
		$this->db->select('*');
		$this->db->from('cms_classes');
		$this->db->where('schl_id', $schoolid);
		$this->db->where('cls_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
	public function save_subjects($subjectArray)
	{
		$this->db->insert('cms_subjects', $subjectArray);
        return $this->db->insert_id();
	}
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
	public function getSubjectById($sub_id)
	{
		$this->db->select('*');
        $this->db->from('cms_subjects');
        $this->db->where('sub_id', $sub_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->row();
	}
	// UPDATE SUBJECT BY ID //
	public function update_subjects($subjectid, $updateSubjectArray)
	{
		$this->db->where('sub_id', $subjectid);
        $this->db->update('cms_subjects', $updateSubjectArray);
        //echo $this->db->last_query();
        return $subjectid;
	}

	// CHANGE SUBJECT STATUS BY THEIR ID //
	public function off_subject_status_by_id($subid, $value)
    {
    	$this->db->where('sub_id', $subid);
    	$this->db->update('cms_subjects', $value);
    	//echo $this->db->last_query();
    	return $subid;
    }
    public function on_subject_status_by_id($subid, $value)
    {
    	$this->db->where('sub_id', $subid);
    	$this->db->update('cms_subjects', $value);
    	//echo $this->db->last_query();
    	return $subid;
    }

    // DISABLED MULTIPLE SUBJECTS BY THEIR IDS //
    public function disabled_multiple_subject_by_id($selForDisableId, $selStatus)
	{
		$selForDisableId1 = $selForDisableId;
		$count = 0;
        foreach ($selForDisableId1 as $subids){
           $subids1 = intval($subids).'';
           $this->db->where('sub_id', $subids1);
		   $this->db->update('cms_subjects', $selStatus); 
           $count = $count+1;
       }
	   return $selForDisableId;
	}
	// ENABLED MULTIPLE SUBJECTS BY THEIR IDS //
    public function enabled_multiple_subject_by_id($selForEnabledId, $selStatus)
	{
		$selForEnabledId1 = $selForEnabledId;
		$count = 0;
        foreach ($selForEnabledId1 as $subids){
           $subids1 = intval($subids).'';
           $this->db->where('sub_id', $subids1);
		   $this->db->update('cms_subjects', $selStatus); 
           $count = $count+1;
       }
	   return $selForEnabledId;
	}

	// DELETE SUBJECT RECORD FROM DATABASE //
	public function delete_multiple_subjects_record($sub_id)
	{
		$sub_id1 = $sub_id;
		$count = 0;
        foreach ($sub_id1 as $subid){
           $subid1 = intval($subid).'';
		   $this->db->where('sub_id', $subid1);
		   $this->db->delete('cms_subjects');
           $count = $count+1;
        }
		//echo $this->db->last_query();
		return $sub_id;
	}

	// EXPORT SUBJECT FILE IN 
	public function get_students_list_by_id_in_excel($subids)
	{
	    $this->db->select('*');
        $this->db->from('cms_subjects');
	    $this->db->where_in('sub_id', $subids);
	    $query = $this->db->get();
		return $query->result();
	}
	// DELETE SUBJECT BY ID //
	public function delete_subjects_by_id($subid)
	{
		$this->db->where('sub_id', $subid);
        $this->db->delete('cms_subjects');
        return $subid;
	}
}