<div class="top-bar clearfix">
    <div class="page-title">
      <h4>Subjects</h4></div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p><button class="btn btn-danger btn-xs" id="btnSaveNewSubject"><i class="fa fa-plus"></i> Create New Subject</button></p>
      </div>
      </div>
      <div class="clearfix"></div> <br>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-blue">
          <div class="panel-heading">
            <h4>Subjects</h4>
            <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                <?php echo $this->session->flashdata('message'); ?>
            <?php } ?>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <form method="post" action="<?php echo base_url('super/subjects/subject_excel');?>" style="overflow: hidden">
              <table id="fixedHeader" class="table table-striped table-bordered no-margin subjectPdf" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th><input type="checkbox" id="subjectItem" name="checkAllSubject"> All</th>
                    <th>Subject Name</th>
                    <th>Author Name</th>
                    <th>Subject Code</th>
                    <th>Created On</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($subjects as $subjects_list){ ?>
                  <tr>
                    <td>
                      <input type="checkbox" value="<?php echo $subjects_list->sub_id;?>" id="checkitem" checkitem="<?php echo $subjects_list->sub_id;?>" name="subjectItem[]" class="subjectItem">
                    </td>
                    <td><?php echo $subjects_list->sub_name;?></td>
                    <td><?php echo $subjects_list->sub_auth_name;?></td>
                    <td><?php echo $subjects_list->sub_code;?></td>
                    <td><?php $newDate = date('d M-Y', strtotime($subjects_list->sub_created)); echo $newDate;?></td>
                    
                    <?php if(($subjects_list->sub_status)=='0'){ ?>
                    <td>
                      <label class="switch" id="switch<?php echo $subjects_list->sub_id;?>">
                        <input type="checkbox" name="status" id="subjectStatusOff" subjectStatusOff="<?php echo $subjects_list->sub_id;?>" class="switch-input subjectStatusOff" checked="checked" value="1">
                        <span class="switch-label" data-on="On" data-off="Off"></span> 
                        <span class="switch-handle"></span>
                      </label>
                    </td>
                    <?php }else{ ?>
                    <td>
                      <label class="switch" id="switch<?php echo $subjects_list->sub_id;?>">
                        <input type="checkbox" name="status" id="subjectStatusOn" subjectStatusOn="<?php echo $subjects_list->sub_id;?>" class="switch-input subjectStatusOn" value="0">
                        <span class="switch-label" data-on="On" data-off="Off"></span> 
                        <span class="switch-handle"></span>
                      </label>
                    </td>
                    <?php } ?>

                    <td>    
                      <button type="button" class="btn btn-info btn-xs btnViewSubjects" viewsub="<?php echo $subjects_list->sub_id;?>"><i class="fa fa-pencil"></i> </button>
                      <a onclick="return confirm('Are you sure want to delete');" href="<?php echo base_url('super/subjects/remove_subjects');?>/<?php echo $subjects_list->sub_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <?php if(!empty($subjects)){ ?>
                  <tr>
                    <th colspan="7">
                      <button type="button" class="btn btn-danger btn-xs btnDisableMultipleSubjects"><i class="fa fa-ban"></i> Disable</button>
                      <button type="button" class="btn btn-info btn-xs btnEnableMultipleSubject"><i class="fa fa-flag"></i> Enable</button>
                      <button type="button" class="btn btn-danger btn-xs" id="btnDeleteSelectedSubjects"><i class="fa fa-trash"></i> Delete</button>
                      <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                      <button type="button" class="btn btn-default btn-xs btnSaveSubjectPdf"><i class="fa fa-file-pdf-o"></i> PDF</button>
                    </th>
                  </tr>
                <?php } ?>
                </tfoot>
              </table>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SAVE SUBJECT LIST MODAL -->
