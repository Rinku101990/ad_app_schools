<div class="top-bar clearfix">
  <div class="page-title">
      <h4>Assignments</h4>
  </div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
          <div class="col-lg-6">
              <a href="<?php echo base_url('super/students/add');?>" class="btn btn-danger pull-left">
                <i class="fa fa-plus"></i> Add New Student
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
              <div class="form-group has-feedback">
                <div class="col-lg-6">
                  <select class="form-control" name="country" data-bv-field="country">
                    <option value="">-- Select School --</option>
                    <option value="fr">DPS Delhi</option>
                    <option value="de">SMP, bareilly</option>
                  </select>
                  <i class="form-control-feedback" data-bv-icon-for="country" style="display: none;"></i>
                  <small class="help-block" data-bv-validator="notEmpty" data-bv-for="country" data-bv-result="NOT_VALIDATED" style="display: none;">The country is required and can't be empty</small>
                </div>
                <div class="col-lg-6 pull-right">
                  <select class="form-control" name="country" data-bv-field="country">
                      <option value="">-- Select a Class --</option>
                      <option value="fr">One</option>
                      <option value="de">Two</option>
                      <option value="it">Three</option>
                  </select>
                  <i class="form-control-feedback" data-bv-icon-for="country" style="display: none;"></i>
                  <small class="help-block" data-bv-validator="notEmpty" data-bv-for="country" data-bv-result="NOT_VALIDATED" style="display: none;">The country is required and can't be empty</small>
                </div>
              </div>
            </div>
            <div class="clearfix"></div> <br>
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
              <div class="panel panel-red">
                <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                    <?php echo $this->session->flashdata('message'); ?>
                <?php } ?>
                  <div class="panel-body">
                      <div class="tabbable">
                          <ul class="nav nav-tabs">
                              <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                              <li class=""><a href="#one" data-toggle="tab">Section A</a></li>
                              <li><a href="#three" data-toggle="tab">Section B</a></li>
                          </ul>
                          <div class="tab-content no-margin">
                            <div class="tab-pane active" id="all">
                              <div class="panel-body">
                                <div class="table-responsive">
                                  <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                        <th><input type="checkbox" value="None" id="check2" name="check"> </th>
                                        <th>name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Roll No</th>
                                        <th>UserId</th>
                                        <th>Parents</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($students as $students_list){ ?>
                                      <tr>
                                        <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                        <td><?php echo $students_list->stud_name;?></td>
                                        <td><?php echo $students_list->stud_mobile_no;?></td>
                                        <td><?php echo $students_list->stud_email;?></td>
                                        <td><?php echo $students_list->stud_id;?></td>
                                        <td><?php echo $students_list->stud_ref_id;?></td>
                                        <td><?php echo $students_list->prnt_gaurdian_name;?></td>
                                        <?php if(($students_list->stud_status)=='0'){ ?>
                                        <td>
                                          <label class="switch">
                                            <input type="checkbox" class="switch-input" checked="checked">
                                            <span class="switch-label" data-on="On" data-off="Off"></span> 
                                            <span class="switch-handle"></span>
                                          </label>
                                        </td>
                                        <?php }else{ ?>
                                          <td>
                                            <label class="switch">
                                              <input type="checkbox" class="switch-input">
                                              <span class="switch-label" data-on="On" data-off="Off"></span> 
                                              <span class="switch-handle"></span>
                                            </label>
                                          </td>
                                        <?php } ?>
                                        <td>
                                          <a href="<?php echo base_url('super/students/profile');?>/<?php echo $students_list->stud_id;?>" class="btn btn-success btn-xs" title="View Student Profile"><i class="fa fa-eye"></i> </a>
                                          <a href="<?php echo base_url('super/students/add');?>/<?php echo $students_list->stud_id;?>" class="btn btn-primary btn-xs" title="Edit Student"><i class="fa fa-pencil" ></i> </a>
                                          <a onclick="return confirm('are you sure want to delete!.');" href="<?php echo base_url('super/students/delete');?>/<?php echo $students_list->cms_id;?>/<?php echo $students_list->stud_id;?>" class="btn btn-danger btn-xs" title="Delete Student"><i class="fa fa-trash"></i> </a>
                                          <button type="button" class="btn btn-warning btn-xs" title="Send Notification"><i class="fa fa-bell"></i> </button>
                                          <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key" title="Send Credentials on his mobile"></i> </button>
                                         </td>
                                      </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <th colspan="5">
                                          <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                          <button type="button" class="btn btn-success btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                           <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                           <button type="button" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                                           <button type="button" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                           <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> Send Notification</button>
                                           <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key"></i> Send Credentials</button></th>
                                      </tr>
                                    </tfoot>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="one">
                              <div class="panel-body">
                                <div class="table-responsive">
                                  <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                        <th><input type="checkbox" value="None" id="check2" name="check"> </th>
                                        <th>name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Roll No</th>
                                        <th>UserId</th>
                                        <th>Parents</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                        <td>Lavish Gangwar</td>
                                        <td>+91 9718789479</td>
                                        <td>lavishgang@gmail.com</td>
                                        <td>22</td>
                                        <td>DPS125986</td>
                                        <td>DPS125986</td>
                                        <td>
                                          <label class="switch">
                                          <input type="checkbox" class="switch-input" checked="checked"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span></label>
                                        </td>
                                        <td>
                                          <button type="button" class="btn btn-primary btn-xs" title="Edit Student"><i class="fa fa-pencil" ></i> </button>
                                           <button type="button" class="btn btn-danger btn-xs" title="Delete Student"><i class="fa fa-trash"></i> </button>
                                           <button type="button" class="btn btn-success btn-xs" title="View Student Profile"><i class="fa fa-eye"></i> </button>
                                           <button type="button" class="btn btn-warning btn-xs" title="Send Notification"><i class="fa fa-bell"></i> </button>
                                           <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key" title="Send Credentials on his mobile"></i> </button>
                                         </td>
                                      </tr>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <th colspan="5">
                                          <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                          <button type="button" class="btn btn-success btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                          <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                          <button type="button" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                                          <button type="button" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                          <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> Send Notification</button>
                                          <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key"></i> Send Credentials</button></th>
                                      </tr>
                                    </tfoot>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="three">
                              <div class="panel-body">
                                <div class="table-responsive">
                                  <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                          <th><input type="checkbox" value="None" id="check2" name="check"> </th>
                                          <th>name</th>
                                          <th>Mobile</th>
                                          <th>Email</th>
                                          <th>Roll No</th>
                                          <th>UserId</th>
                                          <th>Parents</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                        <td>Lavish Gangwar</td>
                                        <td>+91 9718789479</td>
                                        <td>lavishgang@gmail.com</td>
                                        <td>22</td>
                                        <td>DPS125986</td>
                                        <td>DPS125986</td>
                                        <td>
                                          <label class="switch">
                                          <input type="checkbox" class="switch-input" checked="checked"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span></label>
                                        </td>
                                        <td>
                                          <button type="button" class="btn btn-primary btn-xs" title="Edit Student"><i class="fa fa-pencil" ></i> </button>
                                           <button type="button" class="btn btn-danger btn-xs" title="Delete Student"><i class="fa fa-trash"></i> </button>
                                           <button type="button" class="btn btn-success btn-xs" title="View Student Profile"><i class="fa fa-eye"></i> </button>
                                           <button type="button" class="btn btn-warning btn-xs" title="Send Notification"><i class="fa fa-bell"></i> </button>
                                           <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key" title="Send Credentials on his mobile"></i> </button>
                                         </td>
                                      </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                          <th colspan="5">
                                            <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                            <button type="button" class="btn btn-success btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                             <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                             <button type="button" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                                             <button type="button" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                             <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> Send Notification</button>
                                             <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key"></i> Send Credentials</button></th>
                                        </tr>
                                    </tfoot>
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