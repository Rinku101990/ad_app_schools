<div class="top-bar clearfix">
  <div class="page-title">
      <h4>Students Record List</h4>
  </div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
          <div class="col-lg-6">
              <a href="<?php echo base_url('super/students/add');?>" class="btn btn-danger pull-left" style="margin-top: 21px">
                <i class="fa fa-plus"></i> Add New Student
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">

            <form method="post" id="studSeach">
              <div class="form-group has-feedback">
                <div class="col-lg-5">
                  <select class="form-control" name="school_id" id="school_id" data-bv-field="school" required="required">
                    <option value="">-- Select School --</option>
                    <?php foreach($schools as $schools_list){ ?>
                    <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-lg-5">
                  <select class="form-control" name="classes" id="classes" data-bv-field="class">
                  </select>
                  </div>
                <div class="col-lg-2 pull-right">
                  <button type="button" class="btn btn-success" id="btnStudSearch" style="height:39px;margin-left: -5px"><i class="fa fa-search"></i> Check</button>
                </div>
              </div>
            </form>
            </div>
            <div class="clearfix"></div> <br>
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
              <div class="panel panel-red">
                <div id="MsgStatus" class="alert alert-success" style="float:right;padding: 15px;margin-right: 17px;font-size: 15px"></div>
                <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                    <?php echo $this->session->flashdata('message'); ?>
                <?php } ?>
                  <div class="panel-body">
                      <div class="tabbable">
                          <ul class="nav nav-tabs">
                              <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                              <!-- <li class=""><a href="#one" data-toggle="tab">Section A</a></li>
                              <li><a href="#three" data-toggle="tab">Section B</a></li> -->
                          </ul>
                          <div class="tab-content no-margin">
                            <div class="tab-pane active" id="all">
                              <div class="panel-body">
                                <div class="table-responsive">
                                <form action="<?php echo base_url('super/studentsexcel/student_list');?>" method="post" style="overflow: hidden">
                                  <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                        <th><input type="checkbox" id="checkall" name="checkall"> </th>
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
                                    <tbody id="searchResult">
                                    <?php foreach($students as $students_list){ ?>
                                      <tr>
                                        <td>
                                          <input type="checkbox" value="<?php echo $students_list->stud_id;?>" id="checkitem" name="checkitem[]" class="checkitem">
                                          <input type="hidden" name="ms_id[]" class="ms_id" value="<?php echo $students_list->cms_id;?>">
                                        </td>
                                        <td>
                                          <?php echo $students_list->stud_name;?>
                                        </td>
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
                                        <th colspan="9">
                                          <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                          <button type="button" class="btn btn-success btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                          <button type="button" class="btn btn-danger btn-xs" id="btnDeleteSelectedStudents"><i class="fa fa-trash"></i> Delete</button>
                                          <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                                          <button type="button" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                          <button type="button" class="btn btn-warning btn-xs" id="btnSendNotification"><i class="fa fa-bell"></i> Send Notification</button>
                                          <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key"></i> Send Credentials</button></th>
                                      </tr>
                                    </tfoot>
                                  </table>
                                </form>
                                </div>
                              </div>
                            </div>
                            <!-- <div class="tab-pane" id="one">
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
                            </div> -->

                            <!-- Student deletion report modal -->
                            <div class="modal fade" id="error_page" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content" style="margin-top: 28%;width: 70%;margin-left:27%">
                                  <div class="modal-header" style="text-align: center">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Delete Selected Students</h4>
                                    <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                                        <?php echo $this->session->flashdata('message'); ?>
                                    <?php } ?>
                                  </div>
                                  <div class="panel-body">
                                      <p style="text-align: center" class="text-danger">No records selected for delete</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Student deletion report modal -->

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>