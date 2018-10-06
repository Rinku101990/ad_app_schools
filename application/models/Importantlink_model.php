<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Importantlink_model extends CI_Model{ 

		// SAVE SYLLABUS DETAILS //
	public function save_importantlinks_records($imprtArray)
	{
		$this->db->insert('cms_important_links', $imprtArray);
        return $this->db->insert_id();
	}
	//  GET STUDENTS SEARCH RESULT BY SCHOOL ID AND CLASS ID //
	public function get_all_important_links()
	{
		$this->db->select('schl.schl_name,links.*');
		$this->db->from('cms_important_links links');
		$this->db->join('cms_schools schl','links.schl_id=schl.schl_id','left');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// DELETE ASSIGNMENT DATA FROM DATABASE //
	public function delete_importantlinks_info_by_id($imprtid)
	{
		$this->db->where('imprt_id', $imprtid);
		$this->db->delete('cms_important_links');
		return $imprtid;
	}

	public function off_importantlinks_status_by_id($imprtid, $value)
    {
    	$this->db->where('imprt_id', $imprtid);
    	$this->db->update('cms_important_links', $value);
    	//echo $this->db->last_query();
    	return $imprtid;
    }
    public function on_importantlinks_status_by_id($imprtid, $value)
    {
    	$this->db->where('imprt_id', $imprtid);
    	$this->db->update('cms_important_links', $value);
    	//echo $this->db->last_query();
    	return $imprtid;
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