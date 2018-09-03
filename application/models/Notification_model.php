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
      $this->db->select('cms_ref_id,cms_role');
      $this->db->from('cms_users');
      $this->db->where('cms_role',$roleid);
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->row();
    }

    // GET TEACHER LIST BASED ON ROLE //
    public function get_teachers_by_role($teacher_role)
    {
      $this->db->select('tchr_id,roles_id,tchr_name');
      $this->db->from('cms_teachers');
      $this->db->where('roles_id',$teacher_role);
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result();
    }

    // GET PARENTS LIST BASED ON ROLE //
    public function get_parents_by_role($parents_role)
    {
      $this->db->select('prnt_id,roles_id,prnt_gaurdian_name');
      $this->db->from('cms_parents');
      $this->db->where('roles_id',$parents_role);
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result();
    }

    // GET ALL CLASS LIST FOR STUDENTS //
    public function get_all_class_list()
    {
      $this->db->select('cls_id,cls_name');
      $this->db->from('cms_classes');
      $this->db->where('cls_status','0');
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result();
    }
    // GET ALL SECTION LIST FOR STUDENTS //
    public function get_all_section_list()
    {
      $this->db->select('sect_id,sect_name');
      $this->db->from('cms_sections');
      $this->db->where('sect_status','0');
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result();
    }
    
    // GET ALL SECTION LIST BY CLASS ID //
    public function get_all_sections_list_by_id($cls_id)
    {
      $this->db->select('sect_id,cls_id,sect_name');
      $this->db->from('cms_sections');
      $this->db->where('cls_id',$cls_id);
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result();
    }

    // GET PARENTS LIST BASED ON ROLE //
    public function get_all_students_by_section_by($sect_id)
    {
      $this->db->select('stud_id,sect_id,stud_name');
      $this->db->from('cms_students');
      $this->db->where('sect_id',$sect_id);
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result();
    }

    // SEND NOTIFICATION //
    public function save_notification_message($notifyArray)
    {
      $this->db->insert('cms_notifications', $notifyArray);
      return $this->db->insert_id();
    }

    // SAVE NOTIFICATION RECEIVER LIST //
    public function save_reciever_notification_list($receiverArray)
    {
      $this->db->insert_batch('cms_notify_recipients', $receiverArray);
      return $this->db->insert_id();
    }
    // SAVE CLASS NOTIFICATION LIST WHEN CLASS HAVE MORE THAN ONE //
    public function save_batch_class_notification_list($classArray)
    {
      $this->db->insert_batch('cms_notify_recipients_classes', $classArray);
      return $this->db->insert_id();
    }
    // SAVE CLASS NOTIFICATION LIST WHEN CLASS HAVE EQAUL TO ONE //
    public function save_single_class_notification_list($clsArray)
    {
      $this->db->insert('cms_notify_recipients_classes', $clsArray);
      return $this->db->insert_id();
    }
    // SAVE SECTION NOTIFICATION LIST WHEN CLASS HAVE EQUAL TO ONE //
    public function save_section_notification_list($sectArray)
    {
      $this->db->insert_batch('cms_notify_recipients_batches', $sectArray);
      return $this->db->insert_id();
    }

    // GET ALL NOTIFICATION LIST //
    public function get_all_notification_list()
    {
      $this->db->select('tmp.tmpl_name, ntfn.*');
      $this->db->from('cms_notifications ntfn');
      $this->db->join('cms_notifications_templates tmp','ntfn.ntfn_notification_type=tmp.tmpl_id','left');
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result();
    }
    // GET ALL ADMIN ROLES //
    public function get_all_roles()
    {
      $this->db->select('*');
      $this->db->from('cms_roles');
      $this->db->where('roles_status', '0');
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result();
    }

    // GET NOTIFICATION DETAILS BY ID //
    public function get_notification_detail_by_id($ntfnid, $roleid)
    {
      $this->db->select('role.roles_name,tmpl.tmpl_name,cls.cls_id,sect.sect_id, ntfn.*');
      $this->db->from('cms_notifications ntfn');
      $this->db->join('cms_roles role','ntfn.roles_id=role.roles_id','left');
      $this->db->join('cms_notifications_templates tmpl','ntfn.ntfn_notification_type=tmpl.tmpl_id','left');
      $this->db->join('cms_notify_recipients_classes cls',' ntfn.ntfn_id=cls.ntfn_id','left');
      $this->db->join('cms_notify_recipients_batches sect','ntfn.ntfn_id=sect.ntfn_id','left');
      $this->db->where('ntfn.ntfn_id', $ntfnid);
      $this->db->where('ntfn.roles_id', $roleid);
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->row();
    }

    // GET NO OF RECIPIENT BY ROLE AND NOTIFICATION SENDER ID //
    public function get_no_of_recipient_list($ntfnid, $roleid)
    {
      $this->db->select('rcr.receiver_id,rcr.rpnt_notification_read_status,tmpl.tmpl_name,ntfn.*');
      $this->db->from('cms_notifications ntfn');
      $this->db->join('cms_notify_recipients rcr','ntfn.ntfn_id=rcr.ntfn_id','left');
      $this->db->join('cms_notifications_templates tmpl','ntfn.ntfn_notification_type=tmpl.tmpl_id','left');
      $this->db->where('ntfn.ntfn_id', $ntfnid);
      $this->db->where('ntfn.roles_id', $roleid);
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result();
    }

}