<div class="modal fade" id="newSubjectModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 22%;width: 100%;margin-left:17%">
      <div class="modal-header" style="text-align: center">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="margin-left:-70%">Add New Subject</h4>
      </div>
      <div class="panel-body">
         <form method="post" id="formNewAddSubject" class="form-horizontal">
            <fieldset>
                <div class="form-group col-lg-12">
                  <label class="col-lg-3 control-label">School</label>
                  <div class="col-lg-9">
                    <select class="form-control" name="schlidforSubject" id="schlidforSubject" required="required">
                      <option value="">-- Select School --</option>
                      <?php foreach($schools as $schools_list){ ?>
                      <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group col-lg-12" id="classDiv" style="display: none">
                  <label class="col-lg-3 control-label">Class</label>
                  <div class="col-lg-9">
                    <select class="form-control" name="classidforSubject" id="classidforSubject" required="required">
                    </select>
                  </div>
                </div>
                <div class="form-group col-lg-12">
                  <label class="col-lg-3">Subject Name</label>
                  <div class="col-lg-9">
                    <input type="text" name="subject_name" class="form-control" id="subject_name" placeholder="Enter Subject Name" required="required">
                  </div>
                </div>
                <div class="form-group col-lg-12" id="noti_type">
                    <label class="col-lg-3">Subject Code</label>
                    <div class="col-lg-9">
                      <input type="text" name="subject_code" class="form-control" id="subject_code" placeholder="Enter Subject Code" required="required">
                    </div>
                </div>
                <div class="form-group col-lg-12" id="noti_type">
                    <label class="col-lg-3">Author</label>
                    <div class="col-lg-9">
                      <input type="text" name="subject_auth" class="form-control" id="subject_auth" placeholder="Enter Subject Author" required="required">
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-3">Description</label>
                    <div class="col-lg-9">
                        <textarea name="subject_desc" id="subject_desc" rows="4" class="form-control" placeholder="Enter Subject Description(optional)"></textarea>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <div class="col-lg-5 pull-right" style="margin-top:10px">
                        <button type="submit" class="btn btn-success" style="margin-left:10px">Save Subject</button>
                        <button type="cancel" class="btn btn-danger">Cancel</button>
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

<!-- VIEW SUB CATEGORY BY ID -->
<div class="modal fade" id="viewSubjectModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 22%;width: 100%;margin-left:17%">
      <div class="modal-header" style="text-align: center">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="margin-left:-70%">Update Subject</h4>
      </div>
      <div class="panel-body">
         <form method="post" id="formUpdateSubject" class="form-horizontal">
            <fieldset>
                <div class="form-group col-lg-12">
                  <label class="col-lg-3 control-label">School</label>
                  <div class="col-lg-9">
                    <select class="form-control" name="updateSchlidforSubject" id="updateSchlidforSubject" required="required">
                      <option value="">-- Select School --</option>
                      <?php foreach($schools as $schools_list){ ?>
                      <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group col-lg-12" id="updateClassDiv" style="display: none">
                  <label class="col-lg-3 control-label">Class</label>
                  <div class="col-lg-9">
                    <select class="form-control" name="updateClassidforSubject" id="updateClassidforSubject" required="required">
                    </select>
                  </div>
                </div>
                <div class="form-group col-lg-12">
                  <label class="col-lg-3">Subject Name</label>
                  <div class="col-lg-9">
                    <input type="hidden" name="subject_id" id="usubject_id">
                    <input type="text" name="subject_name" class="form-control" id="usubject_name" placeholder="Enter Subject Name" required="required">
                  </div>
                </div>
                <div class="form-group col-lg-12" id="noti_type">
                    <label class="col-lg-3">Subject Code</label>
                    <div class="col-lg-9">
                      <input type="text" name="subject_code" class="form-control" id="usubject_code" placeholder="Enter Subject Code" required="required">
                    </div>
                </div>
                <div class="form-group col-lg-12" id="noti_type">
                    <label class="col-lg-3">Author</label>
                    <div class="col-lg-9">
                      <input type="text" name="subject_auth" class="form-control" id="usubject_auth" placeholder="Enter Subject Author" required="required">
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-3">Description</label>
                    <div class="col-lg-9">
                        <textarea name="subject_desc" id="usubject_desc" rows="4" class="form-control" placeholder="Enter Subject Description(optional)"></textarea>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <div class="col-lg-5 pull-right" style="margin-top:10px">
                        <button type="submit" class="btn btn-success" style="margin-left:-1px">Update Subject</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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

<!-- Subject deletion report modal -->
<div class="modal fade" id="error_delete_page" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 28%;width: 70%;margin-left:27%">
      <div class="modal-header" style="text-align: center">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Delete Selected Subjects</h4>
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
<!-- Subject Deletion Report Modal -->