        <div class="top-bar clearfix">
            <div class="page-title">
                <h4>Master Admin Profile</h4></div>
        </div>
        <div class="main-container">
            <div class="container-fluid">
                <div class="row gutter">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h4>Master Admin Information</h4>
                                <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                                    <?php echo $this->session->flashdata('message'); ?>
                                <?php } ?>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="<?php echo base_url('super/master/update');?>" enctype="multipart/form-data">
                                    <fieldset>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Name</label>
                                            <div class="col-lg-9">
                                                <input type="hidden" name="profile_id" id="profile_id" value="<?php echo $profile->adpro_id;?>">
                                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $profile->adpro_fname;?>">
                                            </div>
                                        </div>
										 <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Email</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $profile->cms_email;?>" disabled>
                                            </div>
                                        </div>
										 <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Mobile</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $profile->adpro_contact;?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Country</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="country" id="country">
                                                    <option value="fr">France</option>
                                                    <option value="de">Germany</option>
                                                    <option value="it">Italy</option>
                                                    <option value="jp">Japan</option>
                                                    <option value="ru">Russia</option>
                                                    <option value="gb">United Kingdom</option>
                                                    <option value="us">United State</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                           <label class="col-lg-3 control-label">Profile Photo</label>
                                           <div class="col-lg-9">
                                               <input type="file" class="form-control" name="photo" id="photo">
                                           </div>
                                       </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Login Credentials</legend>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">User Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="cms_ref_id" id="cms_ref_id" value="<?php echo $profile->cms_ref_id;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Current Password</label>
                                            <div class="col-lg-9">
                                                <input type="password" class="form-control" name="cpass" placeholder="Current Password">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">New Password</label>
                                            <div class="col-lg-9">
                                                <input type="password" class="form-control" name="npass" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Confirm New Password</label>
                                            <div class="col-lg-9">
                                                <input type="password" class="form-control" name="cfpass" placeholder="Confirm New Password">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group" style="margin-left: 56%;">
                                        <div class="col-lg-6 col-lg-offset-6 pull-right">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>