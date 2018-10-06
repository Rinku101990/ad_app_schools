<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Holidays_model extends CI_Model{ 

		// SAVE SYLLABUS DETAILS //
	public function save_holidays_records($holidaysArray)
	{
		$this->db->insert('cms_holidays', $holidaysArray);
        return $this->db->insert_id();
	}
	//  GET STUDENTS SEARCH RESULT BY SCHOOL ID AND CLASS ID //
	public function get_all_holidays_list()
	{
		$this->db->select('schl.schl_name,crcl.crcl_name,hldy.*');
		$this->db->from('cms_holidays hldy');
		$this->db->join('cms_schools schl','hldy.schl_id=schl.schl_id','left');
		$this->db->join('cms_circulars crcl','hldy.crcl_id=crcl.crcl_id','left');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	// GET ALL ACTIVE CIRCULAR LIST //
	public function get_circulars_information_list()
	{
		$this->db->select('*');
		$this->db->from('cms_circulars');
		$this->db->where('crcl_status', '0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// DELETE ASSIGNMENT DATA FROM DATABASE //
	public function delete_holidays_info_by_id($hldyid)
	{
		$this->db->where('hldy_id', $hldyid);
		$this->db->delete('cms_holidays');
		return $hldyid;
	}

	public function off_holidays_status_by_id($hldyid, $value)
    {
    	$this->db->where('hldy_id', $hldyid);
    	$this->db->update('cms_holidays', $value);
    	//echo $this->db->last_query();
    	return $hldyid;
    }
    public function on_holidays_status_by_id($hldyid, $value)
    {
    	$this->db->where('hldy_id', $hldyid);
    	$this->db->update('cms_holidays', $value);
    	//echo $this->db->last_query();
    	return $hldyid;
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