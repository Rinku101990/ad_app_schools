<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Circulars_model extends CI_Model{ 

		// SAVE SYLLABUS DETAILS //
	public function save_circulars_records($cicularsArray)
	{
		$this->db->insert('cms_circulars', $cicularsArray);
        return $this->db->insert_id();
	}
	//  GET STUDENTS SEARCH RESULT BY SCHOOL ID AND CLASS ID //
	public function get_all_circulars_list()
	{
		$this->db->select('*');
		$this->db->from('cms_circulars');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET CIRCULAR DETAIL BY ID //
	public function get_circulars_details_by_id($crcl_id)
	{
		$this->db->select('*');
		$this->db->from('cms_circulars');
		$this->db->where('crcl_id', $crcl_id);
		$query = $this->db->get();
		return $query->row();
	}

	// UPDATE CIRCULARS //
	public function update_circulars_records($circl_id, $updateCicularsArray)
	{
		$this->db->where('crcl_id', $circl_id);
		$this->db->update('cms_circulars', $updateCicularsArray);
		return $circl_id;
	}
	// DELETE ASSIGNMENT DATA FROM DATABASE //
	public function delete_circulars_info_by_id($crclid)
	{
		$this->db->where('crcl_id', $crclid);
		$this->db->delete('cms_circulars');
		return $crclid;
	}

	public function off_circulars_status_by_id($crclid, $value)
    {
    	$this->db->where('crcl_id', $crclid);
    	$this->db->update('cms_circulars', $value);
    	//echo $this->db->last_query();
    	return $crclid;
    }
    public function on_circulars_status_by_id($crclid, $value)
    {
    	$this->db->where('crcl_id', $crclid);
    	$this->db->update('cms_circulars', $value);
    	//echo $this->db->last_query();
    	return $crclid;
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