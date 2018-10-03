<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assignments_model extends CI_Model{ 

	// GET ALL SUBJECT LIST //
	public function get_subjetcs_by_school_id($schl_id)
	{
		$this->db->select('sub_id,sub_name');
        $this->db->from('cms_subjects');
        $this->db->where('schl_id', $schl_id);
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
	public function get_section_by_school_id($classid)
	{
		$this->db->select('sect_id,sect_name');
        $this->db->from('cms_sections');
        $this->db->where('cls_id', $classid);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
	}
	// GET SUBJECT LIST BY SCHOOL ID //
	public function get_subjects_by_school_id($schl_id)
	{
		$this->db->select('sub_id,sub_name');
        $this->db->from('cms_subjects');
        $this->db->where('schl_id', $schl_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
	}
	// GET TEACHER LIST BY SCHOOL ID //
	public function get_students_by_school_id($sectionid)
	{
		$this->db->select('stud_id,stud_name');
        $this->db->from('cms_students');
        $this->db->where('sect_id', $sectionid);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
	}

	// SAVE SYLLABUS DETAILS //
	public function save_assignment_records($uploadData)
	{
		$this->db->insert('cms_assignments', $uploadData);
        return $this->db->insert_id();
	}
	//  GET STUDENTS SEARCH RESULT BY SCHOOL ID AND CLASS ID //
	public function get_all_assignments_list()
	{
		$this->db->select('schl.schl_name,cls.cls_name,sect.sect_name,sub.sub_name,stud.stud_name,asgn.*');
		$this->db->from('cms_assignments asgn');
		$this->db->join('cms_schools schl','asgn.schl_id=schl.schl_id','left');
		$this->db->join('cms_classes cls','asgn.cls_id=cls.cls_id','left');
		$this->db->join('cms_sections sect','asgn.sect_id=sect.sect_id','left');
		$this->db->join('cms_subjects sub','asgn.sub_id=sub.sub_id','left');
		$this->db->join('cms_students stud','asgn.stud_id=stud.stud_id','left');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// DELETE ASSIGNMENT DATA FROM DATABASE //
	public function delete_assignment_info_by_id($asgnid)
	{
		$this->db->where('asgn_id', $asgnid);
		$this->db->delete('cms_assignments');
		return $asgnid;
	}

	public function off_assignments_status_by_id($asgnid, $value)
    {
    	$this->db->where('asgn_id', $asgnid);
    	$this->db->update('cms_assignments', $value);
    	//echo $this->db->last_query();
    	return $asgnid;
    }
    public function on_assignments_status_by_id($asgnid, $value)
    {
    	$this->db->where('asgn_id', $asgnid);
    	$this->db->update('cms_assignments', $value);
    	//echo $this->db->last_query();
    	return $asgnid;
    }

    // SEACH ASSIGNMENT BY MULTI PARAMENTER //
    public function get_assignments_result_by_filter($srchAsgnSchlId, $srchAsgnClsId, $srchAsgnSecId)
    {
    	$this->db->select('schl.schl_name,cls.cls_name,sect.sect_name,sub.sub_name,stud.stud_name,asgn.*');
		$this->db->from('cms_assignments asgn');
		$this->db->join('cms_schools schl','asgn.schl_id=schl.schl_id','left');
		$this->db->join('cms_classes cls','asgn.cls_id=cls.cls_id','left');
		$this->db->join('cms_sections sect','asgn.sect_id=sect.sect_id','left');
		$this->db->join('cms_subjects sub','asgn.sub_id=sub.sub_id','left');
		$this->db->join('cms_students stud','asgn.stud_id=stud.stud_id','left');
		$this->db->where('asgn.schl_id',$srchAsgnSchlId);
		$this->db->where('asgn.cls_id',$srchAsgnClsId);
		$this->db->where('asgn.sect_id',$srchAsgnSecId);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
    }
}