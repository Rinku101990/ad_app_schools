<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Parents and Gaurdians</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
      <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <p><a href="<?php echo base_url('super/parents');?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> All Parents List</a></p>
        </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="panel panel-yellow">
                <div class="panel-body">
                <?php if(!empty($prnt_info)){ ?>
                  <form action="<?php echo base_url('super/parents/update');?>" method="post" enctype="multipart/form-data" class="form-horizontal bv-form">
                    <fieldset>
                      <legend>Personal Information</legend>
                        <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                            <?php echo $this->session->flashdata('message'); ?>
                        <?php } ?>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Gaurdians Name</label>
                          <div class="col-lg-8">
                            <input type="hidden" name="parents_id" id="parents_id" value="<?php echo $prnt_info->prnt_id;?>">
                            <input type="hidden" name="master_id" id="master_id" value="<?php echo $prnt_info->cms_id;?>">
                            <input type="text" class="form-control" name="gaurdian_name" id="gaurdian_name" placeholder="Gaurdians Name" value="<?php echo $prnt_info->prnt_gaurdian_name;?>">
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Father Name</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name" value="<?php echo $prnt_info->prnt_father_name;?>">
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Mother Name</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Mother Name" value="<?php echo $prnt_info->prnt_mother_name;?>">
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Profile Picture</label>
                          <div class="col-lg-6">
                            <input type="file" class="form-control" name="userfile" id="userfile" required="required">
                          </div>
                          <?php if(($prnt_info->prnt_picture)!=''){ ?>
                          <div class="col-lg-2">
                            <img src="<?php echo base_url();?><?php echo $prnt_info->prnt_picture;?>" style="width:180px;height:80px" class="img-thumbnail">
                          </div>
                          <?php }else{ ?>
                            <div class="col-lg-2">
                              <img src="<?php echo base_url('uploads/parents/profile/profile.jpg');?>" style="width:180px;height:80px" class="img-thumbnail">
                            </div>
                          <?php } ?>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Gender</label>
                          <div class="col-lg-8">
                            <div class="input-group">
                              <div class="round-radio">
                                <input type="radio" value="0" id="male" name="gender"  <?php echo $prnt_info->prnt_gender=='0'?'checked':''?>>
                                <label for="radio1"></label>
                                <div class="cb-label">Male</div>
                              </div>
                              <div class="round-radio">
                                <input type="radio" value="1" id="female" name="gender" <?php echo $prnt_info->prnt_gender=='1'?'checked':''?>>
                                <label for="radio2"></label>
                                <div class="cb-label">Female</div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </fieldset>
                    <fieldset>
                      <legend>Contact Details</legend>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Mobile Number</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="123 456 7890" value="<?php echo $prnt_info->prnt_mobile_no;?>">
                            <span id="parents_mobile_available"></span>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Email Id</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="email_id" id="email_id" placeholder="abc@xyz.com" value="<?php echo $prnt_info->prnt_email;?>">
                            <span id="parents_email_available"></span>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Address</label>
                          <div class="col-lg-8">
                            <textarea class="form-control" name="address" id="address" required="required"><?php echo $prnt_info->prnt_address;?></textarea>
                          </div>
                        </div>
                    </fieldset>
                    <fieldset>
                      <legend>Profession Information</legend>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Father Profession</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="father_profession" id="father_profession" placeholder="Business name" value="<?php echo $prnt_info->prnt_father_profession;?>">
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Mother Profession</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="mother_profession" id="mother_profession" placeholder="House Wife" value="<?php echo $prnt_info->prnt_mother_profession;?>">
                          </div>
                        </div>
                    </fieldset>
                    <fieldset>
                      <legend>Credentials</legend>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Username</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="parent_username" id="parent_username" value="<?php echo $prnt_info->prnt_reference_id;?>" disabled="disabled">
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Password</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="parent_password" id="parent_password" value="<?php echo $prnt_info->prnt_password;?>" disabled="disabled">
                          </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                      <div class="col-lg-6 col-lg-offset-6">
                        <button type="submit" class="btn btn-success" style="margin-left: 61px">Update Parent</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                      </div>
                    </div>
                  </form>
                <?php }else{ ?>
                  <form action="<?php echo base_url('super/parents/create');?>" method="post" enctype="multipart/form-data" class="form-horizontal bv-form">
                    <fieldset>
                      <legend>Personal Information</legend>
                        <div class="form-group has-feedback">
                          <input type="hidden" name="parent_id" value="<?php echo $role->roles_id;?>">
                          <label class="col-lg-4 control-label">Gaurdians Name</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="gaurdian_name" id="gaurdian_name" placeholder="Gaurdians Name" required="required">
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Father Name</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name" required="required">
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Mother Name</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Mother Name" required="required">
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Profile Picture</label>
                          <div class="col-lg-8">
                            <input type="file" class="form-control" name="userfile" id="userfile" required="required">
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Gender</label>
                          <div class="col-lg-8">
                            <div class="input-group">
                              <div class="round-radio">
                                <input type="radio" value="0" id="male" name="gender" checked="">
                                <label for="radio1"></label>
                                <div class="cb-label">Male</div>
                              </div>
                              <div class="round-radio">
                                <input type="radio" value="1" id="female" name="gender">
                                <label for="radio2"></label>
                                <div class="cb-label">Female</div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </fieldset>
                    <fieldset>
                      <legend>Contact Details</legend>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Mobile Number</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="123 456 7890" required="required">
                            <span id="parents_mobile_available"></span>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Email Id</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="email_id" id="email_id" placeholder="abc@xyz.com" required="required">
                            <span id="parents_email_available"></span>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Address</label>
                          <div class="col-lg-8">
                            <textarea class="form-control" name="address" id="address" required="required"></textarea>
                          </div>
                        </div>
                    </fieldset>
                    <fieldset>
                      <legend>Profession Information</legend>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Father Profession</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="father_profession" id="father_profession" placeholder="Business name" required="required">
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Mother Profession</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="mother_profession" id="mother_profession" placeholder="House Wife" required="required">
                          </div>
                        </div>
                    </fieldset>
                    <fieldset>
                      <legend>Credentials</legend>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Username</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="parent_username" id="parent_username" value="<?php echo $ref_id;?>" readonly="readonly">
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <label class="col-lg-4 control-label">Password</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" name="parent_password" id="parent_password" value="<?php echo uniqid(999);?>" readonly="readonly">
                          </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                      <div class="col-lg-6 col-lg-offset-6">
                        <button type="submit" class="btn btn-success" style="margin-left: 65px">Create Parent</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
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