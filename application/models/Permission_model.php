<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission_model extends CI_Model { 

	//  GET ALL USERS LIST //
	public function get_all_users_list()
	{
		$this->db->select('*');
		$this->db->from('cms_roles');
		$this->db->where('roles_status', '0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
	// GET MENU LIST FOR ROLE PERMITTED //
	public function get_role_assigned_id($prmid)
	{
		$this->db->select('roles_id');
		$this->db->from('cms_roles');
		$this->db->where('roles_id', $prmid);
		$this->db->where('roles_status', '0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}

	// GET ALL ACTIVE MENU LIST //
	public function get_all_menu_list()
	{
		$this->db->select('*');
		$this->db->from('cms_menu');
		$this->db->where('menu_status','0');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	// GET ALL MENU LIST ASSIGNED TO ROLE BASED USERS //
	public function get_all_role_menu_permission($roleid)
	{
		$this->db->select('*');
		$this->db->from('cms_menu_role_permission');
		$this->db->where('roles_id', $roleid);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	// GET ROLE PERMISSIONS //
	/**
     * @param $table_name
     * @param array  $where
     * @param string $fields
     * @return mixed
     */
    public function get ($table_name, $where = [], $fields = '*')
    {
       
        $this->db->select ($fields);
        if (count ($where) > 0)
        {
            $this->db->where ($where);
        }
        $result = $this->db->get($table_name);
        echo $this->db->last_query();
        return $result;
    }
	// UPDATE ROLE PERMISSIONS //
	/**
     * @param $table_name
     * @param $data
     * @param $where
     * @return mixed
     */
	public function update_role_permissions ($table_name, $data, $where)
    {
        $this->db->update ($table_name, $data, $where);
        if ($this->db->affected_rows () > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // INSERT ROLE PERMISSIONS //
    /**
     * @param $table_name
     * @param $data
     * @return mixed
     */
    public function insert_role_permission ($table_name, $data)
    {
        $this->db->insert ($table_name, $data);
        if ($this->db->affected_rows () > 0)
        {
            return $this->db->insert_id ();
        }
        else
        {
            return false;
        }
    }

}