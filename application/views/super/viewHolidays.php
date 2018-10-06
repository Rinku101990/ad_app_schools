<div class="top-bar clearfix">
  <div class="page-title">
    <h4>Manage News and Events</h4>
  </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p><button  type="button" id="btnAddHolidays" class="btn btn-danger btn-md"><i class="fa fa-plus"></i> Create Events</button></p>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-blue">
        <div class="panel-heading">
          <h4>News and Events List</h4>
          <span class="pull-right">
            <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
              <?php echo $this->session->flashdata('message'); ?>
            <?php } ?>
          </span>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>School Name</th>
                  <th>Circular Category</th>
                  <th>Event Name</th>
                  <th>From Date</th>
                  <th>Till date</th>
									<th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=1; foreach($holidays as $holidays_list){ ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $holidays_list->schl_name;?></td>
                  <td><?php echo $holidays_list->crcl_name;?></td>
                  <td><?php echo $holidays_list->hldy_name;?></td>
                  <td><?php $new_from_date = date('d M-Y', strtotime($holidays_list->hldy_from_date)); echo $new_from_date;?></td>
                  <td><?php $new_till_date = date('d M-Y', strtotime($holidays_list->hldy_till_date)); echo $new_till_date;?></td>
									<td>
                    <?php 

                      $ago = '';
                      $sec = time() - $holidays_list->hldy_timestamps;
                      $year = (int) ($sec / 31556926);
                      $month = (int) ($sec / 2592000);
                      $day = (int) ($sec / 86400);
                      $hou = (int) ($sec / 3600);
                      $min = (int) ($sec / 60);
                      if ($year > 0) {
                          $ago = $year . ' year(s)';
                      } else if ($month > 0) {
                          $ago = $month . ' month(s)';
                      } else if ($day > 0) {
                          $ago = $day . ' day(s)';
                      } else if ($hou > 0) {
                          $ago = $hou . ' hour(s)';
                      } else if ($min > 0) {
                          $ago = $min . ' minute(s)';
                      } else {
                          $ago = $sec . ' second(s)';
                      }
                    ?>
                    <?php echo $holidays_list->hldy_description.'<br />'."<span style='color: #e77338;font-weight:600;'><i>".$ago." ago</i></span>";?>
                  </td>

                  <?php if(($holidays_list->hldy_status)=='0'){ ?>
                  <td>
                    <label class="switch" id="switch<?php echo $holidays_list->hldy_id;?>">
                      <input type="checkbox" name="status" id="hldyStatusOff" hldyStatusOff="<?php echo $holidays_list->hldy_id;?>" class="switch-input hldyStatusOff" checked="checked" value="1">
                      <span class="switch-label" data-on="On" data-off="Off"></span> 
                      <span class="switch-handle"></span>
                    </label>
                  </td>
                  <?php }else{ ?>
                  <td>
                    <label class="switch" id="switch<?php echo $holidays_list->hldy_id;?>">
                      <input type="checkbox" name="status" id="hldyStatusOn" hldyStatusOn="<?php echo $holidays_list->hldy_id;?>" class="switch-input hldyStatusOn" value="0">
                      <span class="switch-label" data-on="On" data-off="Off"></span> 
                      <span class="switch-handle"></span>
                    </label>
                  </td>
                  <?php } ?>

                  <td>    
                    <a onclick="return confirm('Are you sure want to delete.');" href="<?php echo base_url('super/holidays/remove/');?><?php echo $holidays_list->hldy_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>

<!-- ADD NEW HOLIDAYS -->
<div class="modal fade" id="newHolidaysModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 22%;width: 100%;margin-left:12%">
      <div class="modal-header" style="text-align: center">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="margin-left:-70%">Add Holidays</h4>
      </div>
      <div class="panel-body">
        <form method="post" id="formHolidaysRecord" class="form-horizontal">
          <fieldset>
            <div class="row">
              <div class="form-group col-lg-12">
              <label class="col-lg-3 control-label">School</label>
                <div class="col-lg-8">
                  <select class="form-control" name="holidays_schl_id" id="holidays_schl_id" required="required">
                    <option value="">Select School</option>
                    <?php foreach($schools as $schools_list){ ?>
                    <option value="<?php echo $schools_list->schl_id;?>"><?php echo $schools_list->schl_name;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>              
            </div>
            <div class="row">
              <div class="form-group col-lg-12">
              <label class="col-lg-3 control-label">Circular Name</label>
                <div class="col-lg-8">
                  <select class="form-control" name="holidays_crcl_id" id="holidays_crcl_id" required="required">
                    <option value="">Select Circular</option>
                    <?php if(!empty($circulars)){ ?>
                    <?php foreach($circulars as $circulars_list){ ?>
                    <option value="<?php echo $circulars_list->crcl_id;?>"><?php echo $circulars_list->crcl_name;?></option>
                    <?php } }else{ ?>
                      <option value="">No Record Found!.</option>
                    <?php } ?>
                  </select>
                </div>
              </div>              
            </div>
            <div class="row">
              <div class="form-group col-lg-12">
              <label class="col-lg-3 control-label">Event Name</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" name="holidays_name" id="holidays_name" placeholder="Enter Holidays Name" required="required">
                </div>
              </div>              
            </div>
            <div class="row">
              <div class="form-group col-lg-12">
                <label class="col-lg-3 control-label">From Date</label>
                <div class="col-lg-8">
                  <input type="date" class="form-control" name="holidays_from_date" id="holidays_from_date" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-12">
                <label class="col-lg-3 control-label">Till Date</label>
                <div class="col-lg-8 ">
                  <input type="date" class="form-control" name="holidays_till_date" id="holidays_till_date" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-12">
                <label class="col-lg-3 control-label">Description</label>
                <div class="col-lg-8 ">
                  <textarea rows="3" name="holidays_desciption" class="form-control" placeholder="Enter Holiday Purpose.." required="required"></textarea>

                </div>
              </div>
            </div>
          </fieldset>
          <div class="row">
            <div class="form-group">
              <div class="col-lg-4 col-lg-offset-7">
                <button type="submit" class="btn btn-success" style="margin-left:-45px">Create Holiday</button>
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
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
<!-- END OF THE HOLIDAYS -->