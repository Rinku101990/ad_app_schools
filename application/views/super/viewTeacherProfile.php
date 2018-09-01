<div class="top-bar clearfix">
    <div class="page-title">
      <h4>Teacher Profile</h4>
    </div>
</div>
<?php if(!empty($tchr_profile)){ ?>
<div class="main-container">
    <div class="container-fluid">
      <div class="row gutter">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <p><a href="<?php echo base_url('super/teachers');?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-right"></i> Go to Teachers list</a></p>
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
                <a href="<?php echo base_url('super/teachers/add');?>/<?php echo $tchr_profile->tchr_id;?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                <a onclick="return confirm('are you sure want to delete!.');" href="<?php echo base_url('super/teachers/delete');?>/<?php echo $tchr_profile->cms_id;?>/<?php echo $tchr_profile->tchr_id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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
              <a href="#" class="img-responsive img-circle-sm" data-original-title="" title="" >
              <?php if(!empty($tchr_profile->tchr_picture)){ ?>
                <img src="<?php echo base_url('');?>/<?php echo $tchr_profile->tchr_picture;?>" alt="User" class="img-circle-sm" style="width:100px;height:100px;margin-left: 30%">
              <?php }else{ ?>
                <img src="<?php echo base_url('assets/img/user5.png');?>" alt="User" class="img-circle-sm" style="width:100px;height:100px;margin-left: 30%">
              <?php } ?>
              </a>
              <center>
              <h4><?php echo $tchr_profile->tchr_name;?></h4>
              <hr>
              <h5>Username: <?php echo $tchr_profile->tchr_reference_id;?></h5>
              <hr>
              <h5>Expertise: <?php echo $tchr_profile->tchr_expertise;?></h5>
              <hr>
              <h5>Mobile: <?php echo $tchr_profile->tchr_mobile;?></h5>
              </center>
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
                <li class=""><a href="#contact" data-toggle="tab"><b>Contact Details </b></a></li>
                <li class=""><a href="#salary" data-toggle="tab"><b>Salary</b></a></li>
              </ul>
              <div class="tab-content no-margin">
                <div class="tab-pane active" id="personal">
                  <div class="panel-body">
                    <table class="table table-bordered no-margin">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <td><?php echo $tchr_profile->tchr_name;?></td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>Date of Birth</th>
                          <?php if(!empty($tchr_profile->tchr_dob)){  $new_dob = date('d M-Y', strtotime($tchr_profile->tchr_dob));?>
                            <td><?php echo $new_dob;?></td>
                          <?php }else{?>
                            <td>NA</td>
                          <?php } ?>
                        </tr>
                        <tr>
                          <th>Gender</th>
                          <?php if(($tchr_profile->tchr_gender)=='0'){ ?>
                          <td>Male</td>
                          <?php }else if(($tchr_profile->tchr_gender)=='1'){ ?>
                            <td>Female</td>
                          <?php }else if(($tchr_profile->tchr_gender)=='2'){ ?>
                            <td>Other</td>
                          <?php }else{ ?>
                            <td>NA</td>
                          <?php } ?>
                        </tr>
                        <tr>
                          <th>Religion</th>
                          <?php if(!empty($tchr_profile->tchr_religoin)){ ?>
                            <td><?php echo $tchr_profile->tchr_religoin;?></td>
                          <?php }else{?>
                            <td>NA</td>
                          <?php } ?>
                        </tr>
                        <tr>
                          <th>Designation</th>
                          <?php if(!empty($tchr_profile->tchr_designation)){ ?>
                            <td><?php echo $tchr_profile->tchr_designation;?></td>
                          <?php }else{?>
                            <td>NA</td>
                          <?php } ?>
                        </tr>
                        <tr>
                          <th>Blood Group</th>
                          <?php if(!empty($tchr_profile->tchr_bloodGroup)){ ?>
                            <td><?php echo $tchr_profile->tchr_bloodGroup;?></td>
                          <?php }else{?>
                            <td>NA</td>
                          <?php } ?>
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
                          <th>Expertise</th>
                          <?php if(!empty($tchr_profile->tchr_expertise)){ ?>
                            <td><?php echo $tchr_profile->tchr_expertise;?></td>
                          <?php }else{?>
                            <td>NA</td>
                          <?php } ?>

                          <tr>
                            <th>Highest Qualification</th>
                            <?php if(!empty($tchr_profile->tchr_qualification)){ ?>
                              <td><?php echo $tchr_profile->tchr_qualification;?></td>
                            <?php }else{?>
                              <td>NA</td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <th>Joining Date</th>
                            <?php if(!empty($tchr_profile->tchr_joiningDate)){ $new_joining = date('d M-Y H:i:s', strtotime($tchr_profile->tchr_joiningDate));?>
                              <td><?php echo $new_joining;?></td>
                            <?php }else{?>
                              <td>NA</td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <th>Salary (per month)</th>
                            <?php if(!empty($tchr_profile->tchr_salary)){ ?>
                              <td>Rs-<?php echo $tchr_profile->tchr_salary;?></td>
                            <?php }else{?>
                              <td>NA</td>
                            <?php } ?>
                          </tr>

                          <tr>
                            <th>UserId</th>
                            <?php if(!empty($tchr_profile->tchr_reference_id)){ ?>
                              <td><a href="<?php echo base_url('super/teachers/profile');?>/<?php echo $tchr_profile->tchr_id;?>" class="text-primary"><i class="fa fa-arrow-right"></i> <?php echo $tchr_profile->tchr_reference_id;?></a></td>
                            <?php }else{?>
                              <td>NA</td>
                            <?php } ?>
                          </tr>

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
                        <th>Email ID</th>
                        <?php if(!empty($tchr_profile->tchr_email)){ ?>
                          <td><?php echo $tchr_profile->tchr_email;?></td>
                        <?php }else{?>
                          <td>NA</td>
                        <?php } ?>

                        <tr>
                          <th>mobile</th>
                          <?php if(!empty($tchr_profile->tchr_mobile)){ ?>
                            <td><?php echo $tchr_profile->tchr_mobile;?></td>
                          <?php }else{?>
                            <td>NA</td>
                          <?php } ?>
                        </tr>

                        <tr>
                          <th>Address</th>
                          <?php if(!empty($tchr_profile->tchr_address)){ ?>
                            <td><?php echo $tchr_profile->tchr_address;?></td>
                          <?php }else{?>
                            <td>NA</td>
                          <?php } ?>
                        </tr>

                        <tr>
                          <th>Country</th>
                          <?php if(!empty($tchr_profile->tchr_country)){ ?>
                            <td><?php echo $tchr_profile->tchr_country;?></td>
                          <?php }else{?>
                            <td>NA</td>
                          <?php } ?>
                        </tr>

                      </tr>
                    </tbody>
                </table>
              </table>
            </div>
          </div>
          <div class="tab-pane" id="salary">
            <div class="panel-body">
              <div class="table-responsive">
                <table id="basicExample" class="table table-striped table-bordered no-margin">
                  <thead>
                    <tr>
                      <th style="width:5%">#</th>
                        <th>Month</th>
                        <th>Date</th>
                        <th>Salary</th>
                        <th>Payment Amount</th>
                        <th>Mode</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>July</td>
                      <td>10 Jun 2018</td>
                      <td>25000</td>
                      <td>25000</td>
                      <td>Payment made by cash mode on 22nd August</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>July</td>
                      <td>10 Jun 2018</td>
                      <td>25000</td>
                      <td>25000</td>
                      <td>Cash</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>July</td>
                      <td>10 Jun 2018</td>
                      <td>25000</td>
                      <td>25000</td>
                      <td>Cash</td>
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
<?php } ?>
</div>
</div>
</div>
</div>