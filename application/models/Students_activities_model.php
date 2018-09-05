<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students_activities_model extends CI_Model {


	// GET STUDENTS PROFILE DETAILS //
	public function get_students_profile_record($stu_id,$stu_role)
	{
		$this->db->select('*');
		$this->db->from('cms_students');
		$this->db->where('cms_id',$stu_id);
		$this->db->where('roles_id',$stu_role);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}


	// GET MENU LIST BASED ON ROLE PERMISSION
	public function get_menu_role_permissions($stu_role)
	{
		$this->db->select('mn.menu_name, mr.*');
		$this->db->from('cms_menu_role_permission mr');
		$this->db->join('cms_menu mn','mr.menu_id=mn.menu_id','left');
		$this->db->where('roles_id', $stu_role);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	// GET ALL UNREAD NOTIFICATION //
	// public function get_all_unread_notification($unread)
	// {
	// 	$this->db->select('COUNT(ntfn_notification_read_status) as message');		
	// 	$query = $this->db->get('cms_notifications');
	// 	$this->db->where('ntfn_notification_read_status',$unread);
	// 	$count = $query->row_array();
	// 	return $count;
	// }
	// GET ALL UNREAD NOTIFICATION //
	public function get_all_unread_notification($studentid,$studentrole)
	{
		$this->db->select('COUNT(rpnt_id) AS Msg');
		$this->db->from('cms_notify_recipients');
		$this->db->where('receiver_id',$studentid);
		$this->db->where('receiver_role',$studentrole);
		$this->db->where('rpnt_notification_read_status','0');		
		$query = $this->db->get();
		$count = $query->row_array();
		//echo $this->db->last_query();
		return $count;
	}
	// GET NOTIFICATION DETAIL LIST //
	public function get_all_unread_notification_detail_list($studentid,$studentrole)
	{
		$this->db->select('tmpl.tmpl_name,ntfn.ntfn_notification_message, cnr.*');
		$this->db->from('cms_notify_recipients cnr');
		$this->db->join('cms_notifications ntfn','cnr.ntfn_id=ntfn.ntfn_id','left');
		$this->db->join('cms_notifications_templates tmpl','ntfn.ntfn_notification_type=tmpl.tmpl_id','left');
		$this->db->where('cnr.receiver_id',$studentid);
		$this->db->where('cnr.receiver_role',$studentrole);
		$this->db->where('cnr.rpnt_notification_read_status','0');		
		$query = $this->db->get();
		return $query->result();
	}
	// GET ALL NOTIFICATION LIST READ AND UNREAD //
	public function get_all_notifications_list_read_unread($studentid,$studentrole)
	{
		$this->db->select('tmpl.tmpl_name,ntfn.ntfn_sender_ref_id,ntfn.ntfn_notification_message, cnr.*');
		$this->db->from('cms_notify_recipients cnr');
		$this->db->join('cms_notifications ntfn','cnr.ntfn_id=ntfn.ntfn_id','left');
		$this->db->join('cms_notifications_templates tmpl','ntfn.ntfn_notification_type=tmpl.tmpl_id','left');
		$this->db->where('cnr.receiver_id',$studentid);
		$this->db->where('cnr.receiver_role',$studentrole);		
		$query = $this->db->get();
		return $query->result();
	}

	// GET NOTIFICATION DETAIL BY ID AND ROLE //
	public function get_notifications_detail_by_id_and_role($notifyid,$roleid)
	{
		$this->db->select('ntfn.ntfn_sender_ref_id,ntfn.ntfn_notification_message,tmpl.tmpl_name,reci.*');
		$this->db->from('cms_notify_recipients reci');
		$this->db->join('cms_notifications ntfn','reci.ntfn_id=ntfn.ntfn_id','left');
		$this->db->join('cms_notifications_templates tmpl','ntfn.ntfn_notification_type=tmpl.tmpl_id','left');
		$this->db->where('reci.rpnt_id',$notifyid);
		$this->db->where('reci.receiver_role',$roleid);		
		$query = $this->db->get();
		return $query->row();
	}

	// GET LATEST NOTIFICATION DETAIL LIST //
	public function get_latest_last_notification($studentid,$studentrole)
	{
		$this->db->select('tmpl.tmpl_name,ntfn.ntfn_notification_message, cnr.*');
		$this->db->from('cms_notify_recipients cnr');
		$this->db->join('cms_notifications ntfn','cnr.ntfn_id=ntfn.ntfn_id','left');
		$this->db->join('cms_notifications_templates tmpl','ntfn.ntfn_notification_type=tmpl.tmpl_id','left');
		$this->db->where('cnr.receiver_id',$studentid);
		$this->db->where('cnr.receiver_role',$studentrole);
		$this->db->where('cnr.rpnt_notification_read_status','0');
		$this->db->limit('1');
        $this->db->order_by('cnr.rpnt_id','DESC');		
		$query = $this->db->get();
		return $query->row();
	}

	// GET PROFILE RECORD OF STUDENT BY ID //
	public function view_students_profile($id)
	{
		$this->db->select('*');
		$this->db->from('cms_students');
		$this->db->where('stud_id', $id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}

	// VERIFY STUDENTS PASSWORD //
	public function verify_old_password($mid, $cpassword)
	{
		$this->db->select('cms_password');
		$this->db->from('cms_users');
		$this->db->where('cms_id', $mid);
		$this->db->where('cms_password', $cpassword);
		$query = $this->db->get();
		return $query->row();
	}
	// CHANGE MASTER STUDENT LOGIN PASSWORD //
	public function update_students_master_login_pass($mid, $studMasterPassArray)
	{
		$this->db->where('cms_id', $mid);
		$this->db->update('cms_users', $studMasterPassArray);
		return $mid;
	}
	// CHANGE PROFILE STUDENT LOGIN PASSWORD //
	public function update_students_profile_password($id, $mid, $studPassArray)
	{
		$this->db->where('stud_id', $id);
		$this->db->where('cms_id', $mid);
		$this->db->update('cms_students', $studPassArray);
		return $id;
	}
}
