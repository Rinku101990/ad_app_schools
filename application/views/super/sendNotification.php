<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Send Notification</h4>
    </div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p><a href="<?php echo base_url('super/notifications');?>" class="btn btn-danger"><i class="fa fa-eye"></i> Notification Log</a></p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <h4>Send Notification</h4>
                        <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                            <?php echo $this->session->flashdata('message'); ?>
                        <?php } ?>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo base_url('super/notifications/send_notifications');?>" class="form-horizontal">
                            <fieldset>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-4 control-label">School</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="school_name_id" id="school_name_id" required="required">
                                            <option value="">Select School</option>
                                            <?php foreach($schools as $schools_list){ ?>
                                                <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-4 control-label">Users</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="role_id" id="role_id" required="required">
                                            <option value="">Select User Type</option>
                                            <?php foreach($roles as $roles_list){ ?>
                                            <option value="<?php echo $roles_list->roles_id;?>"><?php echo $roles_list->roles_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group col-lg-12">
                                    <label class="col-lg-4 control-label">Class</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="class_name">
                                            <option value="">-- Select Class --</option>
                                            <option value="">One</option>
                                            <option value="">Two</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-4 control-label">Section</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="section_name">
                                            <option value="">-- Select Section --</option>
                                            <option value="">One</option>
                                            <option value="">Two</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="form-group col-lg-12" id="div_recipient" style="display: none">
                                    <label class="col-lg-4 control-label">Recipient</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="recipient_id[]" id="recipient_id" multiple>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12" id="noti_type" style="display: none">
                                    <label class="col-lg-4 control-label">Notification Type</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="notification_type" id="notification_type" required="required">
                                            <option value="">Notification Type</option>
                                            <?php foreach($templates as $tmpl_list){ ?>
                                            <option value="<?php echo $tmpl_list->tmpl_id;?>"><?php echo $tmpl_list->tmpl_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12" id="noti_content" style="display: none">
                                    <label class="col-lg-4 control-label">Notification Content</label>
                                    <div class="col-lg-8">
                                        <textarea name="notification_content" id="notification_content" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-5">
                                    <button type="submit" class="btn btn-success" style="margin-left:58px">Send Notification</button>
                                    <button type="reset" class="btn btn-danger">Clear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
