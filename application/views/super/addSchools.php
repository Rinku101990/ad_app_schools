<div class="top-bar clearfix">
        <div class="page-title">
            <h4>Schools</h4></div>
        </div>
        <div class="main-container">
            <div class="container-fluid">
                <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/schools');?>" class="btn btn-danger btn-xs"><i class="fa fa-plus"></i> View School List</a></p></div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h4>Create New School</h4>
                            <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                                <?php echo $this->session->flashdata('message'); ?>
                            <?php } ?>
                            </div>
                            <div class="panel-body">
                                <?php if(!empty($school_info)){ ?>
                                <form method="post" action="<?php echo base_url('super/schools/update');?>" enctype="multipart/form-data" class="form-horizontal">
                                    <fieldset>
                                      <div class="form-group col-lg-12">
                                          <label class="col-lg-3 control-label">School Type</label>
                                          <div class="col-lg-9">
                                            <input type="hidden" name="school_id" id="school_id" value="<?php echo $school_info->schl_id?>">
                                            <select class="form-control" name="schools_type" id="schools_type" required="required">
                                                <option> Select School Type </option>
                                                <option value="fr" <?php echo $school_info->schl_type_name=='fr'?'selected':''?>>Girls Primary</option>
                                                <option value="frs" <?php echo $school_info->schl_type_name=='frs'?'selected':''?>>Girls Secondry</option>
                                                <option value="de" <?php echo $school_info->schl_type_name=='de'?'selected':''?>>Boys Primary</option>
                                                <option value="des" <?php echo $school_info->schl_type_name=='des'?'selected':''?>>Boys Secondry</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">School Name</label>
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control" name="schools_code" id="schools_code" placeholder="School code" required="required" style="width:120px" value="<?php echo $school_info->schl_code;?>">
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="schools_name" id="schools_name" placeholder="Enter school name" required="required" value="<?php echo $school_info->schl_name;?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Phone Number</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="school_phone_no" id="school_phone_no" placeholder="Enter school phone no" required="required" value="<?php echo $school_info->schl_phone_number;?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Email Id</label>
                                              <div class="col-lg-9">
                                              <input type="email" class="form-control" name="school_email_id" id="school_email_id" placeholder="Enter school email id" required="required" value="<?php echo $school_info->schl_email_id;?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Website</label>
                                              <div class="col-lg-9">
                                                <input type="text" class="form-control" name="school_web" id="school_web" placeholder="Enter school website" value="<?php echo $school_info->schl_web_url;?>">
                                              </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Address</label>
                                             <div class="col-lg-9">
                                              <textarea type="text" class="form-control" name="school_address" id="school_addressol" placeholder="Enter school address" required="required"><?php echo $school_info->schl_address;?></textarea>
                                            </div>
                                       </div>
                                          <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Country</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="school_country" id="school_country" required="required">
                                                    <option>-- Select a country --</option>
                                                    <option value="fr" <?php echo $school_info->schl_country=='fr'?'selected':''?>>France</option>
                                                    <option value="de" <?php echo $school_info->schl_country=='de'?'selected':''?>>Germany</option>
                                                    <option value="it" <?php echo $school_info->schl_country=='it'?'selected':''?>>Italy</option>
                                                    <option value="jp" <?php echo $school_info->schl_country=='jp'?'selected':''?>>Japan</option>
                                                    <option value="ru" <?php echo $school_info->schl_country=='ru'?'selected':''?>>Russia</option>
                                                    <option value="gb" <?php echo $school_info->schl_country=='gb'?'selected':''?>>United Kingdom</option>
                                                    <option value="us" <?php echo $school_info->schl_country=='us'?'selected':''?>>United State</option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>School banner and Logo</legend>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-4 control-label">Banner</label>
                                            <div class="col-lg-8">
                                                <input type="file" class="form-control" name="school_banners" id="school_banners">
                                            </div>
                                            <img src="<?php echo $school_info->schl_banner;?>" style="width:100px;height: 100px">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-4 control-label">School Logo</label>
                                            <div class="col-lg-8">
                                                <input type="file" class="form-control" name="school_logos" id="school_logos">
                                            </div>
                                            <img src="<?php echo $school_info->schl_logos;?>" style="width:100px;height: 100px">
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <div class="col-lg-6 col-lg-offset-6">
                                            <button type="submit" class="btn btn-success" style="margin-left:25%">Update School Info</button>
                                        </div>
                                    </div>
                                </form>
                                <?php }else{ ?>
                                <form method="post" action="<?php echo base_url('super/schools/create');?>" enctype="multipart/form-data" class="form-horizontal">
                                    <fieldset>
                                      <div class="form-group col-lg-12">
                                          <label class="col-lg-3 control-label">School Type</label>
                                          <div class="col-lg-9">
                                            <select class="form-control" name="schools_type" id="schools_type" required="required">
                                                <option> Select School Type </option>
                                                <option value="fr">Girls Primary</option>
                                                <option value="fr">Girls Secondry</option>
                                                <option value="de">Boys Primary</option>
                                                <option value="de">Boys Secondry</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">School Name</label>
                                            <div class="col-lg-3">
                                                <input type="text" class="form-control" name="schools_code" id="schools_code" placeholder="School code" required="required" style="width:120px">
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="schools_name" id="schools_name" placeholder="Enter school name" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Phone Number</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="school_phone_no" id="school_phone_no" placeholder="Enter school phone no" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Email Id</label>
                                              <div class="col-lg-9">
                                              <input type="email" class="form-control" name="school_email_id" id="school_email_id" placeholder="Enter school email id" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Website</label>
                                              <div class="col-lg-9">
                                                <input type="text" class="form-control" name="school_web" id="school_web" placeholder="Enter school website">
                                              </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Address</label>
                                             <div class="col-lg-9">
                                              <textarea type="text" class="form-control" name="school_address" id="school_addressol" placeholder="Enter school address" required="required"></textarea>
                                            </div>
                                       </div>
                                          <div class="form-group col-lg-12">
                                            <label class="col-lg-3 control-label">Country</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="school_country" id="school_country" required="required">
                                                    <option>-- Select a country --</option>
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
                                    </fieldset>
                                    <fieldset>
                                        <legend>School banner and Logo</legend>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-4 control-label">Banner</label>
                                            <div class="col-lg-8">
                                                <input type="file" class="form-control" name="school_banners" id="school_banners">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-4 control-label">School Logo</label>
                                            <div class="col-lg-8">
                                                <input type="file" class="form-control" name="school_logos" id="school_logos">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <div class="col-lg-6 col-lg-offset-6">
                                            <button type="submit" class="btn btn-success" style="margin-left:37%">Create School</button>
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