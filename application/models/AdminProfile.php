<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminProfile extends CI_Model { 

	public function get_admin_profile_information($sid)
	{
		$this->db->select('cmsu.cms_ref_id,cmsu.cms_email,cmsu.cms_password,adpr.*');
		$this->db->from('cms_admin_profile adpr');
		$this->db->join('cms_users cmsu','adpr.cms_id=cmsu.cms_id','left');
		$this->db->where('adpr.cms_id', $sid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	// GET SESSION PASSWORD //
	public function get_session_password($sid)
	{
		$this->db->select('cms_password');
		$this->db->from('cms_users');
		$this->db->where('cms_id', $sid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	// UPDATE SUPER ADMIN PROFILE RECORD //
	public function update_super_admin_profile($profile_id, $profileArray)
	{
		$this->db->where('adpro_id', $profile_id);
		$this->db->update('cms_admin_profile', $profileArray);
		return $profile_id;
	}
	// UPDATE SUPER ADMIN PASSWORD //
	public function update_master_admin_profile($sid, $masterArry)
	{
		$this->db->where('cms_id', $sid);
		$this->db->update('cms_users', $masterArry);
		return $sid;
	}

}