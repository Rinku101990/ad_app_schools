<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Academic Years</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p><a href="<?php echo base_url('super/academic/add');?>" class="btn btn-danger btn-xs"><i class="fa fa-plus"></i> Create New Academic Year</a></p></div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                        <h4>Academic Year</h4>
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
                                        <th>Session From</th>
                                        <th>Session To</th>
                                        <th>Created On</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($years as $year_list){ ?>
                                    <tr>
                                      <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                      <td>
                                        <?php $date_from = date('Y', strtotime($year_list->acad_start_year));?>
                                        <?php echo $date_from;?>
                                      </td>
                                      <td>
                                        <?php $date_to = date('Y', strtotime($year_list->acad_end_year));?>
                                        <?php echo $date_to;?>
                                      </td>
                                      <td>
                                        <?php $new_date = date('d M-Y', strtotime($year_list->acad_created));?>
                                        <?php echo $new_date;?>
                                      </td>
                                      <td>
                                        <?php if(($year_list->acad_status)=='0'){ ?>
                                        <label class="switch">
                                          <input type="checkbox" class="switch-input" checked="checked"> 
                                          <span class="switch-label" data-on="On" data-off="Off"></span> 
                                          <span class="switch-handle"></span>
                                        </label>
                                        <?php }else{ ?>
                                        <label class="switch">
                                          <input type="checkbox" class="switch-input"> 
                                          <span class="switch-label" data-on="On" data-off="Off"></span> 
                                          <span class="switch-handle"></span>
                                        </label>
                                        <?php } ?>
                                      </td>
                                      <td>
                                        <a href="<?php echo base_url('super/academic/add');?>/<?php echo $year_list->acad_id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                        <a onclick="return confirm('are you sure want to delete!')" href="<?php echo base_url('super/academic/delete');?>/<?php echo $year_list->acad_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                                      </td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                                  <tfoot>
                                    <tr>
                                      <th colspan="6">
                                        <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                        <button type="button" class="btn btn-success btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                         <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button></th>
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