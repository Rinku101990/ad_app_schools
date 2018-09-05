        <div class="top-bar clearfix">
            <div class="page-title">
                <h4>Update Profile</h4></div>
        </div>
        <div class="main-container">
            <div class="container-fluid">
                <div class="row gutter">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h4>Your Profile Information</h4>
                                <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                                    <?php echo $this->session->flashdata('message'); ?>
                                <?php } ?>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="<?php echo base_url('students/profile/update');?>" enctype="multipart/form-data">
                                    <fieldset>
                                        <div class="form-group col-lg-4">
                                            <label class="col-lg-4 control-label">Name</label>
                                            <div class="col-lg-8">
                                                <input type="hidden" name="profile_id" id="profile_id" value="<?php echo $view_profile->stud_id;?>">
                                                <input type="hidden" name="master_id" id="master_id" value="<?php echo $view_profile->cms_id;?>">
                                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $view_profile->stud_name;?>" disabled>
                                            </div>
                                        </div>
										 <div class="form-group col-lg-4">
                                            <label class="col-lg-4 control-label">Email</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $view_profile->stud_email;?>" disabled>
                                            </div>
                                        </div>
										 <div class="form-group col-lg-4">
                                            <label class="col-lg-4 control-label">Mobile</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $view_profile->stud_mobile_no;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label class="col-lg-4 control-label">Country</label>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="country" id="country" disabled>
                                                    <option value="1" <?php echo $view_profile->schl_id=='1'?'selected':''?>>France</option>
                                                    <option value="2" <?php echo $view_profile->schl_id=='2'?'selected':''?>>Germany</option>
                                                    <option value="3" <?php echo $view_profile->schl_id=='3'?'selected':''?>>Italy</option>
                                                    <option value="4" <?php echo $view_profile->schl_id=='4'?'selected':''?>>Japan</option>
                                                    <option value="5" <?php echo $view_profile->schl_id=='5'?'selected':''?>>Russia</option>
                                                    <option value="6" <?php echo $view_profile->schl_id=='6'?'selected':''?>>United Kingdom</option>
                                                    <option value="7" <?php echo $view_profile->schl_id=='7'?'selected':''?>>United State</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                           <label class="col-lg-4 control-label">Profile Photo</label>
                                           <!-- <div class="col-lg-8">
                                               <input type="file" class="form-control" name="photo" id="photo">
                                           </div> -->
                                           <div class="col-lg-8">
                                               <img src="<?php echo base_url();?>/<?php echo $view_profile->stud_picture;?>" class="img thumbnail" style="width:100px;height:100px">
                                           </div>
                                       </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Login Credentials</legend>
                                        <div class="form-group col-lg-4">
                                            <label class="col-lg-4 control-label">Current Password</label>
                                            <div class="col-lg-8">
                                                <input type="password" class="form-control" name="cpass" placeholder="Current Password">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label class="col-lg-4 control-label">New Password</label>
                                            <div class="col-lg-8">
                                                <input type="password" class="form-control" name="npass" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label class="col-lg-4 control-label">Confirm New Password</label>
                                            <div class="col-lg-8">
                                                <input type="password" class="form-control" name="cfpass" placeholder="Confirm New Password">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-success" style="float:right;margin-right: 15px">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>