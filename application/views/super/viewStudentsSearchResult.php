<div class="top-bar clearfix">
  <div class="page-title">
    <h4>Students Attendance</h4>
  </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-6">
        <a href="<?php echo base_url('super/students_attendance/add');?>" class="btn btn-danger pull-left"><i class="fa fa-search"></i> Search Attendance </a>
        <div class="clearfix"></div>
        <br>
      </div>
      <div class="clearfix"></div>
    <?php if(!empty($totalAttendance)){?>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="panel panel-brown">
          <div class="panel-heading">
            <h4>Attendance Information</h4>
          </div>
          <div class="panel-body">
            <ul class="list-group no-margin">
              <li class="list-group-item "><a href="#">Class<span class="badge red-bg pull-right"><?php echo $totalAttendance[0]->cls_name;?></span></a></li>
              <li class="list-group-item "><a href="#">Section <span class="badge green-bg pull-right"><?php echo $totalAttendance[0]->sect_name;?></span></a></li>
              <li class="list-group-item "><a href="#">Date From<span class="badge blue-bg pull-right"><?php $new_date = date('d M-Y', strtotime($totalAttendance[0]->stdadc_created)); echo $new_date ;?></span></a></li>
            <?php if(isset($admin)){ ?>  
              <li class="list-group-item "><a href="#">Attendance By <span class="badge grey-bg pull-right"><?php echo $admin;?></span></a></li>
            <?php }else{?>
              <li class="list-group-item "><a href="#">Attendance By <span class="badge grey-bg pull-right"><?php echo $attby->tchr_name;?></span></a></li>
            <?php }?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="panel panel-brown">
          <div class="panel-heading" style="height:40px">
            <div class="col-xs-6">
              <h4>Status Information</h4>
            </div>
            <div class="col-xs-6">
              <h4>Total Students</h4>
              <span class="badge pink-bg pull-right"><?php if(!empty($totalStudents)){ foreach($totalStudents as $totalStudents_count){ echo $totalStudents_count;}}else{ echo "0";}?></span>
            </div>
          </div>
          
          <div class="panel-body">
            <ul class="list-group no-margin">
              
              <li class="list-group-item "><a href="#">Present  <span class="badge blue-bg pull-right"><?php if(!empty($presents)){ foreach($presents as $presents_count){ echo $presents_count;}}else{ echo "0";}?></span></a></li>
              
              <li class="list-group-item "><a href="#">Absent <span class="badge red-bg pull-right"><?php if(!empty($absent)){ foreach($absent as $absent_count){ echo $absent_count;}}else{ echo "0";}?></span></a></li>
            
              <li class="list-group-item "><a href="#">Late Present<span class="badge yellow-bg pull-right"><?php if(!empty($late_present)){ foreach($late_present as $late_present_count){ echo $late_present_count;}}else{ echo "0";}?></span></a></li>

              <li class="list-group-item "><a href="#">Leave <span class="badge grey-bg pull-right"><?php if(!empty($leave)){ foreach($leave as $leave_count){ echo $leave_count;}}else{ echo "0";}?></span></a></li>

              <li class="list-group-item "><a href="#">Whole Day <span class="badge brown-bg pull-right"><?php if(!empty($whole_day)){ foreach($whole_day as $whole_day_count){ echo $whole_day_count;}}else{ echo "0";}?></span></a></li>
              
              <li class="list-group-item "><a href="#">Half Day <span class="badge green-bg pull-right"><?php if(!empty($half_day)){ foreach($half_day as $half_day_count){ echo $half_day_count;}}else{ echo "0";}?></span></a></li>
            
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="panel panel-brown">
          <div class="panel-heading">
            <h4>Attendance abbreviations</h4>
          </div>
          <div class="panel-body">
            <ul class="list-group no-margin">
              <li class="list-group-item "><a href="#">Present<span class="badge blue-bg pull-right">P</span></a></li>
              <li class="list-group-item "><a href="#">Absent  <span class="badge red-bg pull-right">A</span></a></li>
              <li class="list-group-item "><a href="#">Late Present<span class="badge yellow-bg pull-right">LP</span></a></li>
              <li class="list-group-item "><a href="#">Leave <span class="badge grey-bg pull-right">L</span></a></li>
              <li class="list-group-item "><a href="#">Whole Day <span class="badge brown-bg pull-right">WD</span></a></li>
              <li class="list-group-item "><a href="#">Half Day <span class="badge green-bg pull-right">HD</span></a></li>
              
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-blue">
          <div class="panel-heading">
            <h4>Students Attendance</h4>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
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
                  <?php $i=1; foreach($totalAttendance as $totalAttendance_list){?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $totalAttendance_list->stud_name;?></td>
                      <td><?php echo $totalAttendance_list->cls_name;?></td>
                      <td><?php echo $totalAttendance_list->sect_name;?></td>
                      <td>

                        <?php if(($totalAttendance_list->stdadc_present_status)=="P") {?>
                          <?php echo "Present";?>
                        <?php }else if(($totalAttendance_list->stdadc_present_status)=="A") {?>
                          <?php echo "Absent";?>
                        <?php }else if(($totalAttendance_list->stdadc_present_status)=="LP") {?>
                          <?php echo "Late Present";?>
                        <?php }else if(($totalAttendance_list->stdadc_present_status)=="L") {?>
                          <?php echo "Leave";?>
                        <?php }else{ ?>
                        <?php } ?>

                      </td>

                      <td>

                        <?php if(($totalAttendance_list->stdadc_present_type)=="WD"){ ?>
                          <?php echo "Whole Day";?>
                        <?php }else if(($totalAttendance_list->stdadc_present_type)=="HD"){ ?>
                          <?php echo "Half Day";?>
                        <?php }else{ ?>
                        <?php } ?>

                      </td>
                      <td>
                        <?php if(($totalAttendance_list->sub_id)==0){ ?>
                          <?php echo "All Subjects";?>
                        <?php }else{?>
                          <?php echo $totalAttendance_list->sub_name;?>
                        <?php } ?>
                      </td>
                      <td>

                        <?php if(($totalAttendance_list->stdadc_reason_for_leave)==1){ ?>
                          <?php echo "Family Issue"; ?>
                        <?php }else if(($totalAttendance_list->stdadc_reason_for_leave)==2){ ?>
                          <?php echo "Traffic Issue"; ?>
                        <?php }else if(($totalAttendance_list->stdadc_reason_for_leave)==3){?>
                          <?php echo "Health Problem"; ?>
                        <?php }else if(($totalAttendance_list->stdadc_reason_for_leave)==4){ ?>
                          <?php echo "Accedent Issue"; ?>
                        <?php }else{ ?>
                        <?php } ?> 
                         
                      </td>
                      <td>
                        <button type="button" class="btn btn-info btn-xs" disabled="disabled"><i class="fa fa-edit"></i> </button>
                        <button type="button" class="btn btn-warning btn-xs" disabled="disabled"><i class="fa fa-bell"></i> </button>
                        <button type="button" class="btn btn-primary btn-xs" disabled="disabled"><i class="fa fa-mobile"></i> </button>
                       </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="9">
                        <button type="button" class="btn btn-warning btn-xs" disabled="disabled"><i class="fa fa-bell"></i> Send Notification</button>
                        <button type="button" class="btn btn-primary btn-xs" disabled="disabled"><i class="fa fa-mobile"></i> Send SMS</button>
                      </th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
