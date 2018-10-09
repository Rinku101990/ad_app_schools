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
        <a href="<?php echo base_url('super/students_attendance');?>" class="btn btn-danger pull-left"><i class="fa fa-history"></i> Attendance Log</a>
        <div class="clearfix"></div>
        <br>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-blue">
          <div class="panel-heading">
            <h4>Students list for attendance</h4>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered no-margin attendance" cellspacing="0" width="100%">
                <thead class="">
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Subject</th>
                    <th>Reason</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($att_students as $att_students_list){ ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><input type="hidden" name="students_id" id="students_id" value="<?php echo $att_students_list->stud_id;?>"><?php echo $att_students_list->stud_name;?></td>
                    <td><input type="hidden" name="stduent_cls" id="stduent_cls" value="<?php echo $att_students_list->cls_id;?>"><input type="hidden" name="schl_id" id="schl_id" value="<?php echo $att_students_list->schl_id;?>"><?php echo $att_students_list->cls_name;?></td>
                    <td><input type="hidden" name="stduent_sect" id="stduent_sect" value="<?php echo $att_students_list->sect_id;?>"><?php echo $att_students_list->sect_name;?></td>
                    <td>
                      <select name="present_status" id="present_status">
                        <option value="P">Present</option>
                        <option value="A">Absent</option>
                        <option value="LP">Late Present</option>
                        <option value="L">Leave</option>
                      </select>
                    </td>
                    <td>
                      <select name="present_type" id="present_type">
                        <option value="WD">Whole Day</option>
                        <option value="HD">Half Day</option>
                      </select>
                    </td>
                    <td>
                      <select name="present_subject" id="present_subject">
                        <option value="0">All Subjects</option>
                        <option value="1">Mathematcis</option>
                        <option value="0">English</option>
                      </select>
                    </td>
                    <td>
                      <select name="reason_for_leave" id="reason_for_leave">
                        <option value="Family Issue">Family Issue</option>
                        <option value="Traffic Issue">Traffic Issue</option>
                        <option value="Health Problem">Health Problem</option>
                        <option value="Accedent Issue">Accedent Issue</option>
                      </select>
                    </td>
                    <td>
                      <button class="btn btn-xs btn-success btnSaveStudentsAttendance" id="btnSaveStudentsAttendance<?php echo $att_students_list->stud_id;?>"><i class="fa fa-send-o"></i></button>
                      <button class="btn btn-xs btn-primary btnEditStudentsAttendance" id="btnEditStudentsAttendance<?php echo $att_students_list->stud_id;?>"><i class="fa fa-edit"></i></button>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
                <!-- <tfoot>
                  <tr>
                    <th colspan="10">
                      <button type="button" class="btn btn-info">Submit</button>
                    </th>
                  </tr>
                </tfoot> -->
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>