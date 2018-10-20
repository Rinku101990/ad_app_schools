<div class="top-bar clearfix">
  <div class="page-title">
    <h4>Students Attendance</h4>
  </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-6">
        <a href="<?php echo base_url('super/students_attendance/add');?>" class="btn btn-danger pull-left"><i class="fa fa-plus"></i> Add Attendance </a>
        <div class="clearfix"></div>
        <br>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <form action="<?php echo base_url('super/students_attendance/get_students_attendance_search_result/');?>" method="post">
          <div class="form-group">
            <div class="col-lg-3" style="margin-left:-15px">
              <select class="form-control" name="school_id_filter_attendance" id="school_id_filter_attendance" required="required">
                <option value="">Select School</option>
                <?php foreach($schools as $schools_list){ ?>
                <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-lg-3" style="margin-left:-25px">
              <select class="form-control" name="class_id_filter_attendance" id="class_id_filter_attendance" required="required">
              </select>
            </div>
            <div class="col-lg-3" style="margin-left:-25px">
              <select class="form-control" name="section_id_filter_attendance" id="section_id_filter_attendance">
              </select>
            </div>
            <div class="col-lg-2" style="margin-left:-25px">
                <input type="date" class="form-control" name="date_id_filter_attendance" id="date_id_filter_attendance">
            </div>
            <div class="col-lg-1"  style="margin-left:-25px">
                <button type="submit" class="btn btn-info" style="height:40px">Search Record</button>
            </div>
            <div class="clearfix"></div>
          </div>
        </form>
      </div>
      <div class="clearfix"></div>
      <span style="width:80%;text-align:left;background: #fdfdfe;">
        <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
          <?php echo $this->session->flashdata('message'); ?>
        <?php } ?>
      </span>
    </div>
  </div>
