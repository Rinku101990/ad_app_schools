<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students_excel_report extends CI_Model
{

	public function get_students_list_by_id_in_excel($studentsids)
	{
	    $this->db->select('prnt.prnt_gaurdian_name,std.stud_name,std.stud_mobile_no,std.stud_email,std.stud_id,std.stud_ref_id,std.stud_address,std.stud_pincode');
	    $this->db->from('cms_students std');
	    $this->db->join('cms_parents prnt','std.prnt_id=prnt.prnt_id','left');
	    $this->db->where_in('std.stud_id', $studentsids);
	    $query = $this->db->get();
		return $query->result();
	}

}
