<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Schools List</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/schools/add');?>" class="btn btn-danger btn-xs"><i class="fa fa-plus"></i> Create New School</a></p></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                        <h4>Schools List</h4>
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
                                        <th>School Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Create Who</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($schools as $info){ ?>
                                    <tr>
                                      <td>
                                        <input type="checkbox" value="None" id="check2" name="check"></td>
                                        <td><?php echo $info->schl_name;?></td>
                                        <td><?php echo $info->schl_phone_number;?></td>
                                        <td><?php echo $info->schl_email_id;?></td>
                                        <td><a href="<?php echo $info->schl_web_url;?>" target="_blank" style="color:blue"><?php echo $info->schl_web_url;?></a></td>
                                        <td><?php echo $info->schl_created_by_who;?></td>
                                        <td>
                                        <?php if(($info->schl_status)=='0'){?>
                                          <label class="switch pull-right">
                                            <input type="checkbox" class="switch-input" checked="checked">
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                          </label>
                                        <?php }else{ ?>
                                          <label class="switch pull-right">
                                            <input type="checkbox" class="switch-input">
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                          </label>
                                        <?php } ?>
                                      </td>
                                      <td>
                                         <button type="button" class="btn btn-success btn-xs viewSchoolInfo" viewSchlInfo="<?php echo $info->schl_id;?>"><i class="fa fa-eye"></i> </button>
                                         <a href="<?php echo base_url('super/schools/add');?>/<?php echo $info->schl_id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                         <a onclick="return confirm('are you sure want to delete!')" href="<?php echo base_url('super/schools/delete');?>/<?php echo $info->schl_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
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