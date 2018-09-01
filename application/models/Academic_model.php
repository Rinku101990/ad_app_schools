<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Academic_model extends CI_Model { 
    
    // SAVE ACADEMIC YEAR //
    public function save_academic_year($academicArray)
    {
        $this->db->insert('cms_academic_year', $academicArray);
        //echo $this->db->last_query();
        return $this->db->insert_id();

    }
    // UPDATE ACADEMIC YEAR //
    public function update_academic_year($year_id,$acadDateArry)
    {
        $this->db->where('acad_id', $year_id);
        $this->db->update('cms_academic_year', $acadDateArry);
        return $year_id;
    }
    // LOAD ACADEMIC YAER RECORD //
    public function get_all_academic_year()
    {
        $this->db->select('*');
        $this->db->from('cms_academic_year');
        //echo $this->db->last_query();
        $query = $this->db->get();
        return $query->result();
    }  
    // GET ACADEMIC YEAR DETAILS BY ID //
    public function get_academic_year_by_id($academic_id)
    {
        $this->db->select('*');
        $this->db->from('cms_academic_year');
        $this->db->where('acad_id', $academic_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->row();
    }  
    // DELETE ACADEMIC YEAR //
    public function delete_academic_year($year_id)
    {
        $this->db->where('acad_id', $year_id);
        $this->db->delete('cms_academic_year');
        return $year_id;
    }

}