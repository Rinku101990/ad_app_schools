<div class="top-bar clearfix">
  <div class="page-title">
    <h4>Assignments</h4>
  </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <p  style="margin-top: 3px;">
          <button type="button" id="btnSaveNewAssignment" class="btn btn-danger btn-md"><i class="fa fa-plus"></i> Create New Assignment</button>
        </p>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
        <form method="post" id="assignmentSearch">
          <div class="form-group has-feedback">
            <div class="col-lg-4">
              <select class="form-control" name="asgn_school_id" id="asgn_school_id1" style="width:254px" required="required">
                <option value="">-- Select School --</option>
                <?php foreach($schools as $schools_list){ ?>
                <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-lg-3">
              <select class="form-control" name="asgn_class_id" id="asgn_class_id1" style="width:190px" required="required">
              </select>
            </div>
            <div class="col-lg-3">
              <select class="form-control" name="asgn_section_id" id="asgn_section_id1" style="width:185px" required="required">
              </select>
            </div>
            <div class="col-lg-2 pull-right">
              <button type="button" class="btn btn-success" id="btnAssignmentsSearch" style="height:39px;margin-left: -5px"><i class="fa fa-search"></i> Check</button>
            </div>
          </div>
        </form>
      </div>
      <div class="clearfix"></div> <br>
      <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
          <div class="panel panel-red">
            <div class="panel-body">
              <span class="pull-right">
                <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                  <?php echo $this->session->flashdata('message'); ?>
                <?php } ?>
              </span>
              <div class="tabbable">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#all" data-toggle="tab">All</a></li><!-- 
                  <li class=""><a href="#one" data-toggle="tab">Section A</a></li>
                  <li><a href="#three" data-toggle="tab">Section B</a></li> -->
                </ul>
                <div class="tab-content no-margin">
                  <div class="tab-pane active" id="all">
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>S.No</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Submission Date</th>
                              <th>Assign Date</th>
                              <th>Section</th>
                              <th>Students</th>
                              <th>Assignment File</th>
                              <th>Posted By</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody  id="assignmentsResult">
                          <?php $i=1; foreach($assignments as $assignments_list){ ?>
                            <tr>
                              <td><?php echo $i++;?></td>
                              <td><?php echo $assignments_list->asgn_title;?></td>
                              <td><?php echo $assignments_list->asgn_description;?></td>
                              <td><?php $new_submission = date('d M-Y', strtotime($assignments_list->asgn_submission_date)); echo $new_submission;?></td>
                              <td><?php $new_assigned = date('d M-Y', strtotime($assignments_list->asgn_created)); echo $new_assigned;?></td>
                              <td><?php echo $assignments_list->sect_name;?></td>
                              <td><?php echo $assignments_list->stud_name;?></td>
                              <td><a href="<?php echo base_url();?>/<?php echo $assignments_list->asgn_atteched_file;?>" class="btn btn-success btn-xs" download=""><i class="fa fa-download"></i> Download</a></td>
                              <?php if($assignments_list->asgn_assigned_by!=''){ ?>
                              <td><?php echo $assignments_list->asgn_assigned_by;?></td>
                              <?php }else{ ?>
                              <td>NA</td>
                              <?php } ?>

                              <?php if(($assignments_list->asgn_status)=='0'){ ?>
                              <td>
                                <label class="switch" id="switch<?php echo $assignments_list->asgn_id;?>">
                                  <input type="checkbox" name="status" id="assignStatusOff" assignStatusOff="<?php echo $assignments_list->asgn_id;?>" class="switch-input assignStatusOff" checked="checked" value="1">
                                  <span class="switch-label" data-on="On" data-off="Off"></span> 
                                  <span class="switch-handle"></span>
                                </label>
                              </td>
                              <?php }else{ ?>
                              <td>
                                <label class="switch" id="switch<?php echo $assignments_list->sub_id;?>">
                                  <input type="checkbox" name="status" id="assignStatusOn" assignStatusOn="<?php echo $assignments_list->asgn_id;?>" class="switch-input assignStatusOn" value="0">
                                  <span class="switch-label" data-on="On" data-off="Off"></span> 
                                  <span class="switch-handle"></span>
                                </label>
                              </td>
                              <?php } ?>

                              <td>
                                <a onclick="return confirm('Are you sure want to delete');" href="<?php echo base_url('super/assignments/remove/');?><?php echo $assignments_list->asgn_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                              </td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="tab-pane" id="one">
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th><input type="checkbox" value="None" id="check2" name="check"> All</th>
                              <th>Subject Name</th>
                              <th>Author</th>
                              <th>Subject Code</th>
                              <th>Created On</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="checkbox" value="None" id="check2" name="check"></td>
                              <td>Mathematics</td>
                              <td>R.D. Verma</td>
                              <td>MATH0023</td>
                              <td>21/08/2018</td>
                              <td>
                                <label class="switch">
                                  <input type="checkbox" class="switch-input" checked="checked"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span>
                                </label>
                              </td>
                              <td>    
                                <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </button>
                                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th colspan="5">
                                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                <button type="button" class="btn btn-info btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                <button type="button" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</button>
                              </th>
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
                              <th><input type="checkbox" value="None" id="check2" name="check"> All</th>
                              <th>Subject Name</th>
                              <th>Author</th>
                              <th>Subject Code</th>
                              <th>Created On</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="checkbox" value="None" id="check2" name="check"></td>
                              <td>Mathematics</td>
                              <td>R.D. Verma</td>
                              <td>MATH0023</td>
                              <td>21/08/2018</td>
                              <td>
                                <label class="switch">
                                  <input type="checkbox" class="switch-input" checked="checked"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span>
                                </label>
                              </td>
                              <td>    
                                <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </button>
                                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button>
                              </td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th colspan="5">
                                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                <button type="button" class="btn btn-info btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                <button type="button" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</button>
                              </th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- ADD NEW ASSIGNMENTS FOR CLASSES -->
<div class="modal fade" id="newAssignmentModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 22%;width: 150%;margin-left:-5%">
      <div class="modal-header" style="text-align: center">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="margin-left:-80%">Add New Assignment</h4>
      </div>
      <div class="panel-body">
        <form method="post" id="formAssignmentsRecord" class="form-horizontal" enctype="multipart/form-data">
          <fieldset>
            <div class="row">
              <div class="form-group col-lg-6">
              <label class="col-lg-4 control-label">School</label>
                <div class="col-lg-8">
                  <select class="form-control" name="asgn_school_id" id="asgn_school_id" required="required">
                    <option value="">-- Select School --</option>
                    <?php foreach($schools as $schools_list){ ?>
                    <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Class</label>
                <div class="col-lg-8">
                  <select class="form-control" name="asgn_class_id" id="asgn_class_id" required="required">
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Section</label>
                <div class="col-lg-8">
                  <select class="form-control" name="asgn_section_id" id="asgn_section_id" required="required">
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Subject</label>
                <div class="col-lg-8">
                  <select class="form-control" name="asgn_subject_id" id="asgn_subject_id" required="required">
                    <option value="">-- Select Subject --</option>
                    <option value="">One</option>
                    <option value="">Two</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Students</label>
                <div class="col-lg-8">
                  <select class="form-control" name="asgn_students_id" id="asgn_students_id" required="required">
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Assignments Title</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" name="asgn_title" placeholder="Enter Assignments Title" required="required">
                </div>
              </div>
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Description</label>
                <div class="col-lg-8">
                  <textarea class="form-control" name="asgn_description" placeholder="Enter Assignment Description"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Submission Date</label>
                <div class="col-lg-8">
                  <input type="date" class="form-control" name="asgn_submission_date" required="required">
                </div>
              </div>
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Attachment File</label>
                <div class="col-lg-8">
                  <input type="file" class="form-control" name="userfile" required="required">
                </div>
              </div>
            </div>
          </fieldset>
          <div class="row">
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-8">
                <button type="submit" class="btn btn-success">Save Assignments</button>
                <button type="reset" class="btn btn-danger">Clear</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
    </div>
  </div>
</div>
<!-- END OF THE NEW ASIGNMENT FOR CLASSES -->