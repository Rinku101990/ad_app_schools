<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Roles</h4>
    </div>
  </div>
        <div class="main-container">
            <div class="container-fluid">
                <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/roles/add');?>" class="btn btn-danger btn-xs"><i class="fa fa-plus"></i> Create New Role</a></p></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h4>Roles and Departments</h4>
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
                                            <th>Role</th>
                                            <th>Created On</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                          </tr>
                                      </thead>
                                        <tbody>
                                          <?php foreach($roles as $lists){ ?>
                                            <tr>
                                              <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                              <td><?php echo $lists->roles_name;?></td>
                                              <td>
                                                <?php $new_date = date('d M-Y', strtotime($lists->roles_created));?>
                                                <?php echo $new_date;?>
                                              </td>
                                              <?php if(($lists->roles_status)=='0'){?>
                                              <td>
                                                <label class="switch pull-right">
                                                  <input type="checkbox" class="switch-input" checked="checked"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span>
                                                </label>
                                              </td>
                                              <?php }else{?>
                                                <td>
                                                <label class="switch pull-right">
                                                  <input type="checkbox" class="switch-input"> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span>
                                                </label>
                                              </td>
                                              <?php } ?>
                                              <td>
                                                <?php if(($lists->roles_name)=="Admin"){ ?>     
                                                  <a  href="javascript:(void)" class="btn btn-danger btn-xs" disabled><i class="fa fa-trash"></i></a>
                                                <?php }else if(($lists->roles_name)=="Teachers"){ ?>
                                                  <a href="javascript:(void)" class="btn btn-danger btn-xs" disabled><i class="fa fa-trash"></i></a>
                                                <?php }else if(($lists->roles_name)=="Parents"){ ?>
                                                  <a href="javascript:(void)" class="btn btn-danger btn-xs" disabled><i class="fa fa-trash"></i></a>
                                                <?php }else if(($lists->roles_name)=="Students"){ ?>
                                                  <a href="javascript:(void)" class="btn btn-danger btn-xs" disabled><i class="fa fa-trash"></i></a>
                                                <?php }else{ ?>
                                                  <a onclick="return confirm('are you sure want to delete!.')" href="<?php echo base_url('super/roles/delete');?>/<?php echo $lists->roles_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                                <?php } ?>
                                              </td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <th colspan="5">
                                              <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                              <button type="button" class="btn btn-success btn-xs"><i class="fa fa-ban"></i> Enable</button>
                                              <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
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