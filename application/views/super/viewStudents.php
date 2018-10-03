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
                                <form action="<?php echo base_url('super/studentsexcel/student_list');?>" method="post" style="overflow: hidden" class="excelAction">
                                  <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                        <th><input type="checkbox" id="checkall" name="checkall"> </th>
                                        <th>Name</th>
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
                                          <input type="checkbox" value="<?php echo $students_list->stud_id;?>" id="checkitem" checkitem="<?php echo $students_list->stud_id;?>" name="checkitem[]" class="checkitem">
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
                                          <label class="switch" id="switch<?php echo $students_list->stud_id;?>">
                                            <input type="checkbox" name="status" id="statusOff" statusOff="<?php echo $students_list->stud_id;?>" class="switch-input statusOff" checked="checked" value="1">
                                            <span class="switch-label" data-on="On" data-off="Off"></span> 
                                            <span class="switch-handle"></span>
                                          </label>
                                        </td>
                                        <?php }else{ ?>
                                        <td>
                                          <label class="switch" id="switch<?php echo $students_list->stud_id;?>">
                                            <input type="checkbox" name="status" id="statusOn" statusOn="<?php echo $students_list->stud_id;?>" class="switch-input statusOn" value="0">
                                            <span class="switch-label" data-on="On" data-off="Off"></span> 
                                            <span class="switch-handle"></span>
                                          </label>
                                        </td>
                                        <?php } ?>

                                        <td>
                                          <a href="<?php echo base_url('super/students/profile');?>/<?php echo $students_list->stud_id;?>" class="btn btn-success btn-xs" title="View Student Profile"><i class="fa fa-eye"></i> </a>
                                          <a href="<?php echo base_url('super/students/add');?>/<?php echo $students_list->stud_id;?>" class="btn btn-primary btn-xs" title="Edit Student"><i class="fa fa-pencil" ></i> </a>
                                          <a onclick="return confirm('are you sure want to delete!.');" href="<?php echo base_url('super/students/delete');?>/<?php echo $students_list->cms_id;?>/<?php echo $students_list->stud_id;?>" class="btn btn-danger btn-xs" title="Delete Student"><i class="fa fa-trash"></i> </a>
                                          <button type="button" class="btn btn-warning btn-xs btnSendNotify" id="btnNotify" stid="<?php echo $students_list->stud_id;?>" schlid="<?php echo $students_list->schl_id;?>" clsid="<?php echo $students_list->cls_id;?>" sectid="<?php echo $students_list->sect_id;?>" title="Send Notification"><i class="fa fa-bell"></i> </button>
                                          <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key" title="Send Credentials on his mobile"></i> </button>
                                         </td>
                                      </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <th colspan="9">
                                          <button type="button" class="btn btn-danger btn-xs btnDisableMultipleStudents"><i class="fa fa-ban"></i> Disable</button>
                                          <button type="button" class="btn btn-success btn-xs btnEnableMultipleStudents"><i class="fa fa-flag"></i> Enable</button>
                                          <button type="button" class="btn btn-danger btn-xs" id="btnDeleteSelectedStudents"><i class="fa fa-trash"></i> Delete</button>
                                          <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                                          <button type="button" class="btn btn-default btn-xs btnSavePdf"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                          <button type="button" class="btn btn-warning btn-xs" id="btnSendNotification"><i class="fa fa-bell"></i> Send Notification</button>
                                          <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key"></i> Send Credentials</button>
                                        </th>
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

                            <!-- Student Notification send modal -->
                            <div class="modal fade" id="error_notify_page" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content" style="margin-top: 28%;width: 70%;margin-left:27%">
                                  <div class="modal-header" style="text-align: center">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Send Notification To Selected Students</h4>
                                  </div>
                                  <div class="panel-body">
                                      <p style="text-align: center" class="text-danger">No records selected for Notification</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal fade" id="select_notify_page" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content" style="margin-top: 13%;width: 78%;margin-left:25%">
                                  <div class="modal-header" style="text-align: center">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Send Notification To Selected Students</h4>
                                  </div>
                                  <div class="panel-body">
                                      <form method="post" action="<?php echo base_url('super/students/send_notifications');?>" class="form-horizontal">
                                        <fieldset>
                                            <div class="form-group col-lg-12">
                                              <label class="col-lg-4"></label>
                                              <div class="col-lg-8">
                                                <input type="text" name="students_id" class="form-control" id="students_id">
                                              </div>
                                            </div>
                                            <div class="form-group col-lg-12" id="noti_type">
                                                <label class="col-lg-4 control-label">Notification Type</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="notification_type" id="notification_type" required="required">
                                                        <option value="" disabled="disabled">Notification Type</option>
                                                        <?php foreach($templates as $tmpl_list){ ?>
                                                        <option value="<?php echo $tmpl_list->tmpl_id;?>"><?php echo $tmpl_list->tmpl_name;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12" id="noti_content" style="display: none">
                                                <label class="col-lg-4 control-label">Content</label>
                                                <div class="col-lg-8">
                                                    <textarea name="notification_content" id="notification_content" rows="10" class="form-control"></textarea>
                                                </div>
                                                <div class="col-lg-3 pull-right">
                                                    <button class="btn btn-success" style="margin-top: 5px;margin-left: 13px">Send</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                      </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Student Notification send Modal -->
                            <!-- Student deletion report modal -->
                            <div class="modal fade" id="error_page" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content" style="margin-top: 28%;width: 70%;margin-left:27%">
                                  <div class="modal-header" style="text-align: center">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Delete Selected Students</h4>
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
                            <!-- Student Deletion Report Modal -->
                            <!-- Student Excel Report Modal -->
                            <div class="modal fade" id="error_report_page" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content" style="margin-top: 28%;width: 70%;margin-left:27%">
                                  <div class="modal-header" style="text-align: center">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Select Students for Report</h4>
                                  </div>
                                  <div class="panel-body">
                                      <p style="text-align: center" class="text-danger">No records selected for report</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Student Deletion Report Modal -->

                            <!-- Student Pdf Report Modal -->
                            <div class="modal fade" id="error_pdf_page" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content" style="margin-top: 28%;width: 70%;margin-left:27%">
                                  <div class="modal-header" style="text-align: center">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Select Students for Pdf</h4>
                                  </div>
                                  <div class="panel-body">
                                      <p style="text-align: center" class="text-danger">No records selected for Pdf</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Student Deletion Report Modal -->

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>