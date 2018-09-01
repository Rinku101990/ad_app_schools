<div class="top-bar clearfix">
    <div class="page-title">
        <h4>Classes</h4></div>
</div>
<div class="main-container">
    <div class="container-fluid">
        <div class="row gutter">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p><a href="<?php echo base_url('super/classes/add');?>" class="btn btn-danger btn-xs"><i class="fa fa-plus"></i> Create New Class</a></p></div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pull-right">
            <div class="form-group has-feedback">
              <div class="col-lg-6 pull-right">
                  <select class="form-control" name="country" data-bv-field="country">
                    <option value="">Select School</option>
                    <option value="fr">DPS Delhi</option>
                    <option value="de">SMP, bareilly</option>
                  </select>
                  <i class="form-control-feedback" data-bv-icon-for="country" style="display: none;"></i>
                  <small class="help-block" data-bv-validator="notEmpty" data-bv-for="country" data-bv-result="NOT_VALIDATED" style="display: none;">The country is required and can't be empty</small>
              </div>
            </div>
          </div>
          <div class="clearfix"></div> <br>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-blue">
                    <div class="panel-heading">
                      <h4>Classes</h4>
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
                                      <th>Class Name</th>
                                      <th>School Name</th>
                                      <th>Created On</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($classes as $lists){ ?>
                                    <tr>
                                      <td><input type="checkbox" value="None" id="check2" name="check"></td>
                                      <td><?php echo $lists->cls_name;?></td>
                                      <td><?php echo $lists->schl_name;?></td>
                                      <td>
                                        <?php $date_new = date('d M-Y', strtotime($lists->cls_created));?>
                                        <?php echo $date_new;?>
                                      </td>
                                      <td>
                                        <label class="switch">
                                          <input type="checkbox" class="switch-input" checked="checked"> <span class="switch-label" data-on="On" data-off="Off"></span> 
                                          <span class="switch-handle"></span>
                                        </label>
                                      </td>
                                      <td>
                                        <a href="<?php echo base_url('super/classes/add');?>/<?php echo $lists->cls_id?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
                                        <a onclick="return confirm('are you sure want to delete class!.');" href="<?php echo base_url('super/classes/delete');?>/<?php echo $lists->cls_id?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                                      </td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                      <th colspan="6">
                                        <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Disable</button>
                                        <button type="button" class="btn btn-success btn-xs"><i class="fa fa-flag"></i> Enable</button>
                                         <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                         <button type="button" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Excel</button>
                                         <button type="button" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</button></th>
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