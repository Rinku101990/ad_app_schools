<div class="top-bar clearfix">
  <div class="page-title">
    <h4>Manage Circulars</h4>
  </div>
</div>
<div class="main-container">
  <div class="container-fluid">
    <div class="row gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p><button  type="button" id="btnAddCirculars" class="btn btn-danger btn-md"><i class="fa fa-plus"></i> Create Circular</button></p>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-blue">
        <div class="panel-heading">
          <h4>Circulars List</h4>
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
                  <th>Circulars Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=1; foreach($circulars as $circulars_list){ ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $circulars_list->crcl_name;?></td>
                  

                  <?php if(($circulars_list->crcl_status)=='0'){ ?>
                  <td>
                    <label class="switch" id="switch<?php echo $circulars_list->crcl_id;?>">
                      <input type="checkbox" name="status" id="crclStatusOff" crclStatusOff="<?php echo $circulars_list->crcl_id;?>" class="switch-input crclStatusOff" checked="checked" value="1">
                      <span class="switch-label" data-on="On" data-off="Off"></span> 
                      <span class="switch-handle"></span>
                    </label>
                  </td>
                  <?php }else{ ?>
                  <td>
                    <label class="switch" id="switch<?php echo $circulars_list->crcl_id;?>">
                      <input type="checkbox" name="status" id="crclStatusOn" crclStatusOn="<?php echo $circulars_list->crcl_id;?>" class="switch-input crclStatusOn" value="0">
                      <span class="switch-label" data-on="On" data-off="Off"></span> 
                      <span class="switch-handle"></span>
                    </label>
                  </td>
                  <?php } ?>

                  <td>
                    <button class="btn btn-success btn-xs updateCircular" updateCrcl="<?php echo $circulars_list->crcl_id;?>"><i class="fa fa-eye"></i></button>    
                    <a onclick="return confirm('Are you sure want to delete.');" href="<?php echo base_url('super/circulars/remove/');?><?php echo $circulars_list->crcl_id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
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
<div class="modal fade" id="newCircularsModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 22%;width: 100%;margin-left:12%">
      <div class="modal-header" style="text-align: center">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="margin-left:-70%">Add New Circular</h4>
      </div>
      <div class="panel-body">
        <form method="post" id="formCircularsRecord" class="form-horizontal">
          <fieldset>
            <div class="row">
              <div class="form-group col-lg-12">
              <label class="col-lg-3 control-label">Circular Name</label>
                <div class="col-lg-8">
                  <input type="text" class="form-control" name="circulars_name" id="circulars_name" placeholder="Enter Circular Name" required="required">
                </div>
              </div>              
            </div>
            <div class="row">
              <div class="form-group col-lg-12">
                <label class="col-lg-3 control-label">Status</label>
                <div class="col-lg-8 ">
                  <select class="form-control" name="status" id="status">
                    <option value="0">Active</option>
                    <option value="1">Inactive</option>
                  </select>
                </div>
              </div>
            </div>
          </fieldset>
          <div class="row">
            <div class="form-group">
              <div class="col-lg-4 col-lg-offset-7">
                <button type="submit" class="btn btn-success" style="margin-left:-52px">Create Circulars</button>
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
<div class="modal fade" id="updateCircularsModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 22%;width: 100%;margin-left:12%">
      <div class="modal-header" style="text-align: center">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="margin-left:-70%">Update Circular</h4>
      </div>
      <div class="panel-body">
        <form method="post" id="updateFormCircularsRecord" class="form-horizontal">
          <fieldset>
            <div class="row">
              <div class="form-group col-lg-12">
              <label class="col-lg-3 control-label">Circular Name</label>
                <div class="col-lg-8">
                  <input type="hidden" name="circulars_id" id="circulars_id">
                  <input type="text" class="form-control" name="circulars_name_update" id="circulars_name_update" placeholder="Enter Circular Name" required="required">
                </div>
              </div>              
            </div>
            <div class="row">
              <div class="form-group col-lg-12">
                <label class="col-lg-3 control-label">Status</label>
                <div class="col-lg-8 ">
                  <select class="form-control" name="status_update" id="status_update">
                    <option value="0">Active</option>
                    <option value="1">Inactive</option>
                  </select>
                </div>
              </div>
            </div>
          </fieldset>
          <div class="row">
            <div class="form-group">
              <div class="col-lg-4 col-lg-offset-7">
                <button type="submit" class="btn btn-success" style="margin-left:-52px">Create Circulars</button>
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