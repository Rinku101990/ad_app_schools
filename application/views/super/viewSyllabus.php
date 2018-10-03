<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Syllabus</h4></div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p><button class="btn btn-danger btn-xs" id="btnSaveNewSyllabus"><i class="fa fa-plus"></i> Create New Syllabus</button></p>
      </div>
        <!-- <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pull-right"><div class="form-group has-feedback">
            <div class="col-lg-6">
              <select class="form-control" name="country" data-bv-field="country">
                <option value="">-- Select School --</option>
                <option value="fr">DPS Delhi</option>
                <option value="de">SMP, bareilly</option>
              </select><i class="form-control-feedback" data-bv-icon-for="country" style="display: none;"></i>
              <small class="help-block" data-bv-validator="notEmpty" data-bv-for="country" data-bv-result="NOT_VALIDATED" style="display: none;">The country is required and can't be empty</small>
            </div>
            <div class="col-lg-6 pull-right">
              <select class="form-control" name="country" data-bv-field="country">
                <option value="">-- Select a Class --</option>
                <option value="fr">One</option>
                <option value="de">Two</option>
                <option value="it">Three</option>
              </select><i class="form-control-feedback" data-bv-icon-for="country" style="display: none;"></i>
              <small class="help-block" data-bv-validator="notEmpty" data-bv-for="country" data-bv-result="NOT_VALIDATED" style="display: none;">The country is required and can't be empty</small>
            </div>

          </div>
        </div> -->

        <div class="clearfix"></div><br>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="panel panel-blue">
                  <div class="panel-heading">
                    <h4>Syllabus</h4>
                    <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                        <?php echo $this->session->flashdata('message'); ?>
                    <?php } ?>
                  </div>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th><input type="checkbox" id="checkSyllabus" name="checkAllSyllabus"> All</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created On</th>
                            <th>Syllabus File</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($syllabus as $syllabus_list){ ?>
                          <tr>
                            <td><input type="checkbox" value="<?php echo $syllabus_list->slbs_id;?>" id="checkitem" checkitem="<?php echo $syllabus_list->slbs_id;?>" name="syllabusItem[]" class="syllabusItem"></td>
                            <td><?php echo $syllabus_list->slbs_name;?></td>
                            <td><?php echo $syllabus_list->slbs_description;?></td>
                            <td><?php $new_date = date('d M-Y', strtotime($syllabus_list->slbs_created)); echo $new_date;?></td>
                            <td>
                              <button class="btn btn-sm btn-danger"><i class="fa fa-file-pdf-o"></i></button> <a href="<?php echo base_url();?><?php echo $syllabus_list->slbs_attachments;?>" class="btn btn-success btn-xs" download ><i class="fa fa-download"></i> Download</a>
                            </td>
                            <td>
                              <a onclick="return confirm('Are you sure want to delete.');" href="<?php echo base_url('super/syllabus/remove_syllabus');?>/<?php echo $syllabus_list->slbs_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                            </td>
                          </tr>

                        <?php } ?>
                        </tbody>
                        <tfoot>
                          <?php if(!empty($syllabus)){ ?>
                          <tr>
                            <th colspan="6">
                              <button type="button" class="btn btn-danger btn-xs" id="btnDeleteMultipleSyllabus"><i class="fa fa-trash"></i> Delete</button>
                            </th>
                          </tr>
                        <?php } ?>
                        </tfoot>
                      </table>
                    </div>
                  </div>
              </div>
          </div>
        </div>
  </div>
</div>
<!-- SAVE SYLLABUS MODAL -->
<div class="modal fade" id="newSyllabusModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 22%;width: 100%;margin-left:17%">
      <div class="modal-header" style="text-align: center">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="margin-left:-70%">Add New Syllabus</h4>
      </div>
      <div class="panel-body">
         <form method="post" id="formAddSyllabus" class="form-horizontal" enctype="multipart/form-data">
            <fieldset>
              <div class="form-group col-lg-12">
                  <label class="col-lg-3 control-label">School</label>
                  <div class="col-lg-9">
                      <select class="form-control" name="school_name" id="school_name_id">
                        <option value="">-- Select School --</option>
                        <?php foreach($schools as $schools_list){ ?>
                        <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                        <?php } ?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-lg-12">
                  <label class="col-lg-3 control-label">Class</label>
                  <div class="col-lg-9">
                    <select class="form-control" name="class_name" id="class_name" required="required">
                    </select>
                  </div>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-3 control-label">Syllabus Name</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="syllabus_name" placeholder="Enter Syllabus Name" required="required">
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-3 control-label">Description</label>
                    <div class="col-lg-9">
                        <textarea class="form-control" name="syllabus_desc" placeholder="Write Syllabus description(optional)"></textarea>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-lg-3 control-label">Attach File</label>
                    <div class="col-lg-9">
                        <input type="file" class="form-control" name="userfile" required="required">
                    </div>
                </div>
            </fieldset>
            <div class="form-group">
                <div class="col-lg-4 pull-right" style="margin-top:10px">
                    <button type="submit" class="btn btn-success">Upload</button>
                    <button type="reset" class="btn btn-danger">Clear</button>
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

<!-- Syllabus deletion report modal -->
<div class="modal fade" id="error_delete_page_for_syllabus" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 28%;width: 70%;margin-left:27%">
      <div class="modal-header" style="text-align: center">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Delete Selected Syllabus</h4>
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
<!-- Syllabus Deletion Report Modal -->