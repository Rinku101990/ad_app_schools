<div class="top-bar clearfix">
    <div class="page-title">
      <h4>Student Profiles</h4>
    </div>
</div>

<div class="main-container">
    <div class="container-fluid">
      <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p><a href="<?php echo base_url('super/students');?>" class="btn btn-danger btn-sm">
              <i class="fa fa-arrow-right"></i> Go to Students list</a>
            </p>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div class="panel">
              <div class="panel-body">
                <div class="demo-btn-group">
                  <button class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> Print PDF</button>
                  <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i> Send Email</button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-mobile"></i> Send SMS</button>
                  <button type="button" class="btn btn-info btn-sm"><i class="fa fa-bell"></i> Send Notification</button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-key"></i> Send Credentials</button>
                </div>
              </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="panel">
              <div class="panel-body">
                <div class="demo-btn-group">
                  <a href="<?php echo base_url('super/students/add');?>/<?php echo $std_profile->stud_id;?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                  <a onclick="return confirm('are you sure want to delete!.');" href="<?php echo base_url('super/students/delete');?>/<?php echo $std_profile->cms_id;?>/<?php echo $std_profile->stud_id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                  <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-ban"></i> Disable</button>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="row gutter">
        <div class="clearfix"></div><br>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-red social-stats">
              <div class="panel-body text-left">
                <a href="#" class="img-responsive img-circle" data-original-title="" title="">
                  <?php if(($std_profile->stud_picture)==''){ ?>
                    <center><img src="<?php echo base_url();?>/<?php echo $std_profile->stud_picture;?>" class="img-circle" style="width:120px;height: 120px"></center>
                  <?php }else{ ?>
                    <center><img src="<?php echo base_url('uploads/students/profile/profile.jpg');?>" class="img-circle" style="width:120px;height: 120px"></center>
                  <?php } ?>
                </a>
                <h4><?php echo $std_profile->stud_name;?></h4>
                <hr>
                <h5><b>Username</b>: <?php echo $std_profile->stud_ref_id;?></h5>
                <hr>
                <h5><b>Class</b>: <?php echo $classes->cls_name;?></h5>
                <hr>
                <h5><b>Section</b>: <?php echo $section->sect_name;?></h5>
                <hr>
                <h5><b>Roll Number</b>: <?php echo $std_profile->stud_id;?></h5>
                <hr>
                <h5><b>Mobile</b>: <?php echo $std_profile->stud_mobile_no;?></h5>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-red">
              <div class="panel-body">
                <div class="tabbable">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#personal" data-toggle="tab"><b>Personal Info</b></a></li>
                    <li class=""><a href="#academic" data-toggle="tab"><b>Academic Info</b></a></li>
                    <li class=""><a href="#parents" data-toggle="tab"><b>Parents Info</b></a></li>
                    <li class=""><a href="#contact" data-toggle="tab"><b>Contact Details </b></a></li>
                    <li class=""><a href="#invoice" data-toggle="tab"><b>Invoices</b></a></li>
                    <li class=""><a href="#payments" data-toggle="tab"><b>Payments</b></a></li>
                  </ul>
                  <div class="tab-content no-margin">
                    <div class="tab-pane active" id="personal">
                      <div class="panel-body">
                        <table class="table table-bordered no-margin">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <td><?php echo $std_profile->stud_name;?></td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th>Date of Birth</th>
                              <td><?php echo $std_profile->stud_dob;?></td>
                            </tr>
                            <tr>
                              <th>Gender</th>
                              <?php if(($std_profile->stud_gender)=='0'){ ?>
                                <td><?php echo "Male";?></td>
                              <?php }else{ ?>
                                <td><?php echo "Female";?></td>
                              <?php } ?>
                            </tr>
                            <tr>
                              <th>Religion</th>
                              <td><?php echo $std_profile->stud_religion;?></td>
                            </tr>
                            <tr>
                              <th>Place of Birth</th>
                              <td><?php echo $std_profile->stud_place_of_birth;?></td>
                            </tr>
                            <tr>
                              <th>Blood Group</th>
                              <td><?php echo $std_profile->stud_blood_group;?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane" id="academic">
                      <div class="panel-body">
                        <table class="table table-bordered no-margin">
                          <tbody>
                            <tr>
                              <th>Username</th>
                              <td><?php echo $std_profile->stud_ref_id;?></td>
                            </tr>
                            <tr>
                              <th>Registration No</th>
                              <td><?php echo $std_profile->stud_ref_id;?></td>
                            </tr>
                            <tr>
                              <th>Registration Date</th>
                              <?php $new_date = date('d M-Y', strtotime($std_profile->stud_created_at));?>
                              <td><?php echo $new_date;?></td>
                            </tr>
                            <tr>
                              <th>Class</th>
                              <td><?php echo $classes->cls_name;?></td>
                            </tr>
                            <tr>
                              <th>Section</th>
                              <td><?php echo $section->sect_name;?></td>
                            </tr>
                            <tr>
                              <th>Roll Number</th>
                              <td><?php echo $std_profile->stud_id;?></td>
                            </tr>
                            <tr>
                              <th>Remarks</th>
                              <td><?php echo $std_profile->stud_about_yourself;?></td>
                            </tr>
                            </tr>
                          </tbody>
                        </table>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="parents">
                    <div class="panel-body">
                      <table class="table table-bordered no-margin">
                        <tbody>
                          <tr>
                            <th>Gaurdians Name</th>
                            <td><?php echo $prnt_profile->prnt_gaurdian_name;?></td>
                          </tr>
                          <tr>
                              <th>Father Name</th>
                              <td><?php echo $prnt_profile->prnt_father_name;?></td>
                          </tr>
                          <tr>
                              <th>Mother Name</th>
                              <td><?php echo $prnt_profile->prnt_mother_name;?></td>
                          </tr>
                          <tr>
                              <th>Father's Occupation</th>
                              <td><?php echo $prnt_profile->prnt_father_profession;?></td>
                          </tr>
                          <tr>
                            <th>Mother's Occupation</th>
                            <td><?php echo $prnt_profile->prnt_mother_profession;?></td>
                          </tr>
                          <tr>
                            <th>Contact Number</th>
                            <td><?php echo $prnt_profile->prnt_mobile_no;?></td>
                          </tr>
                          <tr>
                            <th>Email Id</th>
                            <td><?php echo $prnt_profile->prnt_email;?></td>
                          </tr>
                          <tr>
                            <th>Parent UserID</th>
                            <td><a href="<?php echo base_url('super/parents/profile/');?><?php echo $std_profile->prnt_id;?>" class="text-primary"><i class="fa fa-arrow-right"></i> <?php echo $prnt_profile->prnt_reference_id;?></a></td>
                          </tr>
                      </tbody>
                    </table>
                  </table>
                </div>
              </div>
              <div class="tab-pane" id="contact">
                <div class="panel-body">
                  <table class="table table-bordered no-margin">
                    <tbody>
                      <tr>
                        <th>Student Email</th>
                        <td><?php echo $std_profile->stud_email;?></td>
                      </tr>
                      <tr>
                        <th>mobile</th>
                        <td><?php echo $std_profile->stud_mobile_no;?></td>
                      </tr>
                      <tr>
                      <th>Address</th>
                      <td><?php echo $std_profile->stud_address;?></td>
                      </tr>
                      <tr>
                        <th>Country</th>
                        <td><?php echo $std_profile->stud_country;?></td>
                      </tr>
                      <tr>
                        <th>Postal Code</th>
                        <td><?php echo $std_profile->stud_pincode;?></td>
                      </tr>
                      </tr>
                    </tbody>
                  </table>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="invoice">
              <div class="panel-body">
                <div class="table-responsive">
                  <table id="basicExample" class="table table-striped table-bordered no-margin">
                    <thead>
                      <tr>
                        <th>Fee Type</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Fees Amount</th>
                        <th>Discount</th>
                        <th>Late Fees</th>
                        <th>Paid Amount</th>
                        <th>Due Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Tuition Fee [Apr]</td>
                      <td>10 Jun 2018</td>
                      <td>Fully Paid</td>
                      <td>100.00</td>
                      <td>0.0</td>
                      <td>0.0</td>
                      <td>100.0</td>
                      <td>0.0</td>
                    </tr>
                    <tr>
                      <td>Tuition Fee [Apr]</td>
                      <td>10 Jun 2018</td>
                      <td>Fully Paid</td>
                      <td>100.00</td>
                      <td>0.0</td>
                      <td>0.0</td>
                      <td>100.0</td>
                      <td>0.0</td>
                    </tr>
                    <tr>
                      <td>Tuition Fee [Apr]</td>
                      <td>10 Jun 2018</td>
                      <td>Fully Paid</td>
                      <td>100.00</td>
                      <td>0.0</td>
                      <td>0.0</td>
                      <td>100.0</td>
                      <td>0.0</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="payments">
            <div class="panel-body">
              <div class="table-responsive">
                <table id="fixedHeader" class="table table-striped table-bordered no-margin">
                  <thead>
                    <tr>
                      <th>Fee Type</th>
                      <th>Date</th>
                      <th>Paid</th>
                      <th>Discount</th>
                      <th>Fine</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tuition Fee [Apr]</td>
                      <td>10 Jun 2018</td>
                      <td>Fully Paid</td>
                      <td>100.00</td>
                      <td>0.0</td>
                    </tr>
                    <tr>
                      <td>Tuition Fee [Apr]</td>
                      <td>10 Jun 2018</td>
                      <td>Fully Paid</td>
                      <td>100.00</td>
                      <td>0.0</td>
                    </tr>
                    <tr>
                      <td>Tuition Fee [Apr]</td>
                      <td>10 Jun 2018</td>
                      <td>Fully Paid</td>
                      <td>100.00</td>
                      <td>0.0</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>