<div class="top-bar clearfix">
    <div class="page-title">
      <h4>Parents List</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p class="pull-right"><a href="<?php echo base_url('super/parents/add');?>" class="btn btn-danger btn-xs"><i class="fa fa-plus"></i> Add Parent</a></p></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                      <h4>Parents List</h4>
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
                              <th>Gaurdian Name</th>
                              <th>Email Id</th>
                              <th>Phone</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                            <tbody>
                            <?php foreach($parents as $parents_list){ ?>
                              <tr>
                                <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                <td><?php echo $parents_list->prnt_gaurdian_name;?></td>
                                <td><?php echo $parents_list->prnt_email?></td>
                                <td><?php echo $parents_list->prnt_mobile_no?></td>
                                <?php if(($parents_list->prnt_status)=="0"){ ?>
                                <td>
                                  <label class="switch pull-right">
                                    <input type="checkbox" class="switch-input" checked="checked">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                  </label>
                                </td>
                                <?php }else{ ?>
                                  <td>
                                    <label class="switch pull-right">
                                      <input type="checkbox" class="switch-input">
                                      <span class="switch-label" data-on="On" data-off="Off"></span>
                                      <span class="switch-handle"></span>
                                    </label>
                                  </td>
                                <?php } ?>
                                <td>
                                  <a href="<?php echo base_url('super/parents/profile');?>/<?php echo $parents_list->prnt_id;?>" class="btn btn-success btn-xs"><i class="fa fa-user"></i> </a>
                                  <a href="<?php echo base_url('super/parents/add');?>/<?php echo $parents_list->prnt_id;?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> </a>
                                  <a onclick="return confirm('are you sure want to delete!.');" href="<?php echo base_url('super/parents/delete');?>/<?php echo $parents_list->cms_id;?>/<?php echo $parents_list->prnt_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                                  <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> Notify</button>
                                  <button type="button" class="btn btn-info btn-xs"><i class="fa fa-key"></i> Send Credentials</button>
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
                                  <button type="button" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                                  <button type="button" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                  <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-bell"></i> Send Notification</button>
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