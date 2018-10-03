<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Time Table</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <p><button class="btn btn-danger btn-xs" id="btnSaveNewTimeTable"><i class="fa fa-plus"></i> Add Time Table</button></p>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
              <form method="post" id="timeTableSearch">
                <div class="form-group has-feedback">
                  <div class="col-lg-4">
                    <select class="form-control" name="school_id" id="school_id" data-bv-field="school" required="required">
                      <option value="">-- Select School --</option>
                      <?php foreach($schools as $schools_list){ ?>
                      <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control" name="classes" id="classes" data-bv-field="class">
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <select class="form-control" name="sections" id="sections" data-bv-field="class">
                    </select>
                  </div>
                  <div class="col-lg-2 pull-right">
                    <button type="button" class="btn btn-success" id="btnTimeTableSearch" style="height:39px;margin-left: -5px"><i class="fa fa-search"></i> Check</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="clearfix"></div><br>
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="panel panel-red">
                  <div class="panel-body">
                    <span class="pull-right">
                      <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                        <?php echo $this->session->flashdata('message'); ?>
                      <?php } ?>
                    </span>

                      <div class="panel-group">
                        <div class="panel panel-default" id="timeTableResult">
                          
                        </div>
                      </div>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SAVE SYLLABUS MODAL -->
<div class="modal fade" id="newTimeTableModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 22%;width: 150%;margin-left:-5%">
      <div class="modal-header" style="text-align: center">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="margin-left:-80%">Add Time Table</h4>
      </div>
      <div class="panel-body">
         <form method="post" id="formSaveTimeTable" class="form-horizontal">
          <fieldset>
            <div class="row">
              <div class="form-group col-lg-6">
              <label class="col-lg-4 control-label">School</label>
              <div class="col-lg-8">
                <select class="form-control" name="timeSchoolId" id="timeSchoolId" required="required">
                  <option value="">-- Select School --</option>
                  <?php foreach($schools as $schools_list){ ?>
                  <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                  <?php } ?>
                </select>
              </div>
              </div>
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Session</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" name="session" id="session" value="2018-2020" readonly="readonly">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Class</label>
                <div class="col-lg-8">
                  <select class="form-control" name="timeClassId" id="timeClassId">
                  </select>
              </div>
              </div>
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Section</label>
                <div class="col-lg-8">
                  <select class="form-control" name="sectionid" id="sectionid">
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
              <label class="col-lg-4 control-label">Subject</label>
              <div class="col-lg-8">
                <select class="form-control" name="subjectid" id="subjectid">
                </select>
              </div>
              </div>
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Day</label>
                <div class="col-lg-8">
                  <select class="form-control" name="days" id="days" required="required">
                    <option value="">-- Select Day --</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
              <label class="col-lg-4 control-label">Teacher</label>
              <div class="col-lg-8">
                <select class="form-control" name="teacherid" id="teacherid">
                </select>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Time From</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="timefrom" id="timefrom" placeholder="Example: Class One Syllabus" required="required">
                </div>
              </div>
              <div class="form-group col-lg-6">
                <label class="col-lg-4 control-label">Time to</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="timeto" id="timeto" placeholder="Example: Class One Syllabus" required="required">
                </div>
              </div>
            </div>
          </fieldset>
          <div class="form-group">
            <div class="col-lg-3 pull-right" style="margin-top:10px;">
                <button type="submit" class="btn btn-success" style="margin-left: 14px;">Save</button>
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

