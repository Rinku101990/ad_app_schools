<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Parent</h4></div>
</div>
<?php if(!empty($profile)){ ?>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p><a href="<?php echo base_url('super/parents');?>" class="btn btn-danger btn-xs"><i class="fa fa-arrow-right"></i> Go to Parents list</a></p>
            </div>
            <div class="row gutter">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4>Connect With Parents</h4></div>
                        <div class="panel-body">
                            <div class="demo-btn-group">
                              <button class="btn btn-success btn-xs"><i class="fa fa-file-pdf-o"></i> Print PDF</button>
                              <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-envelope"></i> Send Email</button>
                              <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-mobile"></i> Send SMS</button>
                              <button type="button" class="btn btn-info btn-xs"><i class="fa fa-bell"></i> Send Notification</button>
                              <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-key"></i> Send Credentials</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4>Actions</h4></div>
                        <div class="panel-body">
                            <div class="demo-btn-group ">
                              <a href="<?php echo base_url('super/parents/add');?>/<?php echo $profile->prnt_id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                              <a onclick="return confirm('are you sure want to delete!.');" href="<?php echo base_url('super/parents/delete');?>/<?php echo $profile->cms_id;?>/<?php echo $profile->prnt_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                              <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-ban"></i> Disable</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div><br>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-red social-stats">
                    <div class="panel-body">
                        <a href="#" class="img-responsive img-circle" data-original-title="" title="">
                          <img src="<?php echo base_url('');?><?php echo $profile->prnt_picture;?>" alt="User" class="img-circle" style="width:120px;height: 120px">
                        </a>
                          <h4><?php echo $profile->prnt_gaurdian_name;?></h4>
                          <h5>Username: <?php echo $profile->prnt_reference_id;?></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-red">
                    <div class="panel-body">
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#all" data-toggle="tab"><b>Parents Information</b></a></li>
                                <li class=""><a href="#one" data-toggle="tab"><b>Student Information</b></a></li>
                            </ul>
                            <div class="tab-content no-margin">
                                <div class="tab-pane active" id="all">
                                    <div class="panel-body">
                                      <table class="table no-margin">
                                        <thead>
                                            <?php if(($profile->prnt_gaurdian_name)!=''){ ?>
                                            <tr>
                                                <th>Gaurdian Name</th>
                                                <td><?php echo $profile->prnt_gaurdian_name;?></td>
                                            </tr>
                                            <?php }else{ ?>
                                            <?php } ?>
                                        </thead>
                                        <tbody>
                                            <?php if(($profile->prnt_father_name)!=''){ ?>
                                            <tr>
                                                <th>Parents Name</th>
                                                <td><?php echo $profile->prnt_father_name;?></td>
                                            </tr>
                                            <?php }else{ ?>
                                            <?php } ?>

                                            <?php if(($profile->prnt_mother_name)!=''){ ?>
                                            <tr>
                                                <th>Mother Name</th>
                                                <td><?php echo $profile->prnt_mother_name;?></td>
                                            </tr>
                                            <?php }else{ ?>
                                            <?php } ?>

                                            <?php if(($profile->prnt_mobile_no)!=''){ ?>
                                            <tr>
                                                <th>Mobile</th>
                                                <td><?php echo $profile->prnt_mobile_no;?></td>
                                            </tr>
                                            <?php }else{ ?>
                                            <?php } ?>

                                            <?php if(($profile->prnt_mobile_no)!=''){ ?>
                                            <tr>
                                                <th>Email Id</th>
                                                <td><?php echo $profile->prnt_email;?></td>
                                            </tr>
                                            <?php }else{ ?>
                                            <?php } ?>

                                            <?php if(($profile->prnt_mobile_no)!=''){ ?>
                                            <tr>
                                                <th>Address</th>
                                                <td><?php echo $profile->prnt_address;?></td>
                                            </tr>
                                            <?php }else{ ?>
                                            <?php } ?>

                                            <?php if(($profile->prnt_mobile_no)!=''){ ?>
                                            <tr>
                                                <th>Father's Occupation</th>
                                                <td><?php echo $profile->prnt_father_profession;?></td>
                                            </tr>
                                            <?php }else{ ?>
                                            <?php } ?>

                                            <?php if(($profile->prnt_mobile_no)!=''){ ?>
                                            <tr>
                                                <th>Mother's Occupation</th>
                                                <td><?php echo $profile->prnt_mother_profession;?></td>
                                            </tr>
                                            <?php }else{ ?>
                                            <?php } ?>
                                        </tbody>
                                </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="one">
                                    <div class="panel-body">
                                    <?php if(!empty($stud_list)){ ?>
                                      <table class="table no-margin">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student Name</th>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($stud_list as $students){ ?>
                                            <tr>
                                                <td><?php echo $i++?></td>
                                                <td><?php echo $students->stud_name;?></td>

                                                <?php foreach($class as $cls_name){ ?>
                                                    <?php if(($cls_name->stud_id)==($students->stud_id)){ ?>
                                                    <td><?php echo $cls_name->cls_name?></td>
                                                    <?php } ?>
                                                <?php } ?>

                                                <?php foreach($section as $sec_name){ ?>
                                                    <?php if(($sec_name->stud_id)==($students->stud_id)){ ?>
                                                    <td><?php echo $sec_name->sect_name;?></td>
                                                    <?php } ?>
                                                <?php } ?>

                                                <td><a href="<?php echo base_url('super/students/profile');?>/<?php echo $students->stud_id;?>" class="text-primary"><i class="fa fa-arrow-right"></i> <?php echo $students->stud_ref_id;?></a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                      </table>
                                    <?php }else{ ?>
                                        <center><p>No Studnet Found!.</p></center>
                                    <?php } ?>
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
<?php } ?>