<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends CI_Controller {
	
	// LOAD CONSTRUCT FUNCTION TO INITIALIZE CLASS OBJECTS //
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Permission_model','prm');
	}

	// LOAD ALL USERS LIST FOR PERMISSION //
	public function index()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$data['roles'] = $this->prm->get_all_users_list();

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/viewRolePermissions', $data);
		$this->load->view('super/includes/footer');
	}

	// CHECK MENU LIST FOR ROLES //
	public function check_roles_status()
	{
		$prmid = $this->input->post('perimission_id');
		$data['permit_list'] = $this->prm->get_role_assigned_id($prmid);
		echo json_encode($data);
	}

	// SHOW PERMISSION BY ACTIVE ROLE ID //

	public function show()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}

		$roleid = $this->uri->segment(4);
		$data['role_id'] = $roleid;
		$data['roles'] = $this->prm->get_all_users_list();
		$data['menu_list'] = $this->prm->get_all_menu_list();
		$data['role_menu_permission'] = $this->prm->get_all_role_menu_permission($roleid);

		// echo "<pre>";
		// print_r($data);die;

		$this->load->view('super/includes/header');
		$this->load->view('super/includes/sidebar');
		$this->load->view('super/includes/top_header');
		$this->load->view('super/viewPermissions',$data);
		$this->load->view('super/includes/footer');
	}

	// SET ROLE PERMISSION BY MASTER ADMIN //
	public function save()
	{
		$reference = $this->session->userdata('logged_in');
		if(empty($reference)){
			redirect('','refresh');
		}
		$session_id = $reference['cms_ref_id'];

		$status=0;
       
        $menuIdArr = $this->input->post ('menu_id');
		
        foreach($menuIdArr as $uniqMenuId)
        {
            $where['menu_id'] = $uniqMenuId;
            $where['roles_id'] = $roleId = $this->input->post('role_id');

   			// echo "<pre>";
			// print_r($where);die;

            $add = $edit = $delete = $view= '';
            $id  = $this->input->post ('ids'.$uniqMenuId);
            
            $add   = $this->input->post('add_permission'.$uniqMenuId);
            $edit  = $this->input->post('edit_permission'.$uniqMenuId);
            $delete= $this->input->post('delete_permission'.$uniqMenuId);
            $view  = $this->input->post('view_permission'.$uniqMenuId);

            $update['prms_add']   = isset($add)?$add:0;
            $update['prms_edit']  = isset($edit)?$edit:0;
            $update['prms_delete']= isset($delete)?$delete:0;
            $update['prms_view']  = isset($view)?$view:0;
            $update['prms_status'] = $status;
            $update['prms_created_by_who'] = $session_id;
            $update['prms_created'] = date('Y-m-d H:i:s');
            $update['prms_updated'] = date('Y-m-d H:i:s');
            $update['menu_id'] 	  = $uniqMenuId;
            $update['roles_id'] 	  = $roleId;

			// echo "<pre>";
			// print_r($update);die;

            if(isset($roleId) && $roleId!='')
            {
               
                $existRec = $this->prm->get('cms_menu_role_permission', $where);
                // echo "<pre>";
                // print_r($existRec);die;
                if($existRec->num_rows () > 0)
                {
                    $this->prm->update_role_permissions('cms_menu_role_permission', $update, $where);
                }else{
                    $this->prm->insert_role_permission('cms_menu_role_permission', $update);
                }
            }
        }
        $this->session->set_flashdata('message','<span class="text-success pull-right" style="font-weight:bold">Role Privilege updated successfully.</span>');
        redirect ('super/permissions/show/'.$roleId);
	}

	

}