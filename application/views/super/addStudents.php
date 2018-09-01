<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Students</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
      <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/students');?>" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i> All Students List</a></p></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-body">
                        <?php if(!empty($stud_info)){ ?>
                        <form method="post" action="<?php echo base_url('super/students/update');?>" class="form-horizontal bv-form" enctype="multipart/form-data">
                            <fieldset>
                                <legend>Personal Information</legend>
                                <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                                    <?php echo $this->session->flashdata('message'); ?>
                                <?php } ?>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Select School</label>
                                    <div class="col-lg-8">
                                        <input type="hidden" name="student_id" value="<?php echo $stud_info->stud_id;?>">
                                        <input type="hidden" name="master_id" value="<?php echo $stud_info->cms_id;?>">
                                        <select class="form-control" name="school_id" id="school_id" required="required">
                                            <option value="">Select School</option>
                                            <?php foreach($schools as $schools_list){ ?>
                                                <option value="<?php echo $schools_list->schl_id;?>" <?php echo $schools_list->schl_id==$stud_info->schl_id?'selected':''?>><?php echo $schools_list->schl_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Select Parents</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="parents_id" required="required">
                                            <option value="">Select Parents</option>
                                            <?php foreach($parents as $parents_list){ ?>
                                                <option value="<?php echo $parents_list->prnt_id;?>" <?php echo $parents_list->prnt_id==$stud_info->prnt_id?'selected':''?>><?php echo $parents_list->prnt_gaurdian_name;?>-(<?php echo $parents_list->prnt_reference_id;?>)</option>
                                            <?php } ?>
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                  <label class="col-lg-4 control-label">Name</label>
                                  <div class="col-lg-8">
                                      <input type="text" class="form-control" name="student_name" placeholder="Student name" required="required" value="<?php echo $stud_info->stud_name;?>">
                                  </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">DOB</label>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control" name="student_dob"  placeholder="Student dob" required="required" value="<?php echo $stud_info->stud_dob;?>">
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Religion</label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" name="student_religion" placeholder="Student religion" value="<?php echo $stud_info->stud_religion;?>">
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Place of Birth</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="student_pob" placeholder="Place of Birth" value="<?php echo $stud_info->stud_place_of_birth;?>">
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Blood Group</label>
                                    <div class="col-lg-8">
                                          <input type="text" class="form-control" name="student_bgroup" placeholder="Blood Group" value="<?php echo $stud_info->stud_blood_group;?>">
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Profile Picture</label>
                                    <div class="col-lg-6">
                                          <input type="file" class="form-control" name="userfile" required="required">
                                    </div>
                                    <?php if(($stud_info->stud_picture)!=''){ ?>
                                    <div class="col-lg-2">
                                        <img src="<?php echo base_url();?><?php echo $stud_info->stud_picture;?>" style="width:180px;height:80px" class="img-thumbnail">
                                    </div>
                                    <?php }else{ ?>
                                    <div class="col-lg-2">
                                        <img src="<?php echo base_url('uploads/students/profile/profile.jpg');?>" style="width:180px;height:80px" class="img-thumbnail">
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group has-feedback">
                                  <label class="col-lg-4 control-label">Gender</label>
                                  <div class="col-lg-8">
                                    <div class="input-group">
                                      <div class="round-radio">
                                        <input type="radio" value="0" id="male" name="gender"  <?php echo $stud_info->stud_gender=='0'?'checked':''?>>
                                        <label for="radio1"></label>
                                        <div class="cb-label">Male</div>
                                      </div>
                                      <div class="round-radio">
                                        <input type="radio" value="1" id="female" name="gender" <?php echo $stud_info->stud_gender=='1'?'checked':''?>>
                                        <label for="radio2"></label>
                                        <div class="cb-label">Female</div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Select Class</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="class_name" id="classes" required="required">
                                        </select>
                                        <span class="text-danger">Please select school</span>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Select Section</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="section_name" id="section" required="required">
                                        </select>
                                        <span class="text-danger">Please select class</span>
                                    </div>
                                </div>
                                </fieldset>
                                <fieldset>
                                <legend>Contact Information</legend>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Student Email</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="student_email" id="student_email" placeholder="Student email" value="<?php echo $stud_info->stud_email;?>">
                                        <span id="students_email_available"></span>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Mobile</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="student_mobile" id="student_mobile" placeholder="Student mobile" value="<?php echo $stud_info->stud_mobile_no;?>">
                                        <span id="students_mobile_available"></span>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Address</label>
                                    <div class="col-lg-8">
                                        <textarea type="text" class="form-control" name="student_address" placeholder="Address"><?php echo $stud_info->stud_address;?></textarea>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Select Country</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="country">
                                            <option>Select Country</option>
                                            <option value="1" <?php echo $stud_info->stud_country=='1'?'selected':''?>>India</option>
                                            <option value="2" <?php echo $stud_info->stud_country=='2'?'selected':''?>>Dubai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Postal Code</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="student_pcode" placeholder="Postal Code" value="<?php echo $stud_info->stud_pincode;?>">
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Remarks</label>
                                    <div class="col-lg-8">
                                        <textarea type="text" class="form-control" name="student_remark" placeholder="Something About Student"><?php echo $stud_info->stud_about_yourself;?></textarea>
                                    </div>
                                </div>
                                </fieldset>
                                <legend>Credentials</legend>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Username</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="student_username" value="<?php echo $stud_info->stud_ref_id;?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Password</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="student_password" value="<?php echo $stud_info->stud_password;?>"  readonly="readonly">
                                    </div>
                                </div>
                                </fieldset>
                                <div class="form-group">
                                    <div class="col-lg-6 col-lg-offset-6">
                                      <button type="submit" class="btn btn-success" style="margin-left: 55px">Update Student</button>
                                      <button type="reset" class="btn btn-danger">Cancel</button>
                                  </div>
                                </div>
                            </form>
                        <?php }else{ ?>
                            <form method="post" action="<?php echo base_url('super/students/create');?>" class="form-horizontal bv-form" enctype="multipart/form-data">
                            <fieldset>
                                <legend>Personal Information</legend>
                                <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                                    <?php echo $this->session->flashdata('message'); ?>
                                <?php } ?>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Select School</label>
                                    <div class="col-lg-8">
                                        <input type="hidden" name="role_id" value="<?php echo $role->roles_id;?>">
                                        <select class="form-control" name="school_id" id="school_id" required="required">
                                            <option value="">Select School</option>
                                            <?php foreach($schools as $schools_list){ ?>
                                                <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Select Parents</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="parents_id" required="required">
                                            <option value="">Select Parents</option>
                                            <?php foreach($parents as $parents_list){ ?>
                                                <option value="<?php echo $parents_list->prnt_id;?>"><?php echo $parents_list->prnt_gaurdian_name;?>-(<?php echo $parents_list->prnt_reference_id;?>)</option>
                                            <?php } ?>
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                  <label class="col-lg-4 control-label">Name</label>
                                  <div class="col-lg-8">
                                      <input type="text" class="form-control" name="student_name" placeholder="Student name" required="required">
                                  </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">DOB</label>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control" name="student_dob"  placeholder="Student dob" required="required">
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Religion</label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" name="student_religion" placeholder="Student religion">
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Place of Birth</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="student_pob" placeholder="Place of Birth">
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Blood Group</label>
                                    <div class="col-lg-8">
                                          <input type="text" class="form-control" name="student_bgroup" placeholder="Blood Group">
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Blood Group</label>
                                    <div class="col-lg-8">
                                          <input type="file" class="form-control" name="userfile" required="required">
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
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Select Class</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="class_name" id="classes" required="required">
                                        </select>
                                        <span class="text-danger">Please select school</span>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Select Section</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="section_name" id="section" required="required">
                                        </select>
                                        <span class="text-danger">Please select class</span>
                                    </div>
                                </div>
                                </fieldset>
                                <fieldset>
                                <legend>Contact Information</legend>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Student Email</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="student_email" id="student_email" placeholder="Student email">
                                        <span id="students_email_available"></span>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Mobile</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="student_mobile" id="student_mobile" placeholder="Student mobile">
                                        <span id="students_mobile_available"></span>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Address</label>
                                    <div class="col-lg-8">
                                        <textarea type="text" class="form-control" name="student_address" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Select Country</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="country">
                                            <option>Select Country</option>
                                            <option value="1">India</option>
                                            <option value="2">Dubai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Postal Code</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="student_pcode" placeholder="Postal Code">
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Remarks</label>
                                    <div class="col-lg-8">
                                        <textarea type="text" class="form-control" name="student_remark" placeholder="Something About Student"></textarea>
                                    </div>
                                </div>
                                </fieldset>
                                <legend>Credentials</legend>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Username</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="student_username" value="<?php echo $ref_id;?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Password</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="student_password" value="<?php echo uniqid(999);?>"  readonly="readonly">
                                    </div>
                                </div>
                                </fieldset>
                                <div class="form-group">
                                    <div class="col-lg-6 col-lg-offset-6">
                                      <button type="submit" class="btn btn-success" style="margin-left: 60px">Create Student</button>
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
</div>
