<div class="top-bar clearfix">
  <div class="page-title">
    <h4>Add Attendance</h4>
    <span class="pull-right">
      <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
        <?php echo $this->session->flashdata('message'); ?>
      <?php } ?>
    </span>
  </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-6">
        <a href="<?php echo base_url('super/students_attendance/');?>" class="btn btn-danger pull-left"><i class="fa fa-history"></i> Attendance Log</a>
        <div class="clearfix"></div>
        <br>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <form action="<?php echo base_url('super/students_attendance/search_attendance_records/');?>" method="post">
          <div class="form-group">
            <div class="col-lg-3" style="margin-left: 110px">
              <select class="form-control" name="school_name_id_attendance" id="school_name_id_attendance" required="required">
                <option value="">Select School</option>
                <?php foreach($schools as $schools_list){ ?>
                <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-lg-3" style="margin-left:-25px">
              <select class="form-control" name="class_name_id_attendance" id="class_name_id_attendance" required="required">
              </select>
            </div>
            <div class="col-lg-3" style="margin-left: -25px">
              <select class="form-control" name="section_name_id_attendance" id="section_name_id_attendance" required="required">
              </select>
            </div>
            <div class="col-lg-1" style="margin-left: -20px">
              <button type="submit" class="btn btn-primary" style="height: 40px">Search</button>
            </div>
            <div class="clearfix"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>