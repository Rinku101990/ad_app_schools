<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notification_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // SAVE ALL NOTIFICATION TEMPLATES //
    public function save_notification_template($templateArray)
    {
    	$this->db->insert('cms_notifications_templates', $templateArray);
    	return $this->db->insert_id();
    }
    // GET ALL NOTIFICATION TEMPLATES //
    public function get_all_notification_templates()
    {
    	$this->db->select('*');
		$this->db->from('cms_notifications_templates');
		$this->db->where('tmpl_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
    }
    // DELETE TEMPLATES //
    public function delete_template($tmpl_id)
    {
    	$this->db->where('tmpl_id', $tmpl_id);
    	$this->db->delete('cms_notifications_templates');
    	return $tmpl_id;
    }

    // GET ALL SCHOOL LIST //
    public function get_all_school_list()
    {
    	$this->db->select('*');
		$this->db->from('cms_schools');
		$this->db->where('schl_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
    }
    // GET ALL USERS LIST //
    public function get_all_users_list()
    {
    	$this->db->select('*');
		$this->db->from('cms_roles');
		$this->db->where('roles_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
    }
    // GET ALL NOTIFICATION TEMPLATES //
    public function get_all_templates()
    {
    	$this->db->select('*');
		$this->db->from('cms_notifications_templates');
		$this->db->where('tmpl_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
    }
    // GET TEMPLATE CONTENT BY ID //
    public function get_template_content_by_id($template_id)
    {
    	$this->db->select('tmpl_descriptions');
		$this->db->from('cms_notifications_templates');
		$this->db->where('tmpl_id',$template_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
    }
    // GET ALL RECIPIENT BY ROLE ID //
    public function get_recipient_by_role_id($roleid)
    {
    	$this->db->select('roles_id,urs_id,urs_name');
		$this->db->from('cms_users_registered_by_master');
		$this->db->where('roles_id',$roleid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
    }

    // SEND NOTIFICATION //
    public function save_notification_message($notificationArray)
    {
    	$this->db->insert('cms_notifications', $notificationArray);
    	return $this->db->insert_id();
    }

}