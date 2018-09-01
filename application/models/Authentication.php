<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Model { 
    
    // AUTHERIZATION OF USER FROM DATABASE //
    public function verification($username, $userpass)
    {
        $this->db->select('*');
        $this->db->from('cms_users');
        $this->db->where('cms_ref_id', $username);
        $this->db->where('cms_password', $userpass);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

}