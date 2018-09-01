<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Add Teachers</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
      <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/teachers');?>" class="btn btn-danger"><i class="fa fa-eye"></i> All Teachers List</a></p></div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="panel panel-yellow">
                          <div class="panel-body">
                            <?php if(!empty($tchr_info)){ ?>
                              <form id="defaultForm" method="post" action="<?php echo base_url('super/teachers/update');?>" enctype="multipart/form-data" class="form-horizontal bv-form" >
                                  <fieldset>
                                      <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                                          <?php echo $this->session->flashdata('message'); ?>
                                      <?php } ?>
                                      <legend>Personal Information</legend>
                                      <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">Select School</label>
                                        <div class="col-lg-8">
                                          <input type="hidden" name="teacher_id" value="<?php echo $tchr_info->tchr_id;?>">
                                            <select class="form-control" name="school_name" id="school_name">
                                                <option value="">-- Select School --</option>
                                                <?php foreach($schools as $schools_list){ ?>
                                                  <option value="<?php echo $schools_list->schl_id;?>" <?php echo $schools_list->schl_id==$tchr_info->schl_id?'selected':''?>><?php echo $schools_list->schl_name;?></option>
                                                <?php } ?>
                                              </select>
                                        </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">Name</label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" name="tchr_name" placeholder="Teacher Name" value="<?php echo $tchr_info->tchr_name;?>">
                                          </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">Designation</label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" name="tchr_designation" placeholder="Designations" value="<?php echo $tchr_info->tchr_designation;?>">
                                          </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">DOB</label>
                                          <div class="col-lg-8">
                                              <?php $new_dob = date('Y-m-d', strtotime($tchr_info->tchr_dob));?>
                                              <input type="date" class="form-control" name="tchr_dob" value="<?php echo $new_dob;?>">
                                          </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">Gender</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="tchr_gender">
                                                <option value="">-- Select Gender --</option>
                                                <option value="0" <?php echo $tchr_info->tchr_gender=="0"?'selected':''?>>Male</option>
                                                <option value="1" <?php echo $tchr_info->tchr_gender=="1"?'selected':''?>>Female</option>
                                                <option value="2" <?php echo $tchr_info->tchr_gender=="2"?'selected':''?>>Others</option>
                                              </select>
                                        </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">Religion</label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" name="tchr_religoin" placeholder="Religion" value="<?php echo $tchr_info->tchr_religoin;?>">
                                          </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">Blood Group</label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" name="tchr_bgroup" placeholder="Blood Group" value="<?php echo $tchr_info->tchr_bloodGroup;?>">
                                          </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">Profile Image</label>
                                          <div class="col-lg-5">
                                              <input type="file" class="form-control" name="userfile" id="userfile">
                                          </div>
                                          <div class="col-lg-3">
                                              <img src="<?php echo base_url();?>/<?php echo $tchr_info->tchr_picture;?>" class="img-thumbnail">
                                          </div>
                                      </div>
                                  </fieldset>
                                  <fieldset>
                                  <legend>Contact Details</legend>
                                  <div class="form-group has-feedback">
                                      <label class="col-lg-4 control-label">Mobile Number</label>
                                      <div class="col-lg-8">
                                          <input type="text" class="form-control" name="tchr_mobile" id="tchr_mobile"  placeholder="+91 9718789479" value="<?php echo $tchr_info->tchr_mobile;?>" readonly>
                                          <span id="teacher_mobile_status"></span>
                                      </div>
                                  </div>
                                  <div class="form-group has-feedback">
                                      <label class="col-lg-4 control-label">Email Id</label>
                                      <div class="col-lg-8">
                                          <input type="text" class="form-control" name="tchr_email" id="tchr_email" placeholder="abc@gmail.com" value="<?php echo $tchr_info->tchr_email;?>" readonly>
                                          <span id="teacher_email_status"></span>
                                      </div>
                                  </div>
                                  <div class="form-group has-feedback">
                                      <label class="col-lg-4 control-label">Address</label>
                                      <div class="col-lg-8">
                                          <textarea class="form-control" name="tchr_address" data-bv-field="username"><?php echo $tchr_info->tchr_address;?></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Country</label>
                                    <div class="col-lg-8">
                                      <select class="form-control" name="tchr_country" id="tchr_country">
                                          <option value="">-- Select Country --</option>
                                          <option value="1" <?php echo $tchr_info->tchr_country=="1"?'selected':''?>>India</option>
                                          <option value="2" <?php echo $tchr_info->tchr_country=="2"?'selected':''?>>UAE</option>
                                      </select>
                                    </div>
                                  </div>
                                  </fieldset>
                                  <fieldset>
                                  <legend>Academic Information</legend>
                                  <div class="form-group has-feedback">
                                      <label class="col-lg-4 control-label">Expertise</label>
                                      <div class="col-lg-8">
                                        <select class="form-control" name="tchr_expertise" id="multi-select-expertise" multiple="multiple" required="required">
                                            <option value="" disabled>-- Select Expertise --</option>
                                            <option value="mathematics" <?php echo $tchr_info->tchr_expertise=="mathematics"?'selected':''?>>Mathematics</option>
                                            <option value="english" <?php echo $tchr_info->tchr_expertise=="english"?'selected':''?>>English</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">Highest Qualification</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="tchr_qualification"  placeholder="Highest Qualification" value="<?php echo $tchr_info->tchr_qualification;?>">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">Joining Date</label>
                                        <div class="col-lg-8">
                                            <?php $new_joining = date('Y-m-d', strtotime($tchr_info->tchr_joiningDate));?>
                                            <input type="date" class="form-control" name="tchr_joining" value="<?php echo $new_joining;?>">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">Salary (per month)</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="tchr_salary" placeholder="25000" value="<?php echo $tchr_info->tchr_salary;?>">
                                        </div>
                                    </div>
                                  </fieldset>
                                  <fieldset>
                                  <legend>Credentials</legend>
                                  <div class="form-group has-feedback">
                                      <label class="col-lg-4 control-label">Username</label>
                                      <div class="col-lg-8">
                                          <input type="text" class="form-control" name="tchr_username" readonly="readonly" value="<?php echo $tchr_info->tchr_reference_id;?>">
                                      </div>
                                  </div>
                                  <div class="form-group has-feedback">
                                      <label class="col-lg-4 control-label">Password</label>
                                      <div class="col-lg-8">
                                          <input type="text" class="form-control" name="tchr_password" readonly="readonly" value="<?php echo $tchr_info->tchr_password;?>">
                                      </div>
                                  </div>
                                  </fieldset>
                                  <div class="form-group">
                                      <div class="col-lg-6 col-lg-offset-6">
                                          <button type="submit" class="btn btn-success" style="margin-left:11px">Update Teacher Profile</button>
                                          <button type="reset" class="btn btn-danger">Cancel</button>
                                      </div>
                                  </div>
                              </form>
                            <?php }else{ ?>
                              <form id="defaultForm" method="post" action="<?php echo base_url('super/teachers/create');?>" enctype="multipart/form-data" class="form-horizontal bv-form" >
                                  <fieldset>
                                      <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                                          <?php echo $this->session->flashdata('message'); ?>
                                      <?php } ?>
                                      <legend>Personal Information</legend>
                                      <div class="form-group has-feedback">
                                        <input type="hidden" name="teacher_id" value="<?php echo $role->roles_id;?>">
                                        <label class="col-lg-4 control-label">Select School</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="school_name" id="school_name">
                                                <option value="">-- Select School --</option>
                                                <?php foreach($schools as $schools_list){ ?>
                                                  <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                                                <?php } ?>
                                              </select>
                                        </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">Name</label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" name="tchr_name" placeholder="Teacher Name">
                                          </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">Designation</label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" name="tchr_designation" placeholder="Designations">
                                          </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">DOB</label>
                                          <div class="col-lg-8">
                                              <input type="date" class="form-control" name="tchr_dob" placeholder="DOB">
                                          </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">Gender</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="tchr_gender">
                                                <option value="">-- Select Gender --</option>
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                                <option value="2">Others</option>
                                              </select>
                                        </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">Religion</label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" name="tchr_religoin" placeholder="Religion">
                                          </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">Blood Group</label>
                                          <div class="col-lg-8">
                                              <input type="text" class="form-control" name="tchr_bgroup" placeholder="Blood Group">
                                          </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                          <label class="col-lg-4 control-label">Profile Image</label>
                                          <div class="col-lg-8">
                                              <input type="file" class="form-control" name="userfile" id="userfile">
                                          </div>
                                      </div>
                                  </fieldset>
                                  <fieldset>
                                  <legend>Contact Details</legend>
                                  <div class="form-group has-feedback">
                                      <label class="col-lg-4 control-label">Mobile Number</label>
                                      <div class="col-lg-8">
                                          <input type="text" class="form-control" name="tchr_mobile" id="tchr_mobile"  placeholder="+91 9718789479">
                                          <span id="teacher_mobile_status"></span>
                                      </div>
                                  </div>
                                  <div class="form-group has-feedback">
                                      <label class="col-lg-4 control-label">Email Id</label>
                                      <div class="col-lg-8">
                                          <input type="text" class="form-control" name="tchr_email" id="tchr_email" placeholder="abc@gmail.com">
                                          <span id="teacher_email_status"></span>
                                      </div>
                                  </div>
                                  <div class="form-group has-feedback">
                                      <label class="col-lg-4 control-label">Address</label>
                                      <div class="col-lg-8">
                                          <textarea class="form-control" name="tchr_address" data-bv-field="username"></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group has-feedback">
                                    <label class="col-lg-4 control-label">Country</label>
                                    <div class="col-lg-8">
                                      <select class="form-control" name="tchr_country" id="tchr_country">
                                          <option value="">-- Select Country --</option>
                                          <option value="india">India</option>
                                          <option value="uae">UAE</option>
                                      </select>
                                    </div>
                                  </div>
                                  </fieldset>
                                  <fieldset>
                                  <legend>Academic Information</legend>
                                  <div class="form-group has-feedback">
                                      <label class="col-lg-4 control-label">Expertise</label>
                                      <div class="col-lg-8">
                                        <select class="form-control" name="tchr_expertise" id="multi-select-expertise" multiple="multiple" required="required">
                                            <option value="" disabled>-- Select Expertise --</option>
                                            <option value="1">Mathematics</option>
                                            <option value="2">English</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">Highest Qualification</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="tchr_qualification"  placeholder="Highest Qualification">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">Joining Date</label>
                                        <div class="col-lg-8">
                                            <input type="date" class="form-control" name="tchr_joining"  placeholder="Joining Date">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">Salary (per month)</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="tchr_salary" placeholder="25000">
                                        </div>
                                    </div>
                                  </fieldset>
                                  <fieldset>
                                  <legend>Credentials</legend>
                                  <div class="form-group has-feedback">
                                      <label class="col-lg-4 control-label">Username</label>
                                      <div class="col-lg-8">
                                          <input type="text" class="form-control" name="tchr_username" readonly="readonly" value="<?php echo $ref_id;?>">
                                      </div>
                                  </div>
                                  <div class="form-group has-feedback">
                                      <label class="col-lg-4 control-label">Password</label>
                                      <div class="col-lg-8">
                                          <input type="text" class="form-control" name="tchr_password" readonly="readonly" value="<?php echo  uniqid(999);?>">
                                      </div>
                                  </div>
                                  </fieldset>
                                  <div class="form-group">
                                      <div class="col-lg-6 col-lg-offset-6">
                                          <button type="submit" class="btn btn-success" style="margin-left:15px">Create Teacher Profile</button>
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