<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students_pdf_model extends CI_Model { 

	public function generate_students_pdf($studentsids) {
        
		$studentsids1 = $studentsids;
		$count = 0;
        foreach ($studentsids1 as $sdid){
           $sddid1 = intval($sdid).'';
           $this->db->select('*');
           $this->db->from('cms_students');
		   $this->db->where('stud_id', $sddid1);
		   $query = $this->db->get();
           $count = $count+1;
        }
		//echo $this->db->last_query();
		return $query->result();

    }

}