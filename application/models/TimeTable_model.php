<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TimeTable_model extends CI_Model{ 

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
	public function get_sect_by_school_id($cls_id)
	{
		$this->db->select('sect_id,sect_name');
        $this->db->from('cms_sections');
        $this->db->where('cls_id', $cls_id);
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
	public function get_teacher_by_school_id($schl_id)
	{
		$this->db->select('tchr_id,tchr_name');
        $this->db->from('cms_teachers');
        $this->db->where('schl_id', $schl_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
	}

	// SAVE SYLLABUS DETAILS //
	public function save_timetable($tmtlArray)
	{
		$this->db->insert('cms_time_tables', $tmtlArray);
        return $this->db->insert_id();
	}
	//  GET STUDENTS SEARCH RESULT BY SCHOOL ID AND CLASS ID //
	public function get_timetable_result_by_filter($srchSchlId, $srchClsId, $srchSecId)
	{
		$this->db->select('schl.schl_name,cls.cls_name,sect.sect_name,sub.sub_name,tchr.tchr_name, tmtl.*');
		$this->db->from('cms_time_tables tmtl');
		$this->db->join('cms_schools schl','tmtl.schl_id=schl.schl_id','left');
		$this->db->join('cms_classes cls','tmtl.cls_id=cls.cls_id','left');
		$this->db->join('cms_sections sect','tmtl.sect_id=sect.sect_id','left');
		$this->db->join('cms_subjects sub','tmtl.sub_id=sub.sub_id','left');
		$this->db->join('cms_teachers tchr','tmtl.tchr_id=tchr.tchr_id','left');
		$this->db->where('tmtl.schl_id',$srchSchlId);
		$this->db->where('tmtl.cls_id',$srchClsId);
		$this->db->where('tmtl.sect_id',$srchSecId);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
}