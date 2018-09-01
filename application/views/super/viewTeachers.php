<div class="top-bar clearfix">
  <div class="page-title">
    <h4>Teachers List</h4>
  </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-6">
        <a href="<?php echo base_url('super/teachers/add');?>" class="btn btn-danger pull-left"><i class="fa fa-plus"></i> Add New Teacher</a>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
        <div class="form-group has-feedback">
        <div class="col-lg-6 pull-right">
          <select class="form-control" name="country" data-bv-field="country">
           <option value="">-- Select School --</option>
          <option value="fr">DPS Delhi</option>
          <option value="de">SMP, bareilly</option>
          </select>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-blue">
        <div class="panel-heading">
            <h4>Teachers List</h4>
            <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                <?php echo $this->session->flashdata('message'); ?>
            <?php } ?>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table id="fixedHeader" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th><input type="checkbox" value="None" id="check2" name="check"> All</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Expertise</th>
                  <th>UserId</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
                <tbody>
                <?php foreach($teachers as $teachers_list){ ?>
                  <tr>
                    <td><input type="checkbox" value="None" id="check2" name="check"></td>
                    <td><?php echo $teachers_list->tchr_name;?></td>
                    <td><?php echo $teachers_list->tchr_mobile;?></td>
                    <td><?php echo $teachers_list->tchr_email;?></td>
                    <td><?php echo $teachers_list->tchr_expertise;?></td>
                    <td><?php echo $teachers_list->tchr_reference_id;?></td>
                    <td>
                      <label class="switch pull-right">
                        <input type="checkbox" class="switch-input" checked="checked">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                      </label>
                    </td>
                    <td>
                      <a href="<?php echo base_url('super/teachers/profile');?>/<?php echo $teachers_list->tchr_id;?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> </a>
                      <a href="<?php echo base_url('super/teachers/add');?>/<?php echo $teachers_list->tchr_id;?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> </a>
                      <a onclick="return confirm('are you sure want to delete!.');" href="<?php echo base_url('super/teachers/delete');?>/<?php echo $teachers_list->cms_id;?>/<?php echo $teachers_list->tchr_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                      <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> </button>
                      <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key"></i> </button>
                      <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-mobile"></i> </button>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="8">
                      <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                      <button type="button" class="btn btn-success btn-xs"><i class="fa fa-flag"></i> Enable</button>
                       <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                       <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> Send Notification</button>
                       <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-key"></i> Send SMS</button>
                       <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key"></i> Send Credentials</button>
                     </th>
                  </tr>
                </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>