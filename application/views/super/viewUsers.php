<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Users</h4>
    </div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/users/add');?>" class="btn btn-danger btn-xs"><i class="fa fa-plus"></i> Create New User</a></p></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                        <h4>Users and Roles</h4>
                        <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                            <?php echo $this->session->flashdata('message'); ?>
                        <?php } ?>
                      </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" value="None" id="check2" name="check"> All</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Role</th>
                                        <th>Username</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($users as $users_list){ ?>
                                    <tr>
                                      <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                      <td><?php echo $users_list->urs_name;?></td>
                                      <td><?php echo $users_list->urs_email;?></td>
                                      <td><?php echo $users_list->urs_mobile;?></td>
                                      <td><?php echo $users_list->roles_name;?></td>
                                      <td><?php echo $users_list->urs_username;?></td>
                                      <?php if(($users_list->urs_status)=="0"){ ?>
                                      <td>
                                        <label class="switch pull-right">
                                          <input type="checkbox" class="switch-input" checked="checked">
                                          <span class="switch-label" data-on="On" data-off="Off"></span>
                                          <span class="switch-handle"></span>
                                        </label>
                                      </td>
                                      <?php }else{ ?>
                                        <td>
                                          <label class="switch pull-right">
                                            <input type="checkbox" class="switch-input">
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                          </label>
                                        </td>
                                      <?php } ?>
                                      <td>
                                         <a href="<?php echo base_url('super/users/add');?>/<?php echo $users_list->cms_id;?>/<?php echo $users_list->urs_id;?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> </a>
                                         <a onclick="return confirm('are you sure want to delete!.')" href="<?php echo base_url('super/users/delete');?>/<?php echo $users_list->cms_id;?>/<?php echo $users_list->urs_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                                         <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> Notify</button>
                                         <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key"></i> Send Credentials</button>
                                       </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th colspan="8">
                                      <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                      <button type="button" class="btn btn-success btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                      <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                      <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> Send Notification</button>
                                      <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key"></i> Send Credentials</button>
                                    </th>
                                  </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>