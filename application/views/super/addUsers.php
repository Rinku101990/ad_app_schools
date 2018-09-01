<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Users</h4>
    </div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/users');?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> All Users List</a></p></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <h4>Create New User</h4>
                        <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                            <?php echo $this->session->flashdata('message'); ?>
                        <?php } ?>
                    </div>
                    <div class="panel-body">
                      <?php if(!empty($users)){?>
                        <form method="post" action="<?php echo base_url('super/users/update');?>" class="form-horizontal">
                            <fieldset>
                              <div class="form-group col-lg-12">
                                <label class="col-lg-3 control-label">Select School</label>
                                <div class="col-lg-9">
                                  <input type="hidden" name="user_id" id="user_id" value="<?php echo $users->urs_id;?>">
                                  <input type="hidden" name="master_id" id="master_id" value="<?php echo $users->cms_id;?>">
                                  <select class="form-control" name="school_name" id="school_name">
                                    <option value="">Select School</option>
                                    <?php foreach($schools as $details){ ?>
                                      <option value="<?php echo $details->schl_id;?>" <?php echo $details->schl_id==$users->schl_id?'selected':''?>><?php echo $details->schl_name;?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter full name." value="<?php echo $users->urs_name;?>">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Email Id</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Enetr email address" value="<?php echo $users->urs_email;?>">
                                        <span id="emailAvailableStatus"></span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Mobile No</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter mobile no" value="<?php echo $users->urs_mobile;?>">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Address</label>
                                    <div class="col-lg-9">
                                        <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter address"><?php echo $users->urs_mobile;?></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                  <label class="col-lg-3 control-label">Qualification</label>
                                  <div class="col-lg-9">
                                    <select class="form-control" name="qualification" id="qualification">
                                      <option>Select Qualification</option>
                                      <option value="bsa"<?php echo $users->urs_qualification=='bsc'?'selected':''?>>Bachelor of Agriculture</option>
                                      <option value="barch"<?php echo $users->urs_qualification=='barch'?'selected':''?>>Bachelor of Architecture</option>
                                      <option value="ba"<?php echo $users->urs_qualification=='ba'?'selected':''?>>Bachelor of Arts</option>
                                      <option value="bams"<?php echo $users->urs_qualification=='bams'?'selected':''?>>Bachelor of Ayurvedic Medicine & Surgery</option>
                                      <option value="bba"<?php echo $users->urs_qualification=='bba'?'selected':''?>>Bachelor of Business Administration</option>
                                      <option value="bcom"<?php echo $users->urs_qualification=='bcom'?'selected':''?>>Bachelor of Commerce</option>
                                      <option value="bca"<?php echo $users->urs_qualification=='barch'?'selected':''?>>Bachelor of Computer Applications</option>
                                      <option value="bsc"<?php echo $users->urs_qualification=='bsc'?'selected':''?>>Bachelor of Computer Science</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group col-lg-12">
                                  <label class="col-lg-3 control-label">Role</label>
                                  <div class="col-lg-9">
                                    <select class="form-control" name="roles" id="roles">
                                      <option>Select Roll</option>
                                      <?php foreach($roles as $role_list){ ?>
                                        <option value="<?php echo $role_list->roles_id;?>" <?php echo $role_list->roles_id==$users->roles_id?'selected':''?>><?php echo $role_list->roles_name;?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                  </div>
                                  <div class="form-group col-lg-12 username">
                                      <label class="col-lg-3 control-label">Username</label>
                                      <div class="col-lg-9">
                                          <input type="text" class="form-control" name="userid" id="userid" readonly="readonly" value="<?php echo $users->urs_username;?>">
                                      </div>
                                  </div>
                                  <div class="form-group col-lg-12 password">
                                      <label class="col-lg-3 control-label">Password</label>
                                      <div class="col-lg-9">
                                          <input type="text" class="form-control" name="password" id="password" readonly="readonly" value="<?php echo $users->urs_password;?>">
                                      </div>
                                  </div>
                            </fieldset>
                            <div class="form-group">
                              <div class="col-lg-6 col-lg-offset-6">
                                  <button type="submit" class="btn btn-success" style="margin-left: 109px">Update User</button>
                              </div>
                            </div>
                        </form>
                      <?php }else{ ?>
                        <form method="post" action="<?php echo base_url('super/users/create');?>" class="form-horizontal">
                            <fieldset>
                              <div class="form-group col-lg-12">
                                <label class="col-lg-3 control-label">Select School</label>
                                <div class="col-lg-9">
                                  <select class="form-control" name="school_name" id="school_name">
                                    <option value="">Select School</option>
                                    <?php foreach($schools as $details){ ?>
                                      <option value="<?php echo $details->schl_id;?>"><?php echo $details->schl_name;?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter full name.">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Email Id</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Enetr email address">
                                        <span id="emailAvailableStatus"></span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Mobile No</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter mobile no">
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Address</label>
                                    <div class="col-lg-9">
                                        <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                  <label class="col-lg-3 control-label">Qualification</label>
                                  <div class="col-lg-9">
                                    <select class="form-control" name="qualification" id="qualification">
                                      <option>Select Qualification</option>
                                      <option value="bsa">Bachelor of Agriculture</option>
                                      <option value="barch">Bachelor of Architecture</option>
                                      <option value="ba">Bachelor of Arts</option>
                                      <option value="bams">Bachelor of Ayurvedic Medicine & Surgery</option>
                                      <option value="bba">Bachelor of Business Administration</option>
                                      <option value="bcom">Bachelor of Commerce</option>
                                      <option value="barch">Bachelor of Computer Applications</option>
                                      <option value="bsc">Bachelor of Computer Science</option>
                                    </select>
                                  </div>
                                </div>
                                <!-- <div class="form-group col-lg-12">
                                  <label class="col-lg-3 control-label">Designation</label>
                                  <div class="col-lg-9">
                                    <select class="form-control" name="designation" id="designation">
                                      <option>Select Designation</option>
                                      <option value="admin">Admin</option>
                                      <option value="mgnt">Management</option>
                                      <option value="tchr">Teachers</option>
                                      <option value="prt">Parents</option>
                                      <option value="std">Students</option>
                                    </select>
                                  </div>
                                </div> -->
                                <div class="form-group col-lg-12">
                                  <label class="col-lg-3 control-label">Role</label>
                                  <div class="col-lg-9">
                                    <select class="form-control" name="roles" id="roles">
                                      <option>Select Roll</option>
                                      <?php foreach($roles as $role_list){ ?>
                                        <option value="<?php echo $role_list->roles_id;?>"><?php echo $role_list->roles_name;?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                  </div>
                                  <div class="form-group col-lg-12 username" style="display: none">
                                      <label class="col-lg-3 control-label">Username</label>
                                      <div class="col-lg-9">
                                          <input type="text" class="form-control" name="userid" id="userid" readonly="readonly">
                                      </div>
                                  </div>
                                  <div class="form-group col-lg-12 password" style="display: none">
                                      <label class="col-lg-3 control-label">Password</label>
                                      <div class="col-lg-9">
                                          <input type="text" class="form-control" name="password" id="password" readonly="readonly">
                                      </div>
                                  </div>
                            </fieldset>
                            <div class="form-group">
                              <div class="col-lg-6 col-lg-offset-6">
                                  <button type="submit" class="btn btn-success" style="margin-left: 109px">Create User</button>
                              </div>
                            </div>
                        </form>
                      <?php } ?>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